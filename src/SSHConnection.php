<?php


class SSHConnection
{
    public $name = "";
    public $port = 22;
    public $host = "";
    public $username = "";
    public $password = "";

    public function addToFile(string $file)
    {
        if( ! file_exists($file)) {
            return (bool) file_put_contents($file, json_encode([$this]));
        }
        $connections = self::fromJSONFile($file);
        foreach($connections as $connection) {
            if($connection->name === $this->name) {
                return false;
            }
        }
        $connections[] = $this;
        return (bool) file_put_contents($file, json_encode($connections));
    }

    /**
     * @param string $file
     * @return SSHConnection[]
     */
    public static function fromJSONFile(string $file): array
    {
        if( ! file_exists($file)) {
            return [];
        }
        return array_map(function($entry) {
            $SSHConnection = new SSHConnection();
            $SSHConnection->name = $entry->name ?? "";
            $SSHConnection->port = $entry->port ?? 22;
            $SSHConnection->host = $entry->host ?? "";
            $SSHConnection->username = $entry->username ?? "";
            $SSHConnection->password = $entry->password ?? "";
            return $SSHConnection;
        }, json_decode(file_get_contents($file)));
    }
}