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
        $req = $this->db->query('SELECT books.id, books.title, books.image, books.author, users.username FROM books JOIN users ON books.user_id = users.id ORDER BY books.id DESC LIMIT 4');
        return $req->fetchAll();
    }

    public function getAllBooks()
    {
        $sql = 'SELECT * FROM books ORDER BY id DESC';
        $req = $this->db->query($sql);
        return $req->fetchAll();
    }

    public function getBookById($id)
    {
        $sql = 'SELECT b.*, u.username, u.image AS userImage FROM books b JOIN users u ON b.user_id = u.id WHERE b.id = :id';

        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();
    }
}