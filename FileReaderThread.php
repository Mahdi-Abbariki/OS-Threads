<?php

class FileReaderThread extends Thread
{
    private $filePath;
    private $startOfFile;
    private $lenght;

    public function __constructor(string $filePath, int $start, int $end)
    {
        $this->setFilePath($filePath);
        $this->setStartAndEnd($start, $end);
    }

    private function setFilePath($filePath)
    {
        if (!is_file($filePath)) {
            echo "File Can Not Be Found!";
            exit(1);
        }
        $this->filePath = $filePath;
    }

    private function setStartAndEnd($s, $e)
    {
        if ($s < $e) {
            echo "start of file pointer should be greater than end of file pointer";
            exit(1);
        }

        if ($s < 0) {
            echo "start of file pointer should be greater than 0";
            exit(1);
        }

        $this->startOfFile = $s;
        $this->lenght = $e - $s;
    }

    public function run()
    {
        $string = file_get_contents($this->filePath, false, null, $this->startOfFile, $this->lenght);
        if ($string === false){
            echo "There is an Error reading from File specified";
            exit(1);
        }
    }
}