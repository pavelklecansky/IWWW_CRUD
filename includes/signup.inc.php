<?php

if (isset($_POST["submit"])) {

    $email = $_POST["email"];
    $password = $_POST["password"];


    require_once "../classes/Connection.php";
    require_once "../classes/UzivatelRepository.php";


    if (UzivatelRepository::uzivatelExists($email) == true) {
        header("location: ../register.php");
        exit();
    }

    UzivatelRepository::createUser($email, $password);

    header("location: ../login.php");
    exit();
} else {
    header("location: ../register.php");
    exit();
}