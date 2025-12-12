<?php

class BookManager {

    private function dbConnect() {
        try {
           
            $db = new PDO('mysql:host=localhost;dbname=tom_troc;charset=utf8', 'root', '');
            return $db;
        } catch(Exception $e) {
            die('Erreur : '.$e->getMessage());
        }
    }

    public function getBook() {
        $db = $this->dbConnect();
        $req = $db->query('SELECT title, image FROM books LIMIT 1');
        return $req->fetch(); 
    }
}