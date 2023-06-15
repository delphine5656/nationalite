<?php
include "header.php";
include "connexionPDO.php";

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

$req = $monPdo ->prepare("SELECT * FROM nationalite");

//recupère un type objet
$req->setFetchMode(PDO::FETCH_ASSOC);
$req->execute();

//variable qui récupère les données de la bdd nationalite
$lesNationalites = $req->fetchAll();
?>

    <section>
       <h1>Les différentes nationalités</h1>

        <div class="row pt-3 ">
            <div class="col-9">Liste des nationalités</div>
            <div class="col-3"><a href="formAjoutNationalite.php" class="btn btn-success" >Créer une nationalité </a></div>
        </div>
        <div class="container">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">numéro</th>
                    <th scope="col">libellé</th>
                    <th scope="col">action</th>
                </tr>
                </thead>
                <tbody>

               <?php
               foreach ($lesNationalites as $nationalite){
                 echo"<tr>";
                 echo "<td>$nationalite[num]</td>";
                 echo "<td>$nationalite[libelle]</td>";
                 echo "<td>
                            <a href='' class='btn btn-primary' >Modifier </a>
                            <a href='' class='btn btn-danger' >Supprimer </a>
                        </td>";

                echo "</tr>";

               } ?>


                </tbody>
            </table>
        </div>
    </section>

<?php
include "footer.php";

