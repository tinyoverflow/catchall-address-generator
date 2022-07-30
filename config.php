<?php

return [
    'salt'   => getenv('HASH_SALT'),
    'domain' => getenv('MAIL_DOMAIN'),
    'length' => getenv('MAIL_LENGTH') ?? 16,
];