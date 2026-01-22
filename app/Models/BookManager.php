<?php

require_once __DIR__ . '/../../config/Database.php';

//Class to manage book operations
class BookManager
{

    private $db;
    //Initialize database connection
    public function __construct()
    {
        $database = new database();
        $this->db = $database->getConnection();
    }

    //Retrieve the 4 latest books
    public function getBook()
    {
        $req = $this->db->query('SELECT books.id, books.title, books.image, books.author, users.username FROM books JOIN users ON books.user_id = users.id ORDER BY books.id ASC LIMIT 4');
        return $req->fetchAll();
    }

    //Retrieve all books
    public function getAllBooks()
    {
        $sql = 'SELECT * FROM books ORDER BY id DESC';
        $req = $this->db->query($sql);
        return $req->fetchAll();
    }

    //Retrieve a book by its ID
    public function getBookById($id)
    {
        $sql = 'SELECT b.*, u.username, u.image AS userImage FROM books b JOIN users u ON b.user_id = u.id WHERE b.id = :id';

        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();
    }

    //Show user's books
    public function getBooksByUserId($userId)
    {
        $sql = 'SELECT * FROM books WHERE user_id = :userId ORDER BY id DESC';
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}