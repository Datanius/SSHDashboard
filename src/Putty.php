<?php


class Putty extends Software
{
    public static function openConnection(Connection $Connection)
    {
        $host = $Connection->username
            ? $Connection->username . "@" . $Connection->host
            : $Connection->host;

        $Command = new Command("putty");
        $Command->addArgument("ssh", "{$host} {$Connection->port}");
        if($Connection->password) {
            $Command->addArgument("pw", $Connection->password);
        }
        $Command->execute();
    }
}