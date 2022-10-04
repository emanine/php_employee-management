<?php
require 'db.php';
$id = $_GET['id'];
$sql = 'SELECT * FROM employe WHERE id=:id';
$statement = $connection->prepare($sql);
$statement->execute([':id' => $id ]);
$person = $statement->fetch(PDO::FETCH_OBJ);
if (isset ($_POST['nom_emp'])  && isset($_POST['prenom_emp']) && isset($_POST['adresse']) && isset($_POST['date_embauche']) && isset($_POST['nom_service']) ) {
  
  $nom_emp = $_POST['nom_emp'];
  $prenom_emp = $_POST['prenom_emp'];
  $adresse = $_POST['adresse'];
  $date_embauche = $_POST['date_embauche'];
  $nom_service = $_POST['nom_service'];
  $sql = 'UPDATE employe SET nom_emp=:nom_emp, prenom_emp=:prenom_emp, adresse=:adresse, date_embauche=:date_embauche, nom_service=:nom_service WHERE id=:id';
  $statement = $connection->prepare($sql);
  if ($statement->execute([':nom_emp' => $nom_emp, ':prenom_emp' => $prenom_emp,':adresse' => $adresse,':date_embauche' => $date_embauche,':nom_service' => $nom_service, ':id' => $id])) {
    header("Location: index.php");
  }



}


 ?>
<?php require 'header.php'; ?>
<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>Update person</h2>
    </div>
    <div class="card-body">
      <?php if(!empty($message)): ?>
        <div class="alert alert-success">
          <?= $message; ?>
        </div>
      <?php endif; ?>
      <form method="post">
        <div class="form-group">
          <label for="nom_emp">nom_emp</label>
          <input value="<?= $person->nom_emp; ?>" type="text" name="nom_emp" id="nom_emp" class="form-control">
        </div>
        <div class="form-group">
          <label for="prenom_emp">prenom_emp</label>
          <input type="text" value="<?= $person->prenom_emp; ?>" name="prenom_emp" id="prenom_emp" class="form-control">
        </div>
        <div class="form-group">
          <label for="adresse">adresse</label>
          <input type="text" value="<?= $person->adresse; ?>" name="adresse" id="adresse" class="form-control">
        </div>
        <div class="form-group">
          <label for="date_embauche">date_embauche</label>
          <input type="date" value="<?= $person->date_embauche; ?>" name="date_embauche" id="date_embauche" class="form-control">
        </div>
        <div class="form-group">
          <label for="nom_service">nom_service</label>
          <input type="text" value="<?= $person->nom_service; ?>" name="nom_service" id="nom_service" class="form-control">
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-info">Update person</button>
        </div>
      </form>
    </div>
  </div>
</div>
<?php require 'footer.php'; ?>
