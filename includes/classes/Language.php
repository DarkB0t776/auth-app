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
    $sql = "SELECT * FROM lang";
    $this->db->query($sql);

    $this->langData = $this->db->getSingleResult();

    return $this->langData;
  }
}
