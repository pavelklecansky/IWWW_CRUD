<?php

if (isset($_POST["submit"])) {
    session_start();
    $email = $_POST["email"];
    $password = $_POST["password"];

    require_once "../classes/Connection.php";
    require_once "../classes/UzivatelRepository.php";

    $uidExists = UzivatelRepository::uzivatelExists($email);

    if ($uidExists === false) {
        header("location: ../login.php");
        exit();
    }

    $passwordHashed = $uidExists["password"];
    $checkPwd = password_verify($password, $passwordHashed);
    if (!$checkPwd) {
        header("location: ../login.php");
        exit();
    } else {
        $_SESSION["id"] = $uidExists["id"];
        $_SESSION["email"] = $uidExists["email"];
        $_SESSION["role"] = $uidExists["role"];
        header("location: ../index.php");
        exit();
    }


} else {
    header("location: ../login.php");
    exit();
}