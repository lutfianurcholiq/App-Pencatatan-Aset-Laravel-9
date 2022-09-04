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
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create([
            'name' => 'Fitriani Adela',
            'email' => 'fitri@gmail.com',
            'role' => 'admin',
            'is_active' => "aktif",
            'password' => bcrypt(123456)
        ]);
        User::create([
            'name' => 'Lutfian',
            'email' => 'upil@gmail.com',
            'role' => 'staff',
            'is_active' => "nonaktif",
            'password' => bcrypt(123456)
        ]);
        User::create([
            'name' => 'udilan',
            'email' => 'udilan@gmail.com',
            'role' => 'manager',
            'is_active' => "aktif",
            'password' => bcrypt(123456)
        ]);

        $this->call([
            // AsetSeeder::class,
            KecamatanSeeder::class,
            KotaSeeder::class,
            SekolahSeeder::class,
            AsetSeeder::class,
            CoaSeeder::class

        ]);
    }
}
