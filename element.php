<?php
$_GET['complete'] = '';
require 'pokemon.php';
$poke = new Pokemon();
$res = $poke->pokeId($_GET['id']);
if (isset($_GET['search'])){
    header('Location:recherche.php?siteSearch=');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./style2.css" rel="stylesheet">
    <script src="script.js"></script>
    <title>Document</title>
</head>

<body>
    <header>
        <nav>
        <h1>Recherchez votre pokemon</h1>

<img src="./Design_plat_Pokéballpng.png"></img>
        <form method='get' action='recherche.php'>
            <label for="siteSearch"></label>
            <section id='test'>
            <input type="search" id="siteSearch" name="siteSearch" autocomplete="off">
            <div></div>
</section>
<button class='btn'type="submit" name='search'>wingardium leviosa</button>
        </form>
        </nav>
    </header>

    <main>
        <table>
            <thead>
        <tr>
                    <th>id</th>
                    <th>name french</th>
                    <th>name english</th>
                    <th>name japanese</th>
                    <th>name chinese</th>
                    <th>type 0</th>
                    <th>type 1</th>
                    <th>base HP</th>
                    <th>base Attack</th>
                    <th>base Defense</th>
                    <th>base Sp Attack</th>
                    <th>base Sp Defense</th>
                    <th>base Speed</th>
                </tr></thead>
            <?php foreach ($res as $value) { ?>
                <tr>
                    <td><?= $value['id'] ?></td>
                    <td><?= $value['name_french'] ?></td>
                    <td><?= $value['name_english'] ?></td>
                    <td><?= $value['name_japanese'] ?></td>
                    <td><?= $value['name_chinese']?></td>
                    <td><?= $value['type0']?></td>
                    <td><?= $value['type1']?></td>
                    <td><?= $value['base HP']?></td>
                    <td><?= $value['base Attack']?></td>
                    <td><?= $value['base Defense']?></td>
                    <td><?= $value['base Sp Attack']?></td>
                    <td><?= $value['base Sp Defense']?></td>
                    <td><?= $value['base Speed']?></td>
                </tr>
            <?php } ?>
        </table>
    </main>



</body>

</html>