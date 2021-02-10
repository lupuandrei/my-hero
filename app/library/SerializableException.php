<?php

namespace App\Library;

use JsonSerializable;
use Exception;

class SerializableException extends Exception implements JsonSerializable
{

    public function jsonSerialize(): array
    {
        return [
            "code" => $this->code,
            "message" => $this->message
        ];
    }

    // - STATIC METHODS

    static public function notFound(): SerializableException
    {
        return new SerializableException("Not Found", 404);
    }

}