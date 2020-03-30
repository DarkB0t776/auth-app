<?php

class User
{

  private $db;
  private $errors = [];
  private $langData;

  public function __construct()
  {
    $this->db = new Database;
  }

  public function register($data)
  {
    if ($this->validateData($data)) {

      $password = $this->generatePassword($data['password']);
      $avatar = $this->uploadImage($data['avatar']);

      $sql = 'INSERT INTO users (full_name, email, password, avatar)
              VALUES (:f_name, :email, :password, :avatar)';
      $this->db->query($sql);
      $this->db->bind(":f_name", $data['f_name']);
      $this->db->bind(":email", $data['email']);
      $this->db->bind(":password", $password);
      $this->db->bind(":avatar", $avatar);

      if ($this->db->execute()) {
        return true;
      } else {
        return false;
      }
    }
  }

  public function login($data)
  {
    $password = $this->generatePassword($data['password']);
    $sql = "SELECT * FROM users WHERE email = :email AND password = :password";
    $this->db->query($sql);
    $this->db->bind(':email', $data['email']);
    $this->db->bind(':password', $password);

    $row = $this->db->getSingleResult();

    if ($row) {
      $_SESSION['user_id'] = $row->id;
      $_SESSION['user_name'] = $row->full_name;
      $_SESSION['user_email'] = $row->email;

      return true;
    } else {
      return false;
    }
  }

  public function getUserById($id)
  {
    $sql = "SELECT * FROM users WHERE id = :id";
    $this->db->query($sql);
    $this->db->bind(":id", $id);

    return $this->db->getSingleResult();
  }

  private function generatePassword($pass)
  {
    return hash('SHA512', $pass);
  }

  private function uploadImage($image)
  {
    if (empty($image['name'])) {
      return;
    }

    $ext = strtolower(pathinfo(basename($image['name']), PATHINFO_EXTENSION));
    $targetDir = __DIR__ . '/../../assets/img/';
    $imageName = random_int(0, 1000000000) . '.' . $ext;
    $targetFile = $targetDir . $imageName;
    move_uploaded_file($image['tmp_name'], $targetFile);

    return $imageName;
  }


  public function getErrors()
  {
    return $this->errors;
  }

  private function validateData($data)
  {
    $this->validateName($data['f_name']);
    $this->validateEmail($data['email']);
    $this->validatePasswords($data['password'], $data['confirm_password']);
    $this->validateImage($data['avatar']);

    if (!empty($this->errors)) {
      return false;
    } else {

      return true;
    }
  }

  private function validateName($name)
  {
    if (empty($name)) {
      array_push($this->errors, 'Name should not be empty');
    }

    if (!preg_match('/^[A-Za-z ]+$/', $name)) {
      array_push($this->errors, 'Name should contains of letters only');
    }
  }

  private function validateEmail($email)
  {
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $this->db->query($sql);
    $row = $this->db->rowCount();


    if ($row > 0) {
      array_push($this->errors, 'Email already exists');
    }
    if (empty($email)) {
      array_push($this->errors, 'Email should not be empty');
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      array_push($this->errors, 'Email is invalid');
    }
  }

  private function validatePasswords($pass1, $pass2)
  {
    if (empty($pass1)) {
      array_push($this->errors, 'Password should not be empty');
    }
    if (strlen($pass1) < 6) {
      array_push($this->errors, 'Password should be at least 6 characters');
    }
    if ($pass1 !== $pass2) {
      array_push($this->errors, "Passwords do not match");
    }
  }

  private function validateImage($image)
  {
    if (!empty($image['name'])) {
      $extensions = ['jpg', 'jpeg', 'png', 'gif'];
      $ext = strtolower(pathinfo(basename($image['name']), PATHINFO_EXTENSION));

      if (!in_array($ext, $extensions)) {
        array_push($this->errors, 'Only jpg, jpeg, png, or gif extension is allowed');
      }
    } else {
      return;
    }
  }
}
