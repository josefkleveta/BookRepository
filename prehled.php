<!DOCTYPE html>
<html lang="cs">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Přehled knih</title>
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

    <section>
        <div class="prehled">
            <?php
            include("dbLogin.php");
            if (!($con = mysqli_connect($host, $user, $password, $db))) {
                die("Nelze se pripojit k db serveru</body></html>");
            }
            mysqli_query($con, "SET NAMES 'utf8'");
            if (!($vysledek = mysqli_query($con, "SELECT isbn, jmeno, prijmeni, nazev, popis FROM knihovna_db"))) {
                die("Nelze provést dotaz</body></html>");
            }
            while ($radek = mysqli_fetch_array($vysledek)) {
            ?>
            <div class="vysledek">
                <h2><?php echo $radek["nazev"] ?></h2>
                <dl>
                    <dt>Autor:</dt>
                    <dd><?php echo $radek["jmeno"] . " " . $radek["prijmeni"] ?></dd>
                    <dt>ISBN:</dt>
                    <dd><?php echo $radek["isbn"] ?></dd>
                </dl>
                <p><?php echo $radek["popis"] ?></p>
            </div>
            <?php
            }
            mysqli_free_result($vysledek);
            mysqli_close($con);
            ?>
        </div>
    </section>

</body>

</html>