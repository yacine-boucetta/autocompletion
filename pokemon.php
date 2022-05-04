<?php

session_start();

class Pokemon
{
    protected $db;
    function __construct()
    {
        try {
            $this->db = new PDO('mysql:host=localhost;dbname=autocompletion;charset=utf8', 'root', 'root');
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo 'Echec de la connexion : ' . $e->getMessage();
            exit;
        }
    }


    function searchAtStart($search)
    {
        $sql = 
        "SELECT * FROM `pokemon` 
        WHERE `name_french`Like '$search%' ORDER BY `name_french`ASC LIMIT 5 ";

        $nameFrench = $this->db->prepare("$sql");
        $nameFrench->execute();
        $frenchResult = $nameFrench->fetchAll(PDO::FETCH_ASSOC);
        
        echo json_encode($frenchResult); 
    }

    function searchBetween($search)
    {
        $sql2 = 
        "SELECT * FROM `pokemon` 
        WHERE `name_french`Like '%$search%' AND `name_french` NOT LIKE'$search%' ORDER BY `name_french`ASC LIMIT 5";
        $nameFrench2 = $this->db->prepare("$sql2");
        $nameFrench2->execute();
        $frenchResult2 = $nameFrench2->fetchall(PDO::FETCH_ASSOC);
    
        echo json_encode($frenchResult2); 
}

function searchAtStart2($search)
{
    $sql = 
    "SELECT * FROM `pokemon` 
    WHERE `name_french`Like '$search%' LIMIT 5";

    $nameFrench = $this->db->prepare("$sql");
    $nameFrench->execute();
    $frenchResult = $nameFrench->fetchAll(PDO::FETCH_ASSOC);

    return ($frenchResult);
}

function searchBetween2($search)
{
    $sql2 = 
    "SELECT * FROM `pokemon` 
    WHERE `name_french`Like '%$search%' AND `name_french` NOT LIKE'$search%' LIMIT 5";
    $nameFrench2 = $this->db->prepare("$sql2");
    $nameFrench2->execute();
    $frenchResult2 = $nameFrench2->fetchall(PDO::FETCH_ASSOC);
 return ($frenchResult2);
}
function pokeId($search)
{
    $sql2 = 
    "SELECT * FROM `pokemon` 
    WHERE id=:id";
    $nameFrench2 = $this->db->prepare("$sql2");
    $nameFrench2->execute(array(
        ':id'=>$search,
    )
    );
    $frenchResult2 = $nameFrench2->fetchall(PDO::FETCH_ASSOC);
 return ($frenchResult2);
}

}


if($_GET['complete']==1){
$poke = new Pokemon();
$poke->searchAtStart($_POST['siteSearch']);
}

if($_GET['complete']==2){
    $poke = new Pokemon();
    $poke->searchBetween($_POST['siteSearch']);
    }
