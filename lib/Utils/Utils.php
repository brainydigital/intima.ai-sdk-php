<?php

namespace Intimaai\Utils;

use Exception;

class Utils
{
    public static function validateFile($filePath)
    {
        try {
            return fopen($filePath, 'r');
        } catch (Exception $exception) {
            throw new Exception('O caminho do arquivo informado é inválido!');
        }
    }
}