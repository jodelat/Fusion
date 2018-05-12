<?php
require 'db.php';
$sql = 'SELECT * FROM clients';
$statement = $connection->prepare($sql);
$statement->execute();
$people = $statement->fetchAll(PDO::FETCH_OBJ);

$sections = 'SELECT * FROM sections';
$sectionEx = $connection->prepare($sections);
$sectionEx->execute();
$sectionList = $sectionEx->fetchAll(PDO::FETCH_OBJ);

$links = 'SELECT * FROM links';
$linkEx = $connection->prepare($links);
$linkEx->execute();
$linkList = $linkEx->fetchAll(PDO::FETCH_OBJ);
?>

 <?php require 'header.php'; ?>
    <div class="container">
      <div class="card mt-5">
        <div class="card-header">
          <h2>All Clients</h2>
        </div>
        <div class="card-body">
          <table class="table table-bordered">
            <tr>
              <th>ID</th>
              <th>Name</th>
              <th>Action</th>
            </tr>
            <?php foreach($people as $person): ?>
            <tr>
              <td><?= $person->id; ?></td>
              <td><?= $person->name; ?></td>
              <td>
                <a href="edit.php?id=<?= $person->id ?>" class="btn btn-info">Edit</a>
                <a href="sectionCreate.php?id=<?= $person->id ?>" class="btn btn-info">Section Create</a>
                <a onclick="return confirm('Are you sure you want to delete this entry?')" href="delete.php?id=<?= $person->id ?>" class="btn btn-danger">Delete</a>
              </td>
            </tr>
          <?php endforeach; ?>
          </table>
        </div>
      </div>
      <div class="card mt-5">
        <div class="card-header">
          <h2>All Sections</h2>
        </div>
        <div class="card-body">
          <table class="table table-bordered">
            <tr>
              <th>ID</th>
              <th>Name</th>
              <th>client_id</th>
              <th>Action</th>
            </tr>
            <?php foreach($sectionList as $person): ?>
            <tr>
              <td><?= $person->id; ?></td>
              <td><?= $person->name; ?></td>
              <td><?= $person->client_id; ?></td>
              <td>
                <a href="editSection.php?id=<?= $person->id ?>" class="btn btn-info">Edit</a>
                <a href="linkCreate.php?id=<?= $person->id ?>" class="btn btn-info">Link Create</a>
                <a onclick="return confirm('Are you sure you want to delete this entry?')" href="deleteSection.php?id=<?= $person->id ?>" class="btn btn-danger">Delete</a>
              </td>
            </tr>
          <?php endforeach; ?>
          </table>
        </div>
      </div>
      <div class="card mt-5">
        <div class="card-header">
          <h2>All Links</h2>
        </div>
        <div class="card-body">
          <table class="table table-bordered">
            <tr>
              <th>ID</th>
              <th>Name</th>
              <th>section_id</th>
              <th>Action</th>
            </tr>
            <?php foreach($linkList as $person): ?>
            <tr>
              <td><?= $person->id; ?></td>
              <td><?= $person->name; ?></td>
              <td><?= $person->section_id; ?></td>
              <td>
                <a href="editLink.php?id=<?= $person->id ?>" class="btn btn-info">Edit</a>
                <a onclick="return confirm('Are you sure you want to delete this entry?')" href="deleteLink.php?id=<?= $person->id ?>" class="btn btn-danger">Delete</a>
              </td>
            </tr>
          <?php endforeach; ?>
          </table>
        </div>
      </div>
    </div>
  <?php require 'footer.php'; ?>
