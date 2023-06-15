<?php
include "header.php";

?>

<div class="container">
    <form action="valideAjoutNationalite.php" method="post">
        <div class="form-group">
            <label for="libelle" >Libellé</label>
            <input type="text" class="form-control" id="libelle" placeholder="Saisissez le libellé" name="libelle">
        </div>
        <div class="row">
            <div class="col"><a href="listeNationalites.php" class="btn btn-warning">Revenir à la liste des nationalités</a></div>
            <div class="col"> <button type="submit" class="btn btn-success">Ajouter</button></div>
        </div>
    </form>
</div>

<?php
include "footer.php";
