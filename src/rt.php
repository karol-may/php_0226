<?php

include("./Model/User.php");
include("./Model/Log.php");

include("./settings.php");




$conn = new mysqli($servername, $username, $password,"default_database",$port);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$email = $_POST['email'] ?? "";
$id = $_GET['id'] ?? null;



if ($email) {
    $conn->begin_transaction();
    try{
        $sql = "INSERT INTO users (email,password_hash) VALUES ('$email', 0)";
        $result = $conn->query($sql);
    } catch (mysqli_sql_exception $e) {
        $conn->rollback();

        new Log("user",$e->getMessage());

    } finally {
        if (isset($result)) { $conn->commit(); }
    }
}



$sql = "SELECT * FROM users";

$result = $conn->query($sql);

if($result->num_rows){
    echo "<table class='table table-condensed table-bordered table-striped'>";
    echo "<tr><th>ID</th><th>EMAIL</th><th>AKCJE</th></tr>";

    while($row = $result->fetch_assoc()){

        echo "<tr><td>{$row['id']}</td><td>{$row['email']}</td><td><a href='?id={$row['id']}'>Zobacz</a></td></tr>";

    }
    echo "</table>";
}




$conn->close();

?>
<p>
    <?php
    ?>

    <form method="POST">
        <input name="email" type="email" value="<?=$email?>"/>
        <button type="submit">Wyślij</button>
    </form>
</p>