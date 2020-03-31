<?php

class User
{

  private $db;
  private $errors = [];
  private $langData;

  public function __construct()
  {
    $this->db = new Database;
    $lang = new Language;
    $this->langData = $lang->getLangData();
  }


  //Register User
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

  //Log In User
  public function login($data)
  {
    $password = $this->generatePassword($data['password']);
    $sql = "SELECT * FROM users WHERE email = :email AND password = :password";
    $this->db->query($sql);
    $this->db->bind(':email', $data['email']);
    $this->db->bind(':password', $password);

    $row = $this->db->getSingleResult();

    // If user found create sessions
    if ($row) {
      $_SESSION['user_id'] = $row->id;
      $_SESSION['user_name'] = $row->full_name;
      $_SESSION['user_email'] = $row->email;

      return true;
    } else {
      array_push($this->errors, $this->langData->user_not_found);
      return false;
    }
  }

  // Check if user is logged in
  public function isLoggedIn()
  {
    if (isset($_SESSION['user_id'])) {
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


  // Create hashed password
  private function generatePassword($pass)
  {
    return hash('SHA512', $pass);
  }

  // Upload Image
  private function uploadImage($image)
  {
    // If image is not loaded - exit from function
    if (empty($image['name'])) {
      return;
    }

    // If image is loaded - generate image name and path to store
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

  // Data Validation
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
    if (strlen($name) < 2) {
      array_push($this->errors, $this->langData->name_length_error);
    }
    if (!preg_match('/^[A-Za-z ]+$/', $name)) {
      array_push($this->errors, $this->langData->name_type_error);
    }
  }

  private function validateEmail($email)
  {
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $this->db->query($sql);
    $row = $this->db->rowCount();


    if ($row > 0) {
      array_push($this->errors, $this->langData->email_exists_error);
    }
    if (empty($email)) {
      array_push($this->errors, $this->langData->email_empty_error);
    }

    if (!preg_match('/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/', $email)) {
      array_push($this->errors, $this->langData->email_type_error);
    }
  }

  private function validatePasswords($pass1, $pass2)
  {
    if (strlen($pass1) < 6) {
      array_push($this->errors, $this->langData->password_length_error);
    }
    if ($pass1 !== $pass2) {
      array_push($this->errors, $this->langData->password_match_error);
    }
  }

  private function validateImage($image)
  {
    if (!empty($image['name'])) {
      $extensions = ['jpg', 'jpeg', 'png', 'gif'];
      $ext = strtolower(pathinfo(basename($image['name']), PATHINFO_EXTENSION));

      if (!in_array($ext, $extensions)) {
        array_push($this->errors, $this->langData->image_type_error);
      }
    } else {
      return;
    }
  }
}
