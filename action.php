<?php
    require __DIR__ . '/vendor/autoload.php';
    $dotenv = Dotenv\Dotenv::create(__DIR__);
    $dotenv->load();
    $servername = getenv('servername');
    $username = getenv('username');
    $password = getenv('password');
    $dbname = getenv('dbname');
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO MyGuests (firstname, lastname)
        VALUES ('$firstname', '$lastname')";
        $conn->exec($sql);
        echo "New record created successfully with first name $firstname and last name $lastname.";
        }
    catch(PDOException $e)
        {
        echo $sql . "<br>" . $e->getMessage();
        }
    
    $conn = null;
?>