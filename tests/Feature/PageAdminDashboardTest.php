<?php

use App\Models\Course;
use App\Models\User;
use App\Models\Video;
use Spatie\Permission\Models\Role;
use function Pest\Laravel\actingAs;

beforeEach(function () {
    Role::firstOrCreate(['name' => 'admin']);
    Role::firstOrCreate(['name' => 'client']);
});

it('allows only admins to access dashboard', function () {
    $admin = loginAsUser();
    $admin->assignRole('admin');

    $client = loginAsUser();
    $client->assignRole('client');

    actingAs($admin)->get(route('admin.dashboard'))->assertOk();
    actingAs($client)->get(route('admin.dashboard'))->assertForbidden();
});

it('shows correct counts of courses, videos, and users', function () {
    $admin = loginAsUser();
    $admin->assignRole('admin');

    Course::factory()->count(5)->create();
    Video::factory()->count(10)->create();
    User::factory()->count(7)->create()->each->assignRole('client');

    actingAs($admin)->get(route('admin.dashboard'))
        ->assertSeeText('Total de Cursos')
        ->assertSeeText(5)
        ->assertSeeText('Total de Videos')
        ->assertSeeText(10)
        ->assertSeeText('Usuarios Registrados')
        ->assertSeeText(7);
});
