<?php

require_once __DIR__."/../vendor/autoload.php";

if(isset($_POST["addConnection"])) {
    $Connection = new Connection();
    $Connection->name = $_POST["name"];
    $Connection->host = $_POST["host"];
    $Connection->username = $_POST["username"];
    $Connection->port = $_POST["port"];
    $Connection->password = $_POST["password"];
    $Connection->software = $_POST["software"];
    $Connection->protocol = $_POST["protocol"];
    $Connection->addToFile(__DIR__."/../resources/connections.json");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>SSH Dashboard</title>

    <link rel="stylesheet" href="stylesheets/style.css">
</head>
<body>


<div class="page">
    <div class="page-body">
        <div class="box-content">
            <h1>Add SSH connection</h1>

            <form action="" method="POST">
                <p class="form-item">
                    <label for="software">Software:</label>
                    <select name="software" id="software">
                        <option value="putty">PuTTY</option>
                        <option value="winscp">WinSCP</option>
                    </select>
                </p>
                <p class="form-item">
                    <label for="protocol">Protocol:</label>
                    <select name="protocol" id="protocol">
                        <option value="ssh">SSH</option>
                        <option value="ftp">FTP</option>
                        <option value="sftp">SFTP</option>
                        <option value="ftps">FTPS</option>
                    </select>
                </p>
                <p class="form-item">
                    <label for="name">Name:</label>
                    <input type="text" name="name" id="name" required>
                </p>
                <p class="form-item">
                    <label for="host">Host:</label>
                    <input type="text" name="host" id="host" required>
                </p>
                <p class="form-item">
                    <label for="username">Username:</label>
                    <input type="text" name="username" id="username"
                ></p>
                <p class="form-item">
                    <label for="port">Port:</label>
                    <input type="number" name="port" id="port" value="22" required>
                </p>
                <p class="form-item">
                    <label for="password">Password:</label>
                    <input type="password" name="password" id="password">
                </p>
                <input type="submit" name="addConnection" value="Add" class="btn">
                <br>
                <a href="index.php" class="btn return">Back to overview</a>
            </form>
        </div>
    </div>
</div>
</body>
</html>
