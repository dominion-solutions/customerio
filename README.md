A Laravel Integration Layer for CustomerIO
---

[![Latest Version on Packagist](https://img.shields.io/packagist/v/dominion-solutions/customerio.svg?style=flat-square)](https://packagist.org/packages/dominion-solutions/customerio)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/dominion-solutions/customerio/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/dominion-solutions/customerio/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/dominion-solutions/customerio/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/dominion-solutions/customerio/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/dominion-solutions/customerio.svg?style=flat-square)](https://packagist.org/packages/dominion-solutions/customerio)

This package provides an integration layer with CustomerIO.  You can track various events for both anonymous and identified visitors to your site via various means.

## Table of Contents
- [A Laravel Integration Layer for CustomerIO](#a-laravel-integration-layer-for-customerio)
- [Table of Contents](#table-of-contents)
- [Support us](#support-us)
- [Installation](#installation)
- [Usage](#usage)
  - [Identifying an Anonymous User](#identifying-an-anonymous-user)
  - [Identifying a Known User](#identifying-a-known-user)
  - [Tracking Events for an Unknown User](#tracking-events-for-an-unknown-user)
  - [Tracking Events for a Known User](#tracking-events-for-a-known-user)
  - [Merging Users](#merging-users)
- [Testing](#testing)
- [Changelog](#changelog)
- [Contributing](#contributing)
- [Security Vulnerabilities](#security-vulnerabilities)
- [Credits](#credits)
- [License](#license)


## Support us
<!-- [<img src="https://github-ads.s3.eu-central-1.amazonaws.com/customerio.jpg?t=1" width="419px" />](https://spatie.be/github-ad-click/customerio) -->

We invest a lot of resources into creating [best in class open source packages](https://dominion.solutions/open-source). You can support us by [buying one of our paid products](https://dominion.solutions/products).

<!-- We highly appreciate you sending us a postcard from your hometown, mentioning which of our package(s) you are using. You'll find our address on [our contact page](https://spatie.be/about-us). We publish all received postcards on [our virtual postcard wall](https://spatie.be/open-source/postcards). -->

## Installation

You can install the package via composer:

```bash
composer require dominion-solutions/customerio
```
You can publish the config file with:

```bash
php artisan vendor:publish --tag="customerio-config"
```

This is the contents of the published config file:

```php
return [
    'api-key' => env('CUSTOMER_IO_API_KEY', 'NOT_SET'),
    'region' => env('CUSTOMER_IO_REGION', 'US'),
    'version' => env('CUSTOMER_IO_VERSION', 'v1'),
];
```

## Usage
### Identifying an Anonymous User
```php
$anonymousUser = new CIOUser(
    anonymousId: $request->session()->getId(),
    additionalFields: [
        // Additional Fields
    ],
    traits: [
        // Traits here.
    ]
);
$result = DominionSolutions\CustomerIO\Facade\CustomerIO::upsertUser(
    $anonymousUser,
    // If you need to inject an API Key here
    apiKey: $apiKey
);
//Do something with your result.
```
### Identifying a Known User
```php
$identifyUser = new DominionSolutions\CustomerIO\User(
    userId: $request->$email,
    traits: [
        'email' => $request->email,
        //Add your traits here
    ]);
$result = DominionSolutions\CustomerIO\Facade\CustomerIO::upsertUser(
    $identifyUser,
    // If you need to inject an API Key here
    apiKey: $apiKey
);
//Do something with your result.
```
### Tracking Events for an Unknown User
```php
$trackingEvent = new TrackingEvent(
    $request->session()->getId(),
    event: 'your-event-name',
    properties: [
        // Your Event's Properties
    ],
    additionalFields: [
        // Additional Fields
    ],
    context: [
        'active' => true,
        // More Context Fields
    ]);

$result = DominionSolutions\CustomerIO\Facade\CustomerIO::CustomerIO::trackEvent(
    $trackingEvent,
    // If you need to inject an API Key here
    apiKey: $apiKey
);
//Do something with your result.
```

### Tracking Events for a Known User
```php
$trackingEvent = new TrackingEvent(
    $request->$email,
    event: 'your-event-name',
    properties: [
        // Your Event's Properties
    ],
    additionalFields: [
        // Additional Fields
    ],
    context: [
        'active' => true,
        // More Context Fields
    ]);

$result = DominionSolutions\CustomerIO\Facade\CustomerIO::CustomerIO::trackEvent(
    $trackingEvent,
    // If you need to inject an API Key here
    apiKey: $apiKey
);
//Do something with your result.
```

### Merging Users
```php
$response = CustomerIO::mergeUsers(
    $previousId,
    $userId,
    //If you need to inject an API Key here.
    apiKey: $apiKey
);
// Do something with your response.
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Mark J. Horninger](https://github.com/spam-n-eggs)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
