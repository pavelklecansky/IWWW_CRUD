<?php
function __autoload($class)
{
    require_once './classes/' . $class . '.php';
}

session_start();
ob_start();
if (!isset($_SESSION["id"])) {
    header("location: ../login.php");
    exit();
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
    <?php
    $dataTable = new DataTable(UzivatelRepository::getAll());
    $dataTable->addColumn("id", "Id");
    $dataTable->addColumn("email", "Email");
    $dataTable->addColumn("role", "Role");
    $dataTable->render();
    ?>
</div>
<?php
include "footer.php";
?>


</body>
</html>
