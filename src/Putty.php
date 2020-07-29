<?php


class Putty
{
    public static function openConnection(SSHConnection $SSHConnection)
    {
        $host = $SSHConnection->username
            ? $SSHConnection->username . "@" . $SSHConnection->host
            : $SSHConnection->host;

        if($SSHConnection->password) {
            return exec("putty -ssh {$host} {$SSHConnection->port} -pw {$SSHConnection->password}");
        }
        return exec("putty -ssh {$host} {$SSHConnection->port}");
    }
}