<!DOCTYPE html>
<html lang="cs">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<nav>
    <ul>
        <li><a href="prehled.php">Seznam knih</a></li>
        <li><a href="vyhledavani.php">Vyhledávání</a></li>
        <li><a href="vlozeni.php">Přidání knihy</a></li>
    </ul>
</nav>

<body>
    <?php
    include("dbLogin.php");
    $hledej = (!htmlspecialchars($_POST["hledat"]));
    if (!($con = mysqli_connect($host, $user, $password, $db))) {
        die("Nelze se pripojit k serveru.</body></html>");
    }
    $dotaz = "SELECT nazev FROM knihovna_db where nazev='$hledej'";
    if (!($vysledek = mysqli_query($con, $dotaz))) {
        die("Nelze provest vyhledavani.</body></html>");
    }

    /* $dotaz = "SELECT isbn, jmeno, prijmeni, nazev, popis FROM knihovna_db where nazev='$hledej' || popis='$hledej'  || jmeno='$hledej' || prijmeni='$hledej'  || isbn='$hledej'";
        if (!($vysledek = mysqli_query($con, $dotaz))) {
            die("Nelze provest vyhledavani.</body></html>");
        } */

    ?>
    <h1>Vysledky</h1>
    <table border="1">
        <?php
        while ($radek = mysqli_fetch_array($vysledek)) {
            echo "<tr> <th>" . $radek["nazev"] . "</th><th>" . $radek["cena"] . "</th></tr>";
            echo "<tr><td colspan=\"2\">" . $radek["popis"] . "</td></tr>";
        }
        mysqli_free_result($vysledek);
        mysqli_close($con);

        ?>
    </table>


</body>

</html>