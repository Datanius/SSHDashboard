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

<a href="addConnection.php">Add connection</a>

<h1>All connections</h1>

<form action="" method="POST">
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Host</th>
                <th>Username</th>
                <th>Port</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($connections as $SSHConnection) { ?>
                <tr>
                    <td><?php echo $SSHConnection->name; ?></td>
                    <td><?php echo $SSHConnection->host; ?></td>
                    <td><?php echo $SSHConnection->username; ?></td>
                    <td><?php echo $SSHConnection->port; ?></td>
                    <td><input style="background: blue; color: white;" type="submit" name="openConnection" value="<?php echo $SSHConnection->name; ?>"></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</form>
