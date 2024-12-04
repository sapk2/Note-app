<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SharedSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('note_shareds')->insert([
            [
                'note_id' => 1, // Replace with an existing note ID
                'user_id' => 2, // Replace with an existing user ID
                'acess_type' => 'view',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'note_id' => 1, // Replace with another note ID
                'user_id' => 3, // Replace with another user ID
                'acess_type' => 'edit',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

