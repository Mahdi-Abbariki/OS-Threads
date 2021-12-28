<?php

use JetBrains\PhpStorm\NoReturn;

class FileReaderThread extends Thread
{
    private string $filePath;
    private int $startOfFile;
    private int $length;

    public function __constructor(string $filePath, int $start, int $end)
    {
        $this->setFilePath($filePath);
        $this->setStartAndEnd($start, $end);
    }

    /**
     * @param $filePath
     * @return void
     */
    private function setFilePath($filePath)
    {
        if (!is_file($filePath))
            $this->errorOccurred("File Can Not Be Found!");
        $this->filePath = $filePath;
    }

    /**
     * @param $s //starter pointer of reading file
     * @param $e //end pointer of reading file
     * @return void
     */
    private function setStartAndEnd($s, $e)
    {
        if ($s < $e)
            $this->errorOccurred("start of file pointer should be greater than end of file pointer");

        if ($s < 0)
            $this->errorOccurred("start of file pointer should be greater than 0");

        $this->startOfFile = $s;
        $this->length = $e - $s;
    }

    public function run()
    {
        $string = file_get_contents($this->filePath, false, null, $this->startOfFile, $this->length);
        if ($string === false)
            $this->errorOccurred("There is an Error reading from File specified");

        echo $string;
    }

    /**
     * @param string $error
     * @return void
     */
    #[NoReturn] private function errorOccurred(string $error)
    {
        echo $error;
        exit(1);
    }
}