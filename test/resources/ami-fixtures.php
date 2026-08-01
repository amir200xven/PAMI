<?php

namespace PAMI\Client\Impl;

function standardAMIStart(): array
{
    return array(
        'Asterisk Call Manager/1.1',
        'Response: Success',
        'ActionID: 1432.123',
        'Message: Authentication accepted',
        '',
        'Response: Goodbye',
        'ActionID: 1432.123',
        'Message: Thanks for all the fish.',
        ''
    );
}

function standardAMIStartBadLogin(): array
{
    return array(
        'Asterisk Call Manager/1.1',
        'Response: Error',
        'Message: Authentication accepted',
        ''
    );
}
