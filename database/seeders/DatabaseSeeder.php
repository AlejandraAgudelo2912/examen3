<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            AddGivenCoursesSeeder::class,
            AddGivenVideosSeeder::class,
            AddLocalTestUserSeeder::class,
            RolesAndPermissionsSeeder::class
        ]);

        $admin = User::firstOrCreate(['email' => 'admin@gmail.com'], [
            'name' => 'Admin',
            'password' => bcrypt('12345678'),
        ]);
        $admin->assignRole('admin');
    }
}
