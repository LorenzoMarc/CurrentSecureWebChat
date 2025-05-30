<?php

use Google_Service_CloudKMS as Kms;
use Google_Service_CloudKMS_DecryptRequest as DecryptRequest;
use Google_Service_CloudKMS_EncryptRequest as EncryptRequest;

class KeyManager
{
    private $kms;
    private $encryptRequest;
    private $decryptRequest;
    private $projectId;
    private $locationId;
    private $keyRingId;
    private $cryptoKeyId;

    public function __construct(Kms $kms, EncryptRequest $encryptRequest, DecryptRequest $decryptRequest, $projectId, $locationId, $keyRingId, $cryptoKeyId)
    {
        $this->kms            = $kms;
        $this->encryptRequest = $encryptRequest;
        $this->decryptRequest = $decryptRequest;
        $this->projectId      = $projectId;
        $this->locationId     = $locationId;
        $this->keyRingId      = $keyRingId;
        $this->cryptoKeyId    = $cryptoKeyId;
    }

    public function encrypt($data)
    {
        $key        = random_bytes(SODIUM_CRYPTO_SECRETBOX_KEYBYTES);
        $nonce      = random_bytes(SODIUM_CRYPTO_SECRETBOX_NONCEBYTES);
        $ciphertext = sodium_crypto_secretbox($data, $nonce, $key);

        return [
            'data'   => base64_encode($nonce . $ciphertext),
            'secret' => $this->encryptKey($key),
        ];
    }

    public function decrypt($secret, $data)
    {
        $decoded    = base64_decode($data);
        $key        = $this->decryptSecret($secret);
        $nonce      = mb_substr($decoded, 0, SODIUM_CRYPTO_SECRETBOX_NONCEBYTES, '8bit');
        $ciphertext = mb_substr($decoded, SODIUM_CRYPTO_SECRETBOX_NONCEBYTES, null, '8bit');

        return sodium_crypto_secretbox_open($ciphertext, $nonce, $key);
    }

    private function encryptKey($key)
    {
        $this->encryptRequest->setPlaintext(base64_encode($key));

        $response = $this->kms->projects_locations_keyRings_cryptoKeys->encrypt(
            $this->getResourceName(),
            $this->encryptRequest
        );

        return $response['ciphertext'];
    }

    private function decryptSecret($secret)
    {
        $this->decryptRequest->setCiphertext($secret);

        $response = $this->kms->projects_locations_keyRings_cryptoKeys->decrypt(
            $this->getResourceName(),
            $this->decryptRequest
        );

        return base64_decode($response['plaintext']);
    }

    private function getResourceName()
    {
        return sprintf(
            'projects/%s/locations/%s/keyRings/%s/cryptoKeys/%s',
            $this->projectId,
            $this->locationId,
            $this->keyRingId,
            $this->cryptoKeyId
        );
    }
}

?>