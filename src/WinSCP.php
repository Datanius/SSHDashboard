<?php

class WinSCP extends Software
{

    public static function openConnection(Connection $Connection)
    {
        $protocol = $Connection->protocol;
        $username = $Connection->username;
        $password = $Connection->password;
        $host = $Connection->host;
        $port = $Connection->port;

        $Command = new Command("winscp.exe $protocol://$username:$password@$host:$port");
        $Command->execute();
    }
}