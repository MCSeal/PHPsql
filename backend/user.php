<?php

class user
{
    private $db;

    public function __construct($conn)
    {
        $this->db = $conn;
    }

    public function insertUser($username, $password)
    {
        try {
            $result = $this->getUserByUsername($username);
            //num refers to other function g etuserbyusername num
            if ($result["num"] > 0) {
                return false;
            } else {
                $new_password = md5($password.$username);
                // sql insert statement into db
                $sql =
                    "INSERT INTO users (username,password) VALUES (:username, :password)";
                //pdo statement will be passed to this, and will be executed... stmt and this will reference this.db which is assigned from the pdo
                //prepare takes the sql and prepares it for execution

                $stmt = $this->db->prepare($sql);
                //this binds the prameters to the statement, a type of sql injection prevention
                $stmt->bindParam(":username", $username);
                $stmt->bindParam(":password", $new_password);
                $stmt->execute();
                return true;
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
    public function getUser($username, $password)
    {
        try {
            $sql =
                "select * from users where username = :username AND password = :password";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(":username", $username);
            $stmt->bindParam(":password", $password);
            $stmt->execute();
            // fetch is needed for a single get request
            $result = $stmt->fetch();
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
    public function getUserByUsername($username)
    {
        try {
            $sql =
                "select count(*) as num from users where username = :username";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(":username", $username);
            $stmt->execute();
            // fetch is needed for a single get request
            $result = $stmt->fetch();
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
}
