# PAMI

PAMI (PHP Asterisk Manager Interface) is an event-driven, object-oriented PHP
client for the [Asterisk Manager Interface (AMI)](https://docs.asterisk.org/Configuration/Interfaces/Asterisk-Manager-Interface-AMI/).
It can send AMI actions and consume AMI events, making it a useful foundation
for operator consoles, monitoring tools, and real-time telephony applications.

## About this continuation

This repository is a maintained, modernized continuation of the original
[PAMI project](https://marcelog.github.io/PAMI/) by Marcelo Gornstein. The
original project's authorship and Apache-2.0 license remain fully credited.
This version is maintained by
[Hamkaran Cloud Telephony](https://hamkaran.cloud).

The maintained source repository is
[github.com/amir200xven/PAMI](https://github.com/amir200xven/PAMI).

## What's new

- **CDR events:** PAMI can now represent Asterisk Call Detail Record events
  through `PAMI\Message\Event\CdrEvent`.
- **PHP 8.4+:** version 3 is designed for PHP 8.4 and newer releases; the
  library, dependencies, test suite, and development tooling have been
  modernized accordingly.
- **Modern PSR-3 support:** applications can use `psr/log` 1.x, 2.x, or 3.x.

## Requirements

- PHP 8.4 or later
- Composer
- Access to an Asterisk server with an enabled AMI account

## Installation

Install PAMI with Composer:

```bash
composer require hamkaran/pami:^3.0
```

## Quick start

```php
<?php

require __DIR__ . '/vendor/autoload.php';

use PAMI\Client\Impl\ClientImpl;
use PAMI\Message\Event\CdrEvent;

$client = new ClientImpl([
    'host' => '127.0.0.1',
    'scheme' => 'tcp://',
    'port' => 5038,
    'username' => 'ami-user',
    'secret' => 'ami-secret',
    'connect_timeout' => 10,
    'read_timeout' => 10,
]);

$client->registerEventListener(
    function (CdrEvent $event): void {
        printf(
            "Call %s: %s -> %s\n",
            $event->getUniqueID(),
            $event->getSource(),
            $event->getDestination()
        );
    },
    fn ($event): bool => $event instanceof CdrEvent
);

$client->open();

try {
    while (true) {
        $client->process();
    }
} finally {
    $client->close();
}
```

AMI must be configured to emit CDR events for the listener above to receive
them. Keep credentials outside source control and use the network security
controls appropriate for your deployment.

## Event listeners

Listeners may be closures, object-method callables, or implementations of
`PAMI\Listener\IEventListener`. An optional predicate lets an application
filter events before its listener is called:

```php
$listenerId = $client->registerEventListener(
    [$listener, 'handle'],
    fn ($event): bool => $event instanceof CdrEvent
);

// Remove the listener when it is no longer needed.
$client->unregisterEventListener($listenerId);
```

Events that do not yet have a dedicated implementation are exposed as
`UnknownEvent`, so applications can still observe them.

## Development

Install development dependencies and run the project checks:

```bash
composer install
composer test
composer syntax
composer lint
```

## Documentation and related projects

- [PAMI API documentation](https://pami.readthedocs.io/en/latest/ApiIndex/)
- [Original PAMI project](https://marcelog.github.io/PAMI/)
- [Nami, the Node.js port](https://github.com/marcelog/Nami)
- [Erlami, the Erlang port](https://github.com/marcelog/erlami)

## License

PAMI is released under the Apache License 2.0. See [LICENSE](LICENSE) for the
full license text.
