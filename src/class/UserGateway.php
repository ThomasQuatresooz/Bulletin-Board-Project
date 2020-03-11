<?php
require_once("DatabaseManager.php");

class UserGateway
{

    // public function findAll()
    // {
    //     try {
    //         $db = DatabaseManager::getInstance()->getDatabase();
    //         $sth = $db->prepare('SELECT * FROM users');
    //         $sth->execute();
    //         $users = $sth->fetchAll();
    //         print_r($users);
    //     } catch (\PDOException $th) {
    //         echo ($th->getMessage());
    //     }
    // }

    // public function find($id)
    // {
    //     $statement = 'SELECT * FROM users WHERE id = ?';

    //     try {
    //         $db = DatabaseManager::getInstance()->getDatabase();
    //         $sth = $db->prepare($statement);
    //         $sth->execute([$id]);
    //         $users = $sth->fetchAll();
    //         print_r($users[0]['email']);
    //     } catch (\PDOException $th) {
    //         echo ($th->getMessage());
    //     }
    // }

    public function insert($name, $pwd, $email): ?int
    {
        $statement = 'INSERT INTO users (name, password, email) VALUES ( ?, ?, ?)';

        try {
            $db = DatabaseManager::getInstance()->getDatabase();
            $sth = $db->prepare($statement);
            return ($sth->execute([$name, $pwd, $email])) ? $db->lastInsertId() : null;
        } catch (\PDOException $th) {
            echo ($th->getMessage());
        }
    }

    public function updateNickname($id, $nickname): bool
    {
        $statement = 'UPDATE `users` SET `name` = ? WHERE `users`.`idUsers` = ?';
        try {
            $db = DatabaseManager::getInstance()->getDatabase();
            $sth = $db->prepare($statement);
            return ($sth->execute([$nickname, $id]));
        } catch (\PDOException $th) {
            echo ($th->getMessage());
        }
    }

    public function updateSignature($id, $signature)
    {
        $statement = 'UPDATE `users` SET `signature` = ? WHERE `users`.`idUsers` = ?';
        try {
            $db = DatabaseManager::getInstance()->getDatabase();
            $sth = $db->prepare($statement);
            return ($sth->execute([$signature, $id]));
        } catch (\PDOException $th) {
            echo ($th->getMessage());
        }
    }

    public function updatePassword($id, $pwd)
    {
        $statement = 'UPDATE `users` SET `password` = ? WHERE `users`.`idUsers` = ?';
        try {
            $db = DatabaseManager::getInstance()->getDatabase();
            $sth = $db->prepare($statement);
            return ($sth->execute([$pwd, $id]));
        } catch (\PDOException $th) {
            echo ($th->getMessage());
        }
    }

    public function getPwdFrom($email): ?string
    {
        $statement = 'SELECT password from users WHERE email = ?';
        try {
            $db = DatabaseManager::getInstance()->getDatabase();
            $sth = $db->prepare($statement);
            return ($sth->execute([$email])) ? $sth->fetch()['password'] : null;
        } catch (\PDOException $th) {
            echo ($th->getMessage());
        }
    }

    public function getIdFrom($email)
    {
        $statement = 'SELECT idUsers from users WHERE email = ?';
        try {
            $db = DatabaseManager::getInstance()->getDatabase();
            $sth = $db->prepare($statement);
            return ($sth->execute([$email])) ? $sth->fetch()['idUsers'] : null;
        } catch (\PDOException $th) {
            echo ($th->getMessage());
        }
    }

    public function getAvatarFrom($userId): ?string
    {
        $statement = 'SELECT avatar from users WHERE avatar = ?';
        try {
            $db = DatabaseManager::getInstance()->getDatabase();
            $sth = $db->prepare($statement);
            return ($sth->execute([$userId])) ? $sth->fetch()['avatar'] : null;
        } catch (\PDOException $th) {
            echo ($th->getMessage());
        }
    }

    public function checkIfEmailIsUnique($search): bool
    {
        $statement = 'SELECT COUNT(idUsers) FROM `users` WHERE email = ? ';
        try {
            $db = DatabaseManager::getInstance()->getDatabase();
            $sth = $db->prepare($statement);
            $sth->execute([$search]);
            return ($sth->fetch()[0] == 0);
        } catch (\PDOException $th) {
            echo ($th->getMessage());
        }
    }

    public function checkIfNicknameIsUnique($search): bool
    {
        $statement = 'SELECT COUNT(idUsers) FROM `users` WHERE name = ? ';
        try {
            $db = DatabaseManager::getInstance()->getDatabase();
            $sth = $db->prepare($statement);
            $sth->execute([$search]);
            return ($sth->fetch()[0] == 0);
        } catch (\PDOException $th) {
            echo ($th->getMessage());
        }
    }
}
