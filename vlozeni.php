<!DOCTYPE html>
<html lang="cs">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vložení nového příspěvku</title>
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
        <form method="post" action="nova_kniha.php" class="vlozeni">
            <table>
                <h2>Přídání knihy do katalogu</h2>
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
                    <td>Popis knihy:</td>
                    <td><textarea name="popis" cols="30" rows="10"></textarea></td>
                </tr>
                <tr>
                    <td><input type="submit" value="Uložit do databáze"></td>
                </tr>
            </table>
        </form>
    </div>
</body>

</html>