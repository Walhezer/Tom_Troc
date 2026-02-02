<?php
require_once __DIR__ . '/../../config/Database.php';

class MessageManager
{
    private $db;

    //Initialize database connection
    public function __construct()
    {
        $database = new Database();
        $this->db = $database->getConnection();
    }

    //Retrieve conversations
    public function getConversations($userId)
    {
        $sql = "
            SELECT 
                u.id, 
                u.username, 
                u.image, 
                m.content as last_message, 
                m.created_at, 
                m.is_read,
                m.sender_id
            FROM users u
            JOIN messages m ON (
                (m.sender_id = :id1 AND m.receiver_id = u.id) 
                OR 
                (m.receiver_id = :id2 AND m.sender_id = u.id)
            )
            WHERE m.id IN (
                SELECT MAX(id) 
                FROM messages 
                WHERE sender_id = :id3 OR receiver_id = :id4
                GROUP BY IF(sender_id = :id5, receiver_id, sender_id)
            )
            ORDER BY m.created_at DESC
        ";

        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            'id1' => $userId,
            'id2' => $userId,
            'id3' => $userId,
            'id4' => $userId,
            'id5' => $userId
        ]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    //Retrieve messages between
    public function getMessagesBetween($userId, $otherUserId)
    {
        $sql = "SELECT * FROM messages 
                WHERE (sender_id = :myId1 AND receiver_id = :otherId2) 
                   OR (sender_id = :otherId3 AND receiver_id = :myId4)
                ORDER BY created_at ASC";

        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            'myId1' => $userId,
            'otherId2' => $otherUserId,
            'otherId3' => $otherUserId,
            'myId4' => $userId
        ]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    //Send new message
    public function sendMessage($senderId, $receiverId, $content)
    {
        $sql = "INSERT INTO messages (sender_id, receiver_id, content) 
                VALUES (:senderId, :receiverId, :content)";

        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            'senderId' => $senderId,
            'receiverId' => $receiverId,
            'content' => $content
        ]);
    }

    //Mark messages as read
    public function markAsRead($userId, $senderId)
    {
        $sql = "UPDATE messages 
                SET is_read = 1 
                WHERE receiver_id = :userId 
                AND sender_id = :senderId";

        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            'userId' => $userId,
            'senderId' => $senderId
        ]);
    }
}