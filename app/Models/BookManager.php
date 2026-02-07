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
        $req = $this->db->query('SELECT books.id, books.title, books.image, books.author, users.username, users.id AS user_id FROM books JOIN users ON books.user_id = users.id ORDER BY books.id DESC LIMIT 4');
        return $req->fetchAll();
    }

    //Retrieve all books
    public function getAllBooks()
    {
        $sql = 'SELECT books.*, users.username, users.id AS user_id 
            FROM books 
            JOIN users ON books.user_id = users.id 
            WHERE books.available = 1
            ORDER BY books.id DESC';
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

    //Update a book
    public function updateBook($id, $title, $author, $description, $image, $available)
    {
        $sql = 'UPDATE books SET title = :title, author = :author, description = :description,
        image = :image, available = :available WHERE id = :id';
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':title', $title, PDO::PARAM_STR);
        $stmt->bindParam(':author', $author, PDO::PARAM_STR);
        $stmt->bindParam(':description', $description, PDO::PARAM_STR);
        $stmt->bindParam(':image', $image, PDO::PARAM_STR);
        $stmt->bindParam(':available', $available, PDO::PARAM_BOOL);
        return $stmt->execute();
    }

    //Add a book
    public function addBook($title, $author, $description, $image, $available, $userId)
    {
        $sql = 'INSERT INTO books (title, author, description, image, user_id, available) VALUES (:title, :author, :description, :image, :user_id, :available)';
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':title', $title, PDO::PARAM_STR);
        $stmt->bindParam(':author', $author, PDO::PARAM_STR);
        $stmt->bindParam(':description', $description, PDO::PARAM_STR);
        $stmt->bindParam(':image', $image, PDO::PARAM_STR);
        $stmt->bindParam(':user_id', $userId, PDO::PARAM_INT);
        $stmt->bindParam(':available', $available, PDO::PARAM_BOOL);
        return $stmt->execute();
    }

    //Delete a book
    public function deleteBook($id)
    {
        $sql = 'DELETE FROM books WHERE id = :id';
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
}