<?php
include("./settings.php");

$conn = new mysqli($servername, $username, $password,"default_database",$port);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>
<form>
    ID:<input type="number" placeholder="<?= $id ?>" readonly>
    Email: <input type="email" placeholder="<?= $email ?>">
    Data: <input type="text" placeholder="<?= $created_at ?>" readonly>
    <input type="submit" value="Zmień hasło">
    <input type="submit" value="Zapisz">
</form>

<?php
if ($id) {

    $sql = "SELECT * FROM users WHERE id = $id";

    $result = $conn->query($sql);

    if ($result->num_rows === 1){
        $row = $result->fetch_object(User::class);
        echo "<p>
            <h1>ID:{$row->id}</h1>
            <i>{$row->email}</i>
            <b>{$row->getCreatedAt()}</b>
            <pre>";
              var_dump($row);
        echo "</pre>
        </p>";

    }

}


$conn->close();