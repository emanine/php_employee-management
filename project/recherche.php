<?php
if(isset($_POST['search']))
{
    $valueToSearch = $_POST['valueToSearch'];
    $query = "SELECT * FROM `employe` WHERE CONCAT(`nom_service`) LIKE '%".$valueToSearch."%'";
    $search_result = filterTable($query);
    
}
 else {
    $query = "SELECT * FROM `employe`";
    $search_result = filterTable($query);
}

function filterTable($query)
{
    $connect = mysqli_connect("localhost", "root", "", "bd_employee");
    $filter_Result = mysqli_query($connect, $query);
    return $filter_Result;
}

?>


    <?php require 'header.php'; ?>
<div class="container">

  <div class="card mt-5">
        <form action="" method="post">
        <div class="text-left">
  <a  href="index.php" class="btn btn-info " >Back</a>
  </div>
        <div class="text-center " >
            <input type="text" name="valueToSearch" placeholder="ServiceName" class="text-center p-6 ">
            <input type="submit" name="search" value="Search" class="btn aqua-gradient btn-rounded btn-sm my-0"><br><br>
            </div>
            <div class="card-body">
      <table class="table table-bordered">
            
                <tr>
                    <th>Id</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>adresse</th>
                    <th>date</th>
                    <th>service</th>
                </tr>
                <?php while($row = mysqli_fetch_array($search_result)):?>
                <tr>

            <td><?php echo $row['id'];?></td>
            
                    <td><?php echo $row['nom_emp'];?></td>
                    <td><?php echo $row['prenom_emp'];?></td>
                    <td><?php echo $row['adresse'];?></td>
                    <td><?php echo $row['date_embauche'];?></td>
                    <td><?php echo $row['nom_service'];?></td>

          </tr>
          <?php endwhile;?>
            </table>
            </div>
        </form>
        </div>
<div class="card-body">
      <table class="table table-bordered">
<?php require 'footer.php'; ?>


