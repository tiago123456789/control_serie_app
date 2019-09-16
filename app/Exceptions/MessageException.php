<?php
namespace App\Exceptions;


class MessageException
{

    const NOT_FOUND = "NOT_FOUND";
    const SERIE_HAS_SEASON = "SERIE_HAS_SEASON";

    private static $message = [
        MessageException::NOT_FOUND => "Not found register.",
        MessageException::SERIE_HAS_SEASON => "Serie have seasons registers and can't delete."
    ];

    public static function get(String $codeOrMessage)
    {
        return self::$message[$codeOrMessage] ?? $codeOrMessage;
    }
}