<?php
require 'db.php';
$id = $_GET['id'];
$sql = 'SELECT * FROM clients WHERE id=:id';
$statement = $connection->prepare($sql);
$statement->execute([':id' => $id]);
$person = $statement->fetch(PDO::FETCH_OBJ);
$message = '';
  if (isset ($_POST['name'])) {
    $name = $_POST['name'];
    $sql = 'UPDATE clients SET name=:name WHERE id=:id';
    $statement = $connection->prepare($sql);
    if($statement->execute([':name' => $name, ':id' => $id])) {
      header("Location: /");
    };
  }


 ?>

 <?php require 'header.php'; ?>
   <div class = "container">
     <div class="card mt-5">
       <div class="card-header">
         <h2>Edit Client</h2>
       </div>
       <div class="card-body">
         <?php if(!empty($message)): ?>
           <div class="alert alert success">
             <?= $message; ?>
           </div>
         <?php endif; ?>
         <form method="post">
           <div class="form-group">
             <label for="name">Name</label>
             <input value="<?= $person->name; ?>" type="text" name="name" id="name" class="form-control"/>
           </div>
           <div class="form-group">
             <button type="submit" class="btn btn-info">Update Client</button>
           </div>
         </form>
       </div>
     </div>
   </div>
 <?php require 'footer.php'; ?>
