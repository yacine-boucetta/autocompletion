<?php
$_GET['complete'] = '';
require 'pokemon.php';
$poke = new Pokemon();
$res = $poke->searchAtStart2($_GET['siteSearch']);
$res2 = $poke->searchBetween2($_GET['siteSearch']);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./style3.css" rel="stylesheet">
    <script src="script.js"></script>
    <title>Document</title>
</head>

<body>
    <header>
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
    </header>

    <main>
            <?php foreach ($res as $value) {?>
               <a href="./element.php?id=<?= $value['id']?>"><?=$value['name_french']?></a><br>
               <span><?= $value['name_english'] ?>,<?= $value['name_japanese'] ?>,<?= $value['name_chinese']?>,
               <?= $value['type0']?>,<?= $value['type1']?></span><br><hr>
        
            <?php ;}?>
            <?php foreach ($res2 as $value) {?>
               <a href="./element.php?id=<?= $value['id']?>"><?=$value['name_french']?></a><br>
               <span><?= $value['name_english'] ?>,<?= $value['name_japanese'] ?>,<?= $value['name_chinese']?>,
               <?= $value['type0']?>,<?= $value['type1']?></span><br><hr>
            <?php ;}?>
             
    </main>



</body>

</html>