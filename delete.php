<?php
require __DIR__ . '/vendor/autoload.php';
$dotenv = Dotenv\Dotenv::create(__DIR__);
$dotenv->load();
$servername = getenv('servername');
$username = getenv('username');
$password = getenv('password');
$dbname = getenv('dbname');

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "DELETE FROM MyGuests WHERE id=1";
    $conn->exec($sql);
    echo "Record deleted";
}
catch(PDOException $e)
    {
        echo$sql . "<br>" . $e->getMessage();
    }
    $conn=null;
?>