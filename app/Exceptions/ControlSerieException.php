<?php

namespace App\Exceptions;


use Throwable;

class ControlSerieException extends \Exception
{

    public function __construct($message = "", $code = 0, Throwable $previous = null)
    {
        parent::__construct(MessageException::get($message), $code, $previous);
    }
}