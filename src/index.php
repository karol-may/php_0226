<?php

class Log {

    private $filename = "user.log";

    function __construct($message){
        $date = new DateTime();
        $message = $date->format("Y-m-d h:i:s") ." / ". $message . "\r\n";

        if (!file_exists($this->filename)) {
            touch($this->filename);
        }
            $file = fopen($this->filename, 'a');
            fwrite($file, $message);
            fclose($file);
    }
}

class User {
    public $id;
    public $email;
    public $password_hash;
    private $created_at;

    public function getCreatedAt() {
        $date = new DateTime($this->created_at);

        return $date->modify("+1 week")->format('Y-m-d');;
    }
}


$servername = "database";
$username = "username";
$password = "password";
$port = 3306;


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

        new Log($e->getMessage());

    } finally {
        if (isset($result)) { $conn->commit(); }
    }
}



$sql = "SELECT * FROM users";

$result = $conn->query($sql);

if($result->num_rows){
    echo "<table border=1>";
    echo "<tr><th>ID</th><th>EMAIL</th><th>AKCJE</th></tr>";

    while($row = $result->fetch_assoc()){

        echo "<tr><td>{$row['id']}</td><td>{$row['email']}</td><td><a href='?id={$row['id']}'>Zobacz</a></td></tr>";

    }
    echo "</table>";
}


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

?>
<p>

    <?php

    ?>

    <form method="POST">
        <input name="email" type="email" value="<?=$email?>"/>
        <button type="submit">Wyślij</button>
    </form>

</p>