<?php

use App\Models\User;
use Spatie\Permission\Models\Role;
use function Pest\Laravel\actingAs;

beforeEach(function () {
    Role::firstOrCreate(['name' => 'admin']);
    Role::firstOrCreate(['name' => 'client']);
});

it('allows admin to create a user with a role', function () {
    $admin = User::factory()->create()->assignRole('admin');

    actingAs($admin)->post(route('admin.users.store'), [
        'name' => 'Nuevo Usuario',
        'email' => 'user@test.com',
        'password' => 'password',
        'password_confirmation' => 'password',
        'role' => 'client',
    ])->assertRedirect(route('admin.users.index'));

    $user = User::where('email', 'user@test.com')->first();
    expect($user)->not->toBeNull();
    expect($user->hasRole('client'))->toBeTrue();
});

it('allows admin to update a user role', function () {
    $admin = User::factory()->create()->assignRole('admin');
    $user = User::factory()->create();
    $user->assignRole('client');

    actingAs($admin)->put(route('admin.users.update', $user), [
        'name' => 'Usuario Actualizado',
        'email' => $user->email,
        'password' => '12345678',
        'role' => 'admin',
    ])->assertRedirect(route('admin.users.index'));

    $user->refresh();
    expect($user->hasRole('admin'))->toBeTrue();
});
