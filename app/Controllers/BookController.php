<?php

require_once 'app/Models/BookManager.php';
require_once 'app/Models/UserManager.php';

class BookController
{
    public function catalog()
    {
        $bookManager = new BookManager();
        $books = $bookManager->getAllBooks();

        require_once 'app/Views/catalog.php';
    }

    public function showbook()
    {
        if (isset($_GET['id']) && !empty($_GET['id'])) {
            $id = (int) $_GET['id'];
            $bookManager = new BookManager();
            $book = $bookManager->getBookById($id);
            if (!$book) {
                header('Location: index.php?action=catalog');
                exit;
            }

            $usermanager = new UserManager();
            $owner = $usermanager->getUserById($book['user_id']);
            require_once 'app/Views/book_detail.php';
        } else {
            header('Location: index.php?action=catalog');
            exit;
        }
    }

    public function editBook()
    {
        // Verify user is logged in
        if (!isset($_SESSION['user_id'])) {
            header('Location: index.php?action=login');
            exit;
        }

        $bookManager = new BookManager();

        // Recover the book
        if (isset($_GET['id']) && !empty($_GET['id'])) {
            $bookId = (int) $_GET['id'];
            $book = $bookManager->getBookById($bookId);

            if (!$book || $book['user_id'] != $_SESSION['user_id']) {
                header('Location: index.php?action=account');
                exit;
            }
        } else {
            header('Location: index.php?action=account');
            exit;
        }

        // Handle form submission
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = trim($_POST['title']);
            $author = trim($_POST['author']);
            $description = trim($_POST['description']);
            $available = (int) $_POST['available'];

            // Image management
            $imageName = $book['image'];
            if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
                $allowed = ['jpg', 'jpeg', 'png', 'gif'];
                $fileName = $_FILES['image']['name'];
                $fileTmp = $_FILES['image']['tmp_name'];
                $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

                if (in_array($fileExt, $allowed)) {
                    $newFileName = uniqid() . '.' . $fileExt;
                    $destination = 'public/uploads/livres/' . $newFileName;

                    if (move_uploaded_file($fileTmp, $destination)) {
                        $imageName = $newFileName;
                    }
                }
            }

            // Update the book in the database
            if ($bookManager->updateBook($bookId, $title, $author, $description, $imageName, $available)) {
                header('Location: index.php?action=account&success=book_updated');
                exit;
            }
        }

        require_once 'app/Views/edit_book.php';
    }

    public function addBook()
    {
        //Verify user is logged in
        if (!isset($_SESSION['user_id'])) {
            header('Location: index.php?action=login');
            exit;
        }
        //Handle form submission
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = trim($_POST['title']);
            $author = trim($_POST['author']);
            $description = trim($_POST['description']);
            $userId = $_SESSION['user_id'];
            $imageName = 'default-book.jpg';

            //Image management
            if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
                $allowed = ['jpg', 'jpeg', 'png', 'gif'];
                $fileName = $_FILES['image']['name'];
                $fileTmp = $_FILES['image']['tmp_name'];
                $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

                //Check file extension
                if (in_array($fileExt, $allowed)) {
                    $newFileName = uniqid() . '.' . $fileExt;
                    $destination = 'public/uploads/livres/' . $newFileName;

                    if (move_uploaded_file($fileTmp, $destination)) {
                        $imageName = $newFileName;
                    }
                }
            }
            //Add the book to the database
            $bookManager = new BookManager();
            if ($bookManager->addBook($title, $author, $description, $imageName, 1, $userId)) {
                header('Location: index.php?action=account&success=book_added');
                exit;
            }
        }

        require_once 'app/Views/add_book.php';
    }

    public function deleteBook()
    {
        if (!isset($_SESSION['user_id'])) {
            header('Location: index.php?action=login');
            exit;
        }

        if (isset($_GET['id']) && !empty($_GET['id'])) {
            $id = (int) $_GET['id'];
            $bookManager = new BookManager();
            $book = $bookManager->getBookById($id);

            if ($book && $book['user_id'] == $_SESSION['user_id']) {
                $bookManager->deleteBook($id);
            }
        }
        header('Location: index.php?action=account&success=book_deleted');
        exit;
    }
}
