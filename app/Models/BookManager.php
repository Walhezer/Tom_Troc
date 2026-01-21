<?php

require_once __DIR__ . '/../../config/Database.php';

class BookManager
{

    private $db;

    public function __construct()
    {
        $database = new database();
        $this->db = $database->getConnection();
    }


    public function getBook()
    {
        $req = $this->db->query('SELECT title, image, author FROM books ORDER BY id DESC LIMIT 4');
        return $req->fetchAll();
    }

    public function getAllBooks()
    {
        $sql = 'SELECT * FROM books ORDER BY id DESC';
        $req = $this->db->query($sql);
        return $req->fetchAll();
    }
}