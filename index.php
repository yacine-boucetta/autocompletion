<?php
if (isset($_GET['search'])) {
    header('Location:recherche.php?siteSearch=');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./style.css" rel="stylesheet">
    <script src="script.js"></script>
    <title>Document</title>
</head>

<body>
    <header>
        <nav>

        </nav>
    </header>
    <main>
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
   
    </main>

</body>

</html>