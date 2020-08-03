<?php


class Putty
{
    public static function openConnection(SSHConnection $SSHConnection)
    {
        $host = $SSHConnection->username
            ? $SSHConnection->username . "@" . $SSHConnection->host
            : $SSHConnection->host;

        $Command = new Command("putty");
        $Command->addArgument("ssh", "{$host} {$SSHConnection->port}");
        if($SSHConnection->password) {
            $Command->addArgument("pw", $SSHConnection->password);
        }
        $Command->execute();
    }
}