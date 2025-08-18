<?php

use Illuminate\Support\Facades\Http;
use DominionSolutions\CustomerIO\Tests\TestCase;

function mockCustomerIO(bool $trackSuccess = true, bool $identifySuccess = true)
{
    Http::fake([
        'https://cdp.customer.io/v1/track' => Http::response([
            'success' => $trackSuccess,
            'message' => $trackSuccess ? 'Tracked successfully' : 'Tracking failed'
        ], $trackSuccess ? 200 : 400),

        'https://cdp.customer.io/v1/identify' => Http::response([
            'success' => $identifySuccess,
            'message' => $identifySuccess ? 'Identified successfully' : 'Identification failed'
        ], $identifySuccess ? 200 : 403),
    ]);
}

uses(TestCase::class)->in(__DIR__);
