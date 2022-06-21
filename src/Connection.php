<?php


class Connection
{
    public $name = "";
    public $port = 22;
    public $host = "";
    public $username = "";
    public $password = "";
    public $software = "";
    public $protocol = "";

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
     * @return Connection[]
     */
    public static function fromJSONFile(string $file): array
    {
        if( ! file_exists($file)) {
            return [];
        }
        return array_map(function($entry) {
            $Connection = new Connection();
            $Connection->name = $entry->name ?? "";
            $Connection->port = $entry->port ?? 22;
            $Connection->host = $entry->host ?? "";
            $Connection->username = $entry->username ?? "";
            $Connection->password = $entry->password ?? "";

            // legacy support
            $Connection->software = $entry->software ?? "putty";
            $Connection->protocol = $entry->protocol ?? "ssh";

            return $Connection;
        }, json_decode(file_get_contents($file)));
    }
}