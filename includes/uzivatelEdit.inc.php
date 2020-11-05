<?php
if (isset($_POST["submit"])) {
    session_start();
    $id = $_POST["id"];
    $email = $_POST["email"];
    $role = $_POST["role"];

    require_once "../classes/Connection.php";
    require_once "../classes/UzivatelRepository.php";

    UzivatelRepository::updateUser($id, $email, $role);

    header("location: ../uzivatelEdit.php?id=$id");
    exit();


} else {
    header("location: ../uzivatelEdit.php");
    exit();
}