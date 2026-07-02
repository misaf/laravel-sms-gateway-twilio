# Laravel SMS Gateway Twilio Driver

Twilio SMS gateway driver for [`misaf/laravel-sms-gateway`](https://github.com/misaf/laravel-sms-gateway).

## Installation

```bash
composer require misaf/laravel-sms-gateway-twilio
```

Laravel package discovery registers the driver service provider automatically.

## Configuration

```env
SMS_GATEWAY_DRIVER=twilio
SMS_GATEWAY_TWILIO_ACCOUNT_SID=your-account-sid
SMS_GATEWAY_TWILIO_AUTH_TOKEN=your-auth-token
```

```php
// config/services.php
'twilio' => [
    'account_sid' => env('SMS_GATEWAY_TWILIO_ACCOUNT_SID'),
    'auth_token'  => env('SMS_GATEWAY_TWILIO_AUTH_TOKEN'),
],
```

## Usage

```php
use Misaf\LaravelSmsGateway\Facade\SmsGateway;

$response = SmsGateway::driver('twilio')->send([
    'To'   => '+15551234567',
    'From' => '+15557654321',
    'Body' => 'Hello',
]);
```

The payload is passed directly to Twilio, so use the fields expected by the Twilio API.

Use `request()` when you need direct access to Laravel's HTTP client:

```php
$request = SmsGateway::driver('twilio')->request();
```

## Testing

```bash
composer test
composer analyse
```

## License

MIT
