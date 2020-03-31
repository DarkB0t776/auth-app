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


  // Get data of specific language
  public function getLangData()
  {
    if (isset($_COOKIE['lang'])) {
      $this->lang = $_COOKIE['lang'];
    }

    if ($this->lang === 'uk') {
      $sql = "SELECT * FROM ua";
    } else {
      $sql = "SELECT * FROM eng";
    }
    $this->db->query($sql);

    $this->langData = $this->db->getSingleResult();

    return $this->langData;
  }
}
