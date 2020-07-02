<?php

use Google_Service_CloudKMS as Kms;
use Google_Service_CloudKMS_DecryptRequest as DecryptRequest;
use Google_Service_CloudKMS_EncryptRequest as EncryptRequest;

$client = new Google_Client();
$client->setAuthConfig(getenv('GOOGLE_CREDENTIALS_FILE'));
$client->addScope('https://www.googleapis.com/auth/cloud-platform');

$keyManager = new KeyManager(
    new Kms($client),
    new EncryptRequest(),
    new DecryptRequest(),
    $projectId,
    $locationId,
    $keyRingId,
    $cryptoKeyId
);

$encrypted = $keyManager->encrypt('This is a secret!');
var_dump($encrypted);

// array (size=2)
//     'data' => string 'uKjmEU7e1JEU+2vL3hBK2wBk6afCSgb+Y4GQtu/mmLuffgHlnqxnqOMPOI6WGkM18vAGGvFVDTvd' (length=76)
//     'secret' => string 'CiQAdA0emUW2nhlU3RijX/5GnUsTnPPrQdLZNxdHWXWYugx49a4SSQBHyYr0T/PEbKwyFhIkaZl28oKkJRkXqNcqOL4Z+OTQFLpGvS6zCDt2mFn/nUQ/bi4znD4DORk9ZDTqiIBK3UNFUZcrXvoExds=' (length=152)

$decrypted = $keyManager->decrypt($encrypted['secret'], $encrypted['data']);
var_dump($decrypted);

// string 'This is a secret!' (length=17)
?>