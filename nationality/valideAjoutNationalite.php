<?php
include "header.php";

//requete sql
$hostnom = 'host=localhost';
$usernom = 'root';
$password = '';
$bdd = 'nationalite';

try {
    $monPdo = new PDO("mysql:$hostnom;dbname=$bdd;charset=utf8",$usernom, $password);
    $monPdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo $e ->getMessage();
    $monPdo = null;
}

//recuperer le name du form

$libelle=$_POST['libelle'];


//recupère les données de la bdd
$req = $monPdo ->prepare("insert into nationalite(libelle) values (:libelle)");
$req->bindParam(':libelle', $libelle);
$req->execute();

//variable qui récupère les données de la bdd nationalite
$lesNationalites = $req->fetchAll();
?>

    <main>
        <h1>Les différentes nationalités</h1>
        <div class="btn-group" role="group" aria-label="Basic mixed styles example">
            <button type="button" class="btn btn-danger">Left</button>
            <button type="button" class="btn btn-warning">Middle</button>
            <button type="button" class="btn btn-success">Right</button>
        </div>
    </main>

<?php
include "footer.php";

