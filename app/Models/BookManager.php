<?php

class BookManager
{

    private function dbConnect()
    {
        try {

            $db = new PDO('mysql:host=localhost;dbname=tom_troc;charset=utf8', 'root', '');
            return $db;
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }

    public function getBook()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT title, image, author FROM books ORDER BY id DESC LIMIT 4');
        return $req->fetchAll();
    }
}