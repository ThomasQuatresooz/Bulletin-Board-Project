<?php
require_once('DatabaseManager.php');
require_once('Topic.php');

class TopicGateway
{
    public function findAllByBoardId($id): ?iterable
    {
        try {
            $db = DatabaseManager::getInstance()->getDatabase();

            $sth = $db->prepare('SELECT * FROM topics WHERE topics.boards_idboards = ? ORDER BY `date_edit`, `date_creation`');

            $sth->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Topic');
            return ($sth->execute([$id])) ? $sth->fetchAll() : null;
        } catch (\PDOException $th) {
            echo ($th->getMessage());
        }
    }

    public function findMostRecentByBoardId($id): ?iterable
    {
        try {
            $db = DatabaseManager::getInstance()->getDatabase();

            $sth = $db->prepare('SELECT topics.* FROM messages INNER JOIN topics ON messages.topics_idtopics = topics.idtopics WHERE topics.boards_idboards = ? GROUP BY topics.idtopics ORDER BY `messages`.`date_creation` DESC LIMIT 3');

            $sth->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Topic');
            return ($sth->execute([$id])) ? $sth->fetchAll() : null;
        } catch (\PDOException $th) {
            echo ($th->getMessage());
        }
    }

    public function findById($id): ?Topic
    {
        try {
            $db = DatabaseManager::getInstance()->getDatabase();

            $sth = $db->prepare('SELECT * FROM topics WHERE idtopics = ? ');

            $sth->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Topic');
            return ($sth->execute([$id])) ? $sth->fetch() : null;
        } catch (\PDOException $th) {
            echo ($th->getMessage());
        }
    }

    public function createTopic($name, $idAuthor, $idBoard): ?int
    {
        $statement = 'INSERT INTO topics (name, Users_idUsers, boards_idboards) VALUES (?, ?, ?)';

        try {
            $db = DatabaseManager::getInstance()->getDatabase();
            $sth = $db->prepare($statement);
            $ret = ($sth->execute([$name, $idAuthor, $idBoard])) ? $db->lastInsertId() : null;
            if (isset($ret) && $idBoard == '6' && $this->numberOfTopicFromBoard($idBoard) > 5) {
                $this->deleteOldestOne();
            }
            return $ret;
        } catch (\PDOException $th) {
            echo ($th->getMessage());
        }
    }

    private function deleteOldestOne()
    {
        $statement = 'DELETE FROM topics WHERE topics.boards_idboards = 6 ORDER by topics.date_creation LIMIT 1';
        try {
            $db = DatabaseManager::getInstance()->getDatabase();
            $sth = $db->prepare($statement);
            return $sth->execute();
        } catch (\PDOException $th) {
            echo ($th->getMessage());
        }
    }

    private function numberOfTopicFromBoard($id): ?int
    {
        $statement = 'SELECT COUNT(idtopics)as `Number` FROM topics WHERE topics.boards_idboards = 6 ';
        try {
            $db = DatabaseManager::getInstance()->getDatabase();
            $sth = $db->prepare($statement);
            return ($sth->execute() ? $sth->fetch()['Number'] : null);
        } catch (\PDOException $th) {
            echo ($th->getMessage());
        }
    }

    //SELECT * FROM `topics` WHERE `boards_idboards` = 1 AND `date-creation` IS NOT NULL ORDER BY `date-edit`, `date-creation` 
}

//SELECT topics.* FROM messages INNER JOIN topics ON messages.topics_idtopics = topics.idtopics WHERE topics.boards_idboards = 2 GROUP BY topics.idtopics ORDER BY `messages`.`date-creation` DESC LIMIT 3 
