<?php
require_once('DatabaseManager.php');
require_once('Message.php');

class MessageGateway
{
    public function findAllByTopicId($id): ?iterable
    {
        try {
            $db = DatabaseManager::getInstance()->getDatabase();

            $sth = $db->prepare('SELECT * FROM messages WHERE messages.topics_idtopics = ?');
            $sth->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Message');

            return $sth->execute([$id]) ? $sth->fetchAll() : null;
        } catch (\PDOException $th) {
            echo ($th->getMessage());
        }
    }

    public function findXByTopicId($id): ?iterable
    {
        try {
            $db = DatabaseManager::getInstance()->getDatabase();

            $sth = $db->prepare('SELECT * FROM messages WHERE topics_idtopics = ? ORDER BY `date_creation` DESC LIMIT 1');
            $sth->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Message');

            return $sth->execute([$id]) ? $sth->fetchAll() : null;
        } catch (\PDOException $th) {
            echo ($th->getMessage());
        }
    }

    public function editMsg($id, $content,$status=1): bool
    {
        // $date = date('Y-m-d H:i:s');
        try {
            $db = DatabaseManager::getInstance()->getDatabase();
            $sth = $db->prepare('UPDATE `messages` SET `content` = ? , `status` = ? ,`date_edit` = CURRENT_TIME() WHERE `messages`.`idmessages` = ?');
            return $sth->execute([$content,$status, $id]);
        } catch (\PDOException $th) {
            echo ($th->getMessage());
        }
    }

    public function addMsg($content, $userID, $topicID): bool
    {
        $date = date('Y-m-d H:i:s');
        try {
            $db = DatabaseManager::getInstance()->getDatabase();
            $sth = $db->prepare('INSERT INTO `messages`(`content`, `date_creation`, `date_edit`, `Users_idUsers`, `topics_idtopics`, `status`) VALUES (?,?,?,?,?,?)');
            return $sth->execute([$content, $date, $date, $userID, $topicID, 1]);
        } catch (\PDOException $th) {
            echo ($th->getMessage());
        }
    }

    public function deleteMessage($id): bool
    {
        $statement = 'DELETE FROM `messages` WHERE `messages`.`idmessages` = ?';
        try {
            $db = DatabaseManager::getInstance()->getDatabase();
            $sth = $db->prepare($statement);

            return $sth->execute([$id]);
        } catch (\PDOException $th) {
            echo ($th->getMessage());
        }
    }
}
