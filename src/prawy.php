<?php
include("./settings.php");

$conn = new mysqli($servername, $username, $password,"default_database",$port);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if ($id) {

    $sql = "SELECT * FROM users WHERE id = $id";

    $result = $conn->query($sql);

    if ($result->num_rows === 1){
        $row = $result->fetch_object(User::class);
        ?>
        <form method="GET">
            <label class="form-label" for="id">ID:</label><input class="form-control" id="id" name="id" type="number" value="<?= $row->id?>" readonly disabled>
             <label class="form-label" for="email"> Email: <input  class="form-control" id="email" name="email" type="email" value="<?= $row->email ?>">
             <label class="form-label" for="createdAt">Data utworzenia: <input class="form-control" id="createdAt" name="createdAt" type="datetime-local" value="<?= $row->getCreatedAt() ?>">
           <div class="mt-2">
            <input class="btn btn-danger" type="button" value="Zmień hasło">
            <input class="btn btn-primary"  type="submit" value="Zapisz">
            </div>
        </form>

        <?php
    }

}


$conn->close();