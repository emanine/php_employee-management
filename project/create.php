<?php
require 'db.php';
$message = '';
if (isset ($_POST['nom_emp'])  && isset($_POST['prenom_emp']) && isset($_POST['adresse']) && isset($_POST['date_embauche']) && isset($_POST['nom_service']) ) {
  $nom_emp = $_POST['nom_emp'];
  $prenom_emp = $_POST['prenom_emp'];
  $adresse = $_POST['adresse'];
  $date_embauche = $_POST['date_embauche'];
  $nom_service = $_POST['nom_service'];
  $sql = 'INSERT INTO employe(nom_emp, prenom_emp, adresse, date_embauche, nom_service) VALUES(:nom_emp, :prenom_emp,:adresse,:date_embauche,:nom_service)';
  $statement = $connection->prepare($sql);
  if ($statement->execute([':nom_emp' => $nom_emp, ':prenom_emp' => $prenom_emp,':adresse' => $adresse,':date_embauche' => $date_embauche,':nom_service' => $nom_service])) {
    
    header("Location: index.php");
  }



}


 ?>
<?php require 'header.php'; ?>
<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>Create a person</h2>
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
          <input  type="text" name="nom_emp" id="nom_emp" class="form-control">
        </div>
        <div class="form-group">
          <label for="prenom_emp">prenom_emp</label>
          <input type="text"  name="prenom_emp" id="prenom_emp" class="form-control">
        </div>
        <div class="form-group">
          <label for="adresse">adresse</label>
          <input type="text"  name="adresse" id="adresse" class="form-control">
        </div>
        <div class="form-group">
          <label for="date_embauche">date_embauche</label>
          <input type="date"  name="date_embauche" id="date_embauche" class="form-control">
        </div>
        <div class="form-group">
          <label for="nom_service">nom_service</label>
          <input type="text"  name="nom_service" id="nom_service" class="form-control">
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-info">Create a person</button>
        </div>
      </form>
    </div>
  </div>
</div>
<?php require 'footer.php'; ?>
