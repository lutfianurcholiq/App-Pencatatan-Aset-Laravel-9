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
            'name' => 'Admin Test',
            'email' => 'test@gmail.com',
            'role' => 'admin',
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
