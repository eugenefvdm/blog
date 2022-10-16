## Blog

A simple blog platform based on Laravel and Filamentphp.

Demo:

https://blogdemo.fintechsystems.net

## Changelog

See CHANGELOG.md for recent chances.

## Using PayFast

Prerequitsies:

- Copy .env varaibles
- Valet must be secure

```
expose share --subdomain=payfast --server=eu-1 https://blog.test
```

In your layout file:

Stack:

@stack('payfast-event-listener')

```
 @if (config('payfast.testmode') == true)
    <!-- PayFast Test Mode -->
    <script src="https://sandbox.payfast.co.za/onsite/engine.js" defer></script>
    @else
    <script src="https://www.payfast.co.za/onsite/engine.js" defer></script>
    @endif
```

```
PAYFAST_MERCHANT_ID=10004002
PAYFAST_MERCHANT_KEY=q1cd2rdny4a53
PAYFAST_PASSPHRASE=payfast
PAYFAST_TESTMODE=true
PAYFAST_MERCHANT_ID_TEST=
PAYFAST_MERCHANT_KEY_TEST=
PAYFAST_PASSPHRASE_TEST=
PAYFAST_CALLBACK_URL_TEST=https://your-local-app.eu-1.sharedwithexpose.com
PAYFAST_DEBUG=true
PAYFAST_TRIAL_DAYS=30
```

use Billable; on User model

php artisan vendor:publish --provider="FintechSystems\PayFast\PayFastServiceProvider" --tag="config"

```
"repositories": [      
        {
            "type": "path",
            "url": "../payfast-onsite-subscriptions"
        }
    ],
```