<?php
require_once __DIR__ . '/../Models/MessageManager.php';
require_once __DIR__ . '/../Models/UserManager.php';

class MessageController
{

    public function messagerie()
    {
        if (!isset($_SESSION['user_id'])) {
            header('Location: index.php?action=login');
            exit();
        }

        $userId = $_SESSION['user_id'];

        $messageManager = new MessageManager();
        $userManager = new UserManager();

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['content']) && isset($_POST['receiver_id'])) {
            $receiverId = (int) $_POST['receiver_id'];
            $content = trim($_POST['content']);

            if (!empty($content)) {
                $messageManager->sendMessage($userId, $receiverId, $content);
                header("Location: index.php?action=messages&id=$receiverId");
                exit();
            }
        }

        $conversations = $messageManager->getConversations($userId);

        $selectedUser = null;
        $messages = [];

        if (isset($_GET['id'])) {
            $otherUserId = (int) $_GET['id'];
            $selectedUser = $userManager->getUserById($otherUserId);

            if ($selectedUser) {
                $messages = $messageManager->getMessagesBetween($userId, $otherUserId);
                $messageManager->markAsRead($userId, $otherUserId);
            }
        }

        require __DIR__ . '/../Views/messages.php';
    }
}