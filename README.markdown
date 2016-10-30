UUID Shortener
==============

[![Latest Stable Version](https://poser.pugx.org/katteba/uuidshortener/v/stable)](https://packagist.org/packages/katteba/uuidshortener) [![License](https://poser.pugx.org/katteba/uuidshortener/license)](https://packagist.org/packages/katteba/uuidshortener)

[Original by Obj-C](https://github.com/kishikawakatsumi/UUIDShortener)

Convert UUID 32-character hex string into a Base32 short string and back.


Installation
------------

```
composer require katteba/uuidshortener
```


Usage
-----

### Compressing UUID

```php
<?php

use Katteba\UUID\UUIDShortener;

$uuid = '...';
$compressedUuid = UUIDShortener::encode($uuid);
```


### Restore original UUID from compact representaion

```php
<?php

use Katteba\UUID\UUIDShortener;

$compressedUuid = '...';
$uuid = UUIDShortener::decode($compressedUuid);
```
