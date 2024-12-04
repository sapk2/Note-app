<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DummyDataSeeder extends Seeder
{
    public function run()
    {
        // Insert dummy user
        $userId = DB::table('users')->insertGetId([
            'name' => 'Test User',
            'email' => 'testuser@example.com',
            'password' => bcrypt('password'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Insert dummy notes for the user
        DB::table('notes')->insert([
            [
                'user_id' => $userId,
                'text' => 'This is a test note',
                'is_shared' => false,
                'is_archived' => false,
                'is_pinned' => true,
                'is_viewed' => false, // Added is_viewed field
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => $userId,
                'text' => 'Another test note',
                'is_shared' => true,
                'is_archived' => false,
                'is_pinned' => false,
                'is_viewed' => true, // Added is_viewed field
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

