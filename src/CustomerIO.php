<?php

namespace DominionSolutions\CustomerIO;

use Illuminate\Support\Facades\Http;

class CustomerIO
{
    private const string USER_ENDPOINT = 'identify';

    private const string TRACKING_ENDPOINT = 'track';

    private string $region;

    private string $apiKey;

    private string $baseUrl;

    private string $version;

    public function __construct(?string $region = null, ?string $apiKey = null, ?string $version = null)
    {
        $this->region = $region ?? config('customerio.region');
        $this->apiKey = $apiKey ?? config('customerio.api-key', 'NOT_SET');
        $this->version = $version ?? config('customerio.version');
        $subdomain = strtolower($this->region) == 'eu' ? 'cdp-eu' : 'cdp';
        $this->baseUrl = sprintf('https://%s.customer.io/%s/', $subdomain, $this->version);
    }

    public function upsertUser(User $user, ?string $apiKey = null)
    {
        $overrideApiKey = $apiKey ?? $this->apiKey;

        return Http::withBasicAuth($overrideApiKey, '')
            ->acceptJson()
            ->post(
                sprintf('%s%s', $this->baseUrl, self::USER_ENDPOINT),
                $user->toArray()
            );
    }

    public function trackEvent(TrackingEvent $trackingEvent, ?string $apiKey = null)
    {
        $overrideApiKey = $apiKey ?? $this->apiKey;

        return Http::withBasicAuth($overrideApiKey, '')
            ->acceptJson()
            ->post(
                sprintf('%s%s', $this->baseUrl, self::TRACKING_ENDPOINT),
                $trackingEvent->toArray()
            );
    }
}
