## Using PayFast

Here is an quick integration guide if you want to add PayFast subscription based billing to your blog.

Installation:

```bash
composer require fintechsystems/payfast-onsite-payments
```

Publish the configuration:

```
php artisan vendor:publish --provider="FintechSystems\PayFast\PayFastServiceProvider" --tag="config"
```

Copy the variables in .env.example to your project's .env file:
```
PAYFAST_MERCHANT_ID=
PAYFAST_MERCHANT_KEY=
PAYFAST_PASSPHRASE=
PAYFAST_TESTMODE=true
PAYFAST_MERCHANT_ID_TEST=
PAYFAST_MERCHANT_KEY_TEST=
PAYFAST_PASSPHRASE_TEST=
PAYFAST_CALLBACK_URL_TEST=https://your-local-app.eu-1.sharedwithexpose.com
PAYFAST_DEBUG=
PAYFAST_TRIAL_DAYS=30
```

Publish the views:

```
php artisan vendor:publish --provider="FintechSystems\PayFast\PayFastServiceProvider" --tag="config"
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

Add `use Billable;` to your `User` model

### Testing locally

Testing Prerequitsites:

- Valet must be secure

```
expose share --subdomain=payfast --server=eu-1 https://blog.test
```

### Local gateway development

```
"repositories": [      
        {
            "type": "path",
            "url": "../payfast-onsite-subscriptions"
        }
    ],
```