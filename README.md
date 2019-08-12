# Ripple Address Generator

Ripple Address Generator is a PHP library that derives Ripple addresses and account IDs from Ed25519 or Secp256k1 public keys.

## Installation

Use composer [pip](https://getcomposer.org/) to install PHP library.

```bash
composer require pandidan/ripple-address-generator
```

## Usage

```php
use Pandidan\Ripple;

$publicKey = 'ED76b77e7f30b9bfd8da1b54836d10bb7d95e671b821eb8b0d7413e42d48308082';
$rippleAddress = new Ripple\Address;

return rippleAddress->fromPublicKey($publicKey);

/* Returns:
Array
(
    [accountId] => 84916c1dcce801e623f0769bdde74b6f868cafe5
    [address] => rDnxQSed63QU5N473MYLvS6MRMfPDpYmun
)
*/

## Contributing
Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

Please make sure to update tests as appropriate.

## License
[MIT](https://choosealicense.com/licenses/mit/)