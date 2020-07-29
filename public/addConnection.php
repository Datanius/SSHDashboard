<?php

require_once __DIR__."/../vendor/autoload.php";

if(isset($_POST["addConnection"])) {
    $SSHConnection = new SSHConnection();
    $SSHConnection->name = $_POST["name"];
    $SSHConnection->host = $_POST["host"];
    $SSHConnection->username = $_POST["username"];
    $SSHConnection->port = $_POST["port"];
    $SSHConnection->password = $_POST["password"];
    $SSHConnection->addToFile(__DIR__."/../resources/connections.json");
}

?>

<a href="index.php">Overview</a>

<form action="" method="POST">
    <p>Name: <input type="text" name="name"/></p>
    <p>Host: <input type="text" name="host"/></p>
    <p>Username: <input type="text" name="username"/></p>
    <p>Port: <input type="number" name="port"/></p>
    <p>Password: <input type="password" name="password"/></p>
    <input type="submit" name="addConnection" value="Add"/>
</form>
