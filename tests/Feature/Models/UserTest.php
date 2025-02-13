<?php

use App\Models\Course;
use App\Models\User;
use App\Models\Video;
use Spatie\Permission\Models\Role;

beforeEach(function () {
    Role::firstOrCreate(['name' => 'admin']);
    Role::firstOrCreate(['name' => 'client']);
});

it('has courses', function () {
    // Arrange
    $user = User::factory()
        ->has(Course::factory()->count(2), 'purchasedCourses')
        ->create();

    // Act & Assert
    expect($user->purchasedCourses)
        ->toHaveCount(2)
        ->each->toBeInstanceOf(Course::class);
});

it('has videos', function () {
    // Arrange
    $user = User::factory()
        ->has(Video::factory()->count(2), 'watchedVideos')
        ->create();

    // Act & Assert
    expect($user->watchedVideos)
        ->toHaveCount(2)
        ->each->toBeInstanceOf(Video::class);
});

it('identifies an admin user', function () {
    // Arrange
    $admin = User::factory()->asAdmin()->create();

    $admin->refresh();
    // Act & Assert
    expect($admin->isAdmin())->toBeTrue();
    expect($admin->isClient())->toBeFalse();
});

it('identifies a client user', function () {
    // Arrange
    $client = User::factory()->create();
    $client->assignRole('client');

    // Act & Assert
    expect($client->isClient())->toBeTrue();
    expect($client->isAdmin())->toBeFalse();
});
