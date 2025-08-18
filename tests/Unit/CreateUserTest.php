<?php

use DominionSolutions\CustomerIO\Facades\CustomerIO;
use DominionSolutions\CustomerIO\User;

it('can create a known user by email only', function () {
    mockCustomerIO();
    $user = new User(traits: [
        'email' => fake()->email(),
    ]);
    $response = CustomerIO::upsertUser($user);
    expect($response->getStatusCode())->toBe(200);
});

it('can create an anonymous user', function () {
    mockCustomerIO();
    $user = new User(anonymousId: fake()->uuid());
    $response = CustomerIO::upsertUser($user);
    expect($response->getStatusCode())->toBe(200);
});

it('can create a known user', function () {
    mockCustomerIO();
    $user = new User(userId: fake()->email());
    $response = CustomerIO::upsertUser($user);
    expect($response->getStatusCode())->toBe(200);
});

it('can handle a failure', function () {
    mockCustomerIO(identifySuccess: false);
    $user = new User(anonymousId: fake()->uuid());
    $response = CustomerIO::upsertUser($user);
    expect($response->getStatusCode())->toBe(403);
});
