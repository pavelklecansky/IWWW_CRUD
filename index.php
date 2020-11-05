
<?php
function __autoload($class) {
    require_once  './classes/' . $class .'.php';
}
session_start();
ob_start();
if (!isset($_SESSION["id"])){
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
  <h1>Index</h1>
</div>
<?php
include "footer.php";
?>


</body>
</html>
