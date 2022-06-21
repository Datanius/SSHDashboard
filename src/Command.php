<?php

class Command
{
    private $arguments = [];
    private $command;

    public function __construct(string $command)
    {
        $this->command = $command;
    }

    public function addArgument(string $key, string $value, bool $isDoubleSlashes = false)
    {
        $this->arguments[] = [
            "key" => $key,
            "value" => $value,
            "prefix" => $isDoubleSlashes ? "--" : "-"
        ];
    }

    public function execute()
    {
        if (substr(php_uname(), 0, 7) == "Windows") {
            pclose(popen("start /B ". $this->toString(), "r"));
            return;
        }

        exec($this->toString() . " > /dev/null &");
    }

    public function toString(): string
    {
        $command = $this->command;
        foreach($this->arguments as $argument) {
            $command .= " {$argument["prefix"]}{$argument["key"]} {$argument["value"]}";
        }
        return $command;
    }
}