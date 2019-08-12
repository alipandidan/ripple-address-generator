<?php 

namespace Pandidan\Ripple;

use Tuupola\Base58;
use BitWasp\Buffertools\Buffer;
use BitWasp\Buffertools\Buffertools;

Class Address {
    public static function fromPublicKey($publicKey) {

        $publicKeyBuffer = Buffer::hex($publicKey);

        $accountId = hash('ripemd160', Buffer::hex(hash('sha256', $publicKeyBuffer->getBinary()))->getBinary());

        $addressTypePrefix = Buffer::hex("00");
        $accountIdBuf = Buffer::hex($accountId);
        $payload = Buffertools::concat($addressTypePrefix, $accountIdBuf);
        $checksum = Buffer::hex( hash('sha256', Buffer::hex( hash('sha256', $payload->getBinary()) )->getBinary()) )->slice(0, 4);

        $base58 = new Base58(["characters" => Base58::RIPPLE]);
        $address = $base58->encode(Buffertools::concat($payload, $checksum)->getBinary());

        return [
            'accountId' => $accountId,
            'address'=> $address
        ];
    }
}