<?php
function __autoload($class)
{
    require_once './classes/' . $class . '.php';
}

session_start();
ob_start();
if (!isset($_SESSION["id"])) {
    header("location: ./login.php");
    exit();
}

$id = $_SESSION["id"];

if (isset($_GET["id"])) {
    if ($_GET["id"] != $_SESSION["id"] && $_SESSION["role"] != "Admin") {
        header("location: ./uzivatelEdit.php");
        exit();
    } else {
        $id = $_GET["id"];
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CRUD</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>

<?php
// vykreslení menu
include "menu.php";
?>
<div id="content">
    <form action="includes/uzivatelEdit.inc.php" method="post">
        <?php
        $uzivatel = UzivatelRepository::getUzivatelById($id);
        $email = $uzivatel["email"];
        $role = $uzivatel["role"];
        echo "<p>Id: $id</p>";
        echo "<input name='id' type='hidden' value='$id'>";
        echo "<p>Email: <input type='text' name='email' value='$email'></p>";
        echo "<p>Role: <input type='text' name='role' value='$role'></p>";
        ?>
        <input type="submit" name="submit" value="Změnit">
    </form>
</div>
<?php
include "footer.php";
?>


</body>
</html>