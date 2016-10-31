<?php

namespace Katteba\UUID\UUIDShortener\Tests;

use Katteba\UUID\UUIDShortener;
use PHPUnit\Framework\TestCase;

class UUIDShortenerTest extends TestCase
{
    /**
     * @expectedException \InvalidArgumentException
     */
    public function testInvalidUUID()
    {
        UUIDShortener::encode('invalid-uuid');
    }

    /**
     * @dataProvider encodeProvider
     */
    public function testEncode($uuid, $expected)
    {
        $this->assertEquals($expected, UUIDShortener::encode($uuid));
    }

    /**
     * @dataProvider decodeProvider
     */
    public function testDecode($compressedUuid, $expected)
    {
        $this->assertEquals($expected, UUIDShortener::decode($compressedUuid));
    }

    public function encodeProvider()
    {
        return [
            [
                '40256F2F-3211-49CD-BC1F-DD5197D2F0F9',
                'IASW6LZSCFE43PA73VIZPUXQ7E',
            ],
        ];
    }

    public function decodeProvider()
    {
        return [
            [
                'iasw6lzscfe43pa73vizpuxq7e',
                '40256f2f-3211-49cd-bc1f-dd5197d2f0f9',
            ],
        ];
    }
}
