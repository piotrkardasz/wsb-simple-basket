<?php


namespace App\Helper;


class HashGenerator
{
    public const NUMERIC = 1;
    public const NO_NUMERIC = 2;
    public const RANDOM = 3;
    public const ALPHANUMERIC = 4;

    public static function generateHash(int $length = 40, int $type = self::ALPHANUMERIC): ?string
    {
        if ($length <= 0)
            return null;
        $bytes = random_bytes($length);
        switch ($type) {
            case self::NUMERIC:
                $data = '0123456789';
                break;
            case self::NO_NUMERIC:
                $data = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
                break;
            case self::RANDOM:
                return substr(rtrim(base64_encode($bytes), '='), 0, $length);
                break;
            case self::ALPHANUMERIC:
            default:
                $data = 'abcdefghijkmnopqrstuvwxyz0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        }
        $position = 0;
        $result = '';
        for ($i = 0; $i < $length; $i++) {
            $position = ($position + ord($bytes[$i])) % strlen($data);
            $result .= $data[$position];
        }
        return $result;
    }
}