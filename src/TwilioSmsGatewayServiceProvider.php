<?php

declare(strict_types=1);

namespace Misaf\LaravelSmsGatewayTwilio;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\ServiceProvider;
use Misaf\LaravelSmsGateway\SmsGatewayManager;
use Misaf\LaravelSmsGatewayTwilio\Drivers\TwilioDriver;

final class TwilioSmsGatewayServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->callAfterResolving(SmsGatewayManager::class, function (SmsGatewayManager $manager): void {
            $manager->extend('twilio', fn(Application $app): TwilioDriver => $app->make(TwilioDriver::class));
        });
    }
}
