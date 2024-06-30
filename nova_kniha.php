<!DOCTYPE html>
<html lang="cs">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Úspěšně uloženo</title>
    <link rel="stylesheet" href="styl.css">
</head>
<nav>
    <ul>
        <li><a href="prehled.php">Seznam knih</a></li>
        <li><a href="vyhledavani.php">Vyhledávání</a></li>
        <li><a href="vlozeni.php">Přidání knihy</a></li>
    </ul>
</nav>

<body>

    <div class="container">
        <?php
        include("dbLogin.php");
        if (!($con = mysqli_connect($host, $user, $password, $db))) {
            die("Nelze se pripojit k db serveru</body></html>");
        }
        mysqli_query($con, "SET NAMES 'utf8'");
        if (
            mysqli_query(
                $con,
                "INSERT INTO knihovna_db(isbn, jmeno, prijmeni, nazev, popis) VALUES(
                '" . addslashes($_POST["isbn"]) . "',
                '" . addslashes($_POST["jmeno"]) . "',
                '" . addslashes($_POST["prijmeni"]) . "',
                '" . addslashes($_POST["nazev"]) . "',
                '" . addslashes($_POST["popis"]) . "')"
            )
        ) {
            echo "<h2>Úspěšně vloženo</h2>";
        } else {
            echo "Nelze vykonat dotaz" . mysqli_error($con);
        }
        mysqli_close($con);
        ?>
    </div>
</body>

</html>