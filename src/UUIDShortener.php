<?php

namespace Katteba\UUID;

use Base32\Base32;

class UUIDShortener
{
    const UUID_PATTERN = '/\A[0-9A-Fa-f]{8}-[0-9A-Fa-f]{4}-[0-9A-Fa-f]{4}-[0-9A-Fa-f]{4}-[0-9A-Fa-f]{12}\z/';

    /**
     * Compressing UUID
     *
     * @param string $uuid
     * @return string
     */
    public static function encode($uuid)
    {
        if (!preg_match(self::UUID_PATTERN, $uuid)) {
            throw new \InvalidArgumentException(sprintf('`%s` is not UUID string.'));
        }

        $data = pack("H*", str_replace('-', '', $uuid));

        return rtrim(Base32::encode($data), '=');
    }

    /**
     * Restore original UUID from compact representaion
     *
     * @param string $compressedUuid
     * @return string
     */
    public static function decode($compressedUuid)
    {
        $data = Base32::decode($compressedUuid);
        $unpackedData = unpack('H*', $data);
        $dataString = array_shift($unpackedData);

        $components = [
            substr($dataString, 0, 8),
            substr($dataString, 8, 4),
            substr($dataString, 12, 4),
            substr($dataString, 16, 4),
            substr($dataString, 20)
        ];

        return implode('-', $components);
    }
}
