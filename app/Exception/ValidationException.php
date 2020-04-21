<?php
namespace App\Exception;

use Exception;
use Throwable;

class ValidationException extends Exception
{

    private $path;
    private $errors;

    public function __construct(array $errors, $path)
    {
        $this->errors = $errors;
        $this->path = $path;
    }

    public function getErrors()
    {
        return $this->errors;
    }

    public function getPath()
    {
            return $this->path;
    }
}
