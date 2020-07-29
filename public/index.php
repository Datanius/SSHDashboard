<?php

require_once __DIR__."/../vendor/autoload.php";

$connections = SSHConnection::fromJSONFile(__DIR__."/../resources/connections.json");

if(isset($_POST["openConnection"])) {
    foreach($connections as $connection) {
        if($connection->name === $_POST["openConnection"]) {
            Putty::openConnection($connection);
            continue;
        }
    }
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
            <h1>All connections</h1>

            <form action="" method="POST">
                <?php foreach($connections as $SSHConnection) { ?>
                    <input type="submit" name="openConnection" title="<?php echo $SSHConnection->name; ?>" value="<?php echo $SSHConnection->name; ?>">
                <?php } ?>
            </form>

            <a href="addConnection.php" class="btn full-width">+ Add SSH connection</a>
        </div>
    </div>
</div>



</body>
</html>
