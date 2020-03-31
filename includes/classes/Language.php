<?php

class Language
{
  private $lang = 'en';
  private $db;
  private $langData;



  public function __construct()
  {
    $this->db = new Database;
  }

  public function getLangData()
  {
    if (isset($_SESSION['lang'])) {
      $this->lang = $_SESSION['lang'];
    }

    if ($this->lang === 'en') {
      $sql = "SELECT * FROM eng";
    } elseif ($this->lang === 'ua') {
      $sql = "SELECT * FROM ua";
    }
    $this->db->query($sql);

    $this->langData = $this->db->getSingleResult();

    return $this->langData;
  }
}
