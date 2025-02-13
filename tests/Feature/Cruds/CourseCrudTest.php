<?php

use App\Models\Course;
use App\Models\User;
use function Pest\Laravel\actingAs;

beforeEach(function () {
    \Spatie\Permission\Models\Role::firstOrCreate(['name' => 'admin']);
});

it('allows admin to create a course', function () {
    $admin = User::factory()->create()->assignRole('admin');

    actingAs($admin)->post(route('admin.courses.store'), [
        'paddle_product_id' => 'test_product',
        'title' => 'Nuevo Curso',
        'tagline' => 'Aprende Laravel',
        'description' => 'Curso completo de Laravel',
        'image_name' => 'laravel.png',
        'learnings' => ['Eloquent', 'Blade', 'Livewire']
    ])->assertRedirect(route('admin.courses.index'));

    expect(Course::where('title', 'Nuevo Curso')->exists())->toBeTrue();
});
