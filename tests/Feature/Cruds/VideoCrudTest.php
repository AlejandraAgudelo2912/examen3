<?php

use App\Models\Course;
use App\Models\User;
use App\Models\Video;
use function Pest\Laravel\actingAs;

beforeEach(function () {
    \Spatie\Permission\Models\Role::firstOrCreate(['name' => 'admin']);
});

it('allows admin to create a video', function () {
    $admin = User::factory()->create()->assignRole('admin');
    $course = Course::factory()->create();

    actingAs($admin)->post(route('admin.videos.store'), [
        'course_id' => $course->id,
        'title' => 'Nuevo Video',
        'description' => 'Descripción del video',
        'duration_in_min' => 15,
        'vimeo_id' => '123456789',
    ])->assertRedirect(route('admin.videos.index'));

    expect(Video::where('title', 'Nuevo Video')->exists())->toBeTrue();
});
