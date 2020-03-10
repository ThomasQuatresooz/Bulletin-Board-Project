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

    // public function findXByTopicId($id) :?iterable
    // {
    //     try {
    //         $db = DatabaseManager::getInstance()->getDatabase();
    //         $sth = $db->prepare('SELECT * FROM messages WHERE messages.topics_idtopics = ? LIMIT 3');
    //         $sth->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Message');
    //         return ($sth->execute([$id])) ? $sth->fetchAll() : null;
    //     } catch (\PDOException $th) {
    //         echo ($th->getMessage());
    //     }
    // }

    public function editMsg($id, $content): bool
    {
        $date = date('Y-m-d H:i:s');
        try {
            $db = DatabaseManager::getInstance()->getDatabase();
            $sth = $db->prepare('UPDATE `messages` SET `content` = ? , `date-edit` = ? WHERE `messages`.`idmessages` = ?');
            return $sth->execute([$content,$date,$id]);
        } catch (\PDOException $th) {
            echo ($th->getMessage());
        }
    }

    public function addMsg($content,$userID,$topicID)
    {
        $date = date('Y-m-d H:i:s');
        try {
            $db = DatabaseManager::getInstance()->getDatabase();
            $sth = $db->prepare('INSERT INTO `messages`(`content`, `date-creation`, `date-edit`, `Users_idUsers`, `topics_idtopics`, `status`) VALUES (?,?,?,?,?,?)');
            return $sth->execute([$content,$date,$date,$userID,$topicID,1]);
        } catch (\PDOException $th) {
            echo ($th->getMessage());
        }
    }
}
