<?php
$title = "Messagerie - TomTroc";
require_once 'partials/header.php';
?>

<main class="messagerie-page <?= isset($selectedUser) && $selectedUser ? 'open-chat' : '' ?>">
    <div class="messagerie-container">

        <div class="messagerie-sidebar">
            <h2 class="section-title">Messagerie </h2>
            <div class="conversations-list">
                <?php if (empty($conversations)): ?>
                    <p class="no-conv">Vous n'avez pas encore de message.</p>
                <?php else: ?>
                    <?php foreach ($conversations as $conv): ?>
                        <?php
                        $isActive = (isset($_GET['id']) && $_GET['id'] == $conv['id']) ? 'active' : '';
                        $isUnread = ($conv['is_read'] == 0 && $conv['sender_id'] != $_SESSION['user_id']) ? 'unread' : ''; ?>

                        <a href="index.php?action=messages&id=<?= $conv['id'] ?>"
                            class="conv-item <?= $isActive ?> <?= $isUnread ?>">
                            <img src="<?= $conv['avatar_url'] ?>" alt="Avatar" class="conv-avatar">
                            <div class="conv-info">
                                <div class="conv-top">
                                    <span class="conv-username">
                                        <?= htmlspecialchars($conv['username']) ?>
                                    </span>
                                    <span class="conv-time">
                                        <?= date('H:i', strtotime($conv['created_at'])) ?>
                                    </span>
                                </div>
                                <p class="conv-preview">
                                    <?= htmlspecialchars(substr($conv['last_message'], 0, 50)) ?>
                                </p>
                            </div>
                        </a>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>

        <div class="messagerie-content">
            <?php if ($selectedUser): ?>

                <div class="chat-header">
                    <a href="index.php?action=messages" class="back-btn-mobile">← retour</a>

                    <img src="<?= $selectedUser['avatar_url'] ?>" alt="Avatar" class="chat-avatar">
                    <span class="chat-username"><?= htmlspecialchars($selectedUser['username']) ?></span>
                </div>

                <div class="chat-messages" id="chatBox">
                    <?php foreach ($messages as $msg): ?>
                        <?php
                        $isSender = ($msg['sender_id'] == $_SESSION['user_id']);
                        $type = $isSender ? 'sent' : 'received';
                        ?>

                        <div class="message-row <?= $type ?>">
                            <div class="message-content">

                                <div class="message-meta">
                                    <?php if (!$isSender): ?>
                                        <img src="<?= $selectedUser['avatar_url'] ?>" alt="user" class="msg-avatar">
                                    <?php endif; ?>

                                    <?= date('d.m H:i', strtotime($msg['created_at'])) ?>
                                </div>

                                <div class="message-bubble">
                                    <?= nl2br(htmlspecialchars($msg['content'])) ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>

                <form action="" method="POST" class="chat-form">
                    <input type="hidden" name="receiver_id" value="<?= $selectedUser['id'] ?>">
                    <input type="text" name="content" placeholder="Tapez votre message ici" required autocomplete="off">
                    <button type="submit" class="btn-primary">Envoyer</button>
                </form>

            <?php else: ?>
                <div class="empty-chat">
                    <p>Sélectionnez une conversation pour afficher les messages.</p>
                </div>
            <?php endif; ?>
        </div>

    </div>
</main>

<script>
    var chatBox = document.getElementById('chatBox');
    if (chatBox) {
        chatBox.scrollTop = chatBox.scrollHeight;
    }
</script>

<?php require_once 'partials/footer.php'; ?>