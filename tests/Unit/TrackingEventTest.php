<?php

use DominionSolutions\CustomerIO\Facades\CustomerIO;
use DominionSolutions\CustomerIO\TrackingEvent;

it('can create a tracking event', function() {
    mockCustomerIO();
    $trackingEvent = new TrackingEvent(userId: fake()->email(), tags: [
        fake()->word() => fake()->word(),
    ]);
    $response = CustomerIO::trackEvent($trackingEvent);
    expect($response->getStatusCode())->toBe(200);
});

it('can create an anonymous tracking event', function() {
    mockCustomerIO();
    $trackingEvent = new TrackingEvent(anonymousId: fake()->email(), tags: [
        fake()->word() => fake()->word(),
    ]);
    $response = CustomerIO::trackEvent($trackingEvent);
    expect($response->getStatusCode())->toBe(200);
});

it('can handle errors', function() {
    mockCustomerIO(trackSuccess:false);
    $trackingEvent = new TrackingEvent(userId: fake()->email(), tags: [
        fake()->word() => fake()->word(),
    ]);
    $response = CustomerIO::trackEvent($trackingEvent);
    expect($response->getStatusCode())->toBe(400);
});
