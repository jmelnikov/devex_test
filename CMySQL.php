<?php


class CMySQL
{
    private $db;

    public function __construct()
    {
        $this->db = new mysqli("127.0.0.1", "devex", "devex", "devex");
        $this->db->query('CREATE TABLE IF NOT EXISTS `log` (`id` INT UNSIGNED NOT NULL AUTO_INCREMENT, `address` TEXT NULL, PRIMARY KEY (`id`))');
    }

    public function __destruct()
    {
        $this->db->close();
    }

    public function addAddress($address)
    {
        $this->db->query('INSERT INTO `log` (address) VALUES (\''.$this->db->escape_string($address).'\')');
        var_dump($this->db->error);
    }
}
