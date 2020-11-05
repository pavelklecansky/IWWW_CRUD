<?php


class UzivatelRepository
{
    static function getAll()
    {
        $conn = Connection::getPdoInstance();
        $stmt = $conn->prepare("SELECT * FROM uzivatel");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    static function getUzivatelById($id)
    {
        $conn = Connection::getPdoInstance();
        $stmt = $conn->prepare("SELECT * FROM uzivatel WHERE id=:id");
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        return $stmt->fetch();
    }

    static function uzivatelExists($email)
    {
        $conn = Connection::getPdoInstance();
        $stmt = $conn->prepare("SELECT * FROM uzivatel WHERE email=:email");
        $stmt->bindParam(":email", $email);
        $stmt->execute();
        $row = $stmt->fetch();
        if ($row) {
            return $row;
        } else {
            return false;
        }
    }

    static function createUser($email, $password)
    {

        $conn = Connection::getPdoInstance();
        $stmt = $conn->prepare("INSERT INTO uzivatel(email, password) VALUES (:email,:password)");
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":password", $hashedPassword);
        $stmt->execute();
    }

    static function updateUser($id, $email, $role)
    {
        $conn = Connection::getPdoInstance();
        $stmt = $conn->prepare("UPDATE uzivatel SET email=:email, role=:role WHERE id=:id");
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":role", $role);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
    }
}