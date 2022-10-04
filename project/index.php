<?php
require 'db.php';

$sql = 'SELECT * FROM employe';
$statement = $connection->prepare($sql);
$statement->execute();
$employe = $statement->fetchAll(PDO::FETCH_OBJ);

 ?>
<?php require 'header.php'; ?>
<div class="container">
  <div class="card mt-5">
  <div class="text-left">
  <a  href="create.php" class="btn btn-info " >Create a person</a>
  </div>
    <div class="text-right">
    <a  href="recherche.php" class="btn btn-secondary btn-lg" >search</a>
    </div>
    <div class="card-header">
    
    
      <h2>Gestion Employés</h2>
    </div>
    
    <div class="card-body">
      <table class="table table-bordered">
        <tr>
          <th>Num_Emp</th>
          <th>Nom_Emp</th>
          <th>Prenom_Emp</th>
          <th>Adresse</th>
          <th>Date_embauche</th>
          <th>Nom_Service</th>
        </tr>
        <?php foreach($employe as $person): 
         
          ?>
          <tr>
          <td><?= $person->id; ?></td>
            <td><?= $person->nom_emp; ?></td>
            <td><?= $person->prenom_emp; ?></td>
            <td><?= $person->adresse; ?></td>
            <td><?= $person->date_embauche; ?></td>
            <td><?= $person->nom_service; ?></td>
           
           
            <td>
              <a href="edit.php?id=<?= $person->id ?>" class="btn btn-info">Edit</a>
              <a onclick="return confirm('Are you sure you want to delete this entry?')" href="delete.php?id=<?= $person->id ?>" class='btn btn-danger'>Delete</a>
            </td>
          </tr>
         
       <?php endforeach; ?>
      </table>
    </div>
  </div>
</div>
<?php require 'footer.php'; ?>
