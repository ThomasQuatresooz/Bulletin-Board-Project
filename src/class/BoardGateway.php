<?php
require_once("DatabaseManager.php");
require_once("Board.php");

class BoardGateway
{
    public function findAll(): ?iterable
    {
        try {
            $db = DatabaseManager::getInstance()->getDatabase();
            $sth = $db->prepare('SELECT * FROM boards');
            $sth->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Board');
            return ($sth->execute()) ? $sth->fetchAll() : null;
        } catch (\PDOException $th) {
            echo ($th->getMessage());
        }
    }

    public function findById($id) :?Board
    {
        try {
            $db = DatabaseManager::getInstance()->getDatabase();
            $sth = $db->prepare('SELECT * FROM boards WHERE boards.idboards  = ?');
            $sth->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Board');
            return ($sth->execute([$id])) ? $sth->fetch() : null;
        } catch (\PDOException $th) {
            echo ($th->getMessage());
        }
    }
}
