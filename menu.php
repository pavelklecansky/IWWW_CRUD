<div>
    <nav>
        <a href="index.php">Úvod</a>
        <?php
        if ($_SESSION["role"] == "Admin" ) {
            echo '<a href="uzivateleView.php">Seznam Uzivatelu</a>';
        }
        ?>
        <a href="uzivatelView.php">Můj Učet</a>
        <a href="uzivatelEdit.php">Edit</a>
        <a href="includes/logout.inc.php">Odhlasit</a>
    </nav>
</div>