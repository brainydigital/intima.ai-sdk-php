<?php

namespace Intimaai\API;


class APIRequestException extends \Exception
{
    public function toJson()
    {
        return [
            'code' => $this->code,
            'error' => json_decode($this->message, true)
        ];
    }
}