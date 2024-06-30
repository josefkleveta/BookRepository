<!DOCTYPE html>
<html lang="cs">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vyhledávání</title>
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
        <div class="vyhledavani">
            <form method="post">
                <h2>Vyhledávání</h2>
                <table>
                    <tr>
                        <td>Název knihy:</td>
                        <td><input type="text" name="nazev"></td>
                    </tr>
                    <tr>
                        <td>Jméno autora:</td>
                        <td><input type="text" name="jmeno"></td>
                    </tr>

                    <tr>
                        <td>Příjmení autora: </td>
                        <td><input type="text" name="prijmeni"></td>
                    </tr>


                    <tr>
                        <td>ISBN:</td>
                        <td><input type="text" name="isbn"></td>
                    </tr>

                    <tr>
                        <td><input type="submit" value="Hledat"></td>
                    </tr>
                </table>
                <?php
                include("dbLogin.php");

                if (isset($_POST['nazev']))
                    $nazev = htmlspecialchars($_POST["nazev"]);
                else
                    $nazev = trim('');

                if (isset($_POST['jmeno']))
                    $jmeno = htmlspecialchars($_POST["jmeno"]);
                else
                    $jmeno = trim('');

                if (isset($_POST['prijmeni']))
                    $prijmeni = htmlspecialchars($_POST["prijmeni"]);
                else
                    $prijmeni = trim('');

                if (isset($_POST['isbn']))
                    $isbn = htmlspecialchars($_POST["isbn"]);
                else
                    $isbn = trim('');

                if (!($con = mysqli_connect($host, $user, $password, $db))) {
                    die("Nelze se pripojit k serveru.</body></html>");
                }

                mysqli_query($con, "SET NAMES 'utf8'");
                $dotaz = "SELECT isbn, jmeno, prijmeni, nazev, popis FROM knihovna_db where nazev='$nazev' OR jmeno='$jmeno' OR prijmeni='$prijmeni' OR isbn='$isbn'";
                if (!($vysledek = mysqli_query($con, $dotaz))) {
                    die("Nelze provest vyhledavani.</body></html>");
                }
                ?>
                <?php

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
            </form>
        </div>
    </section>

</body>

</html>