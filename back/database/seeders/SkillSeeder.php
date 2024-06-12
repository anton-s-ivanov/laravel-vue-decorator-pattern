<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = now();

        $skills = [
            ['name' => 'php', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'js', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'golang', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'java', 'created_at' => $now, 'updated_at' => $now],
        ];

        DB::table('skills')->insert($skills);
    }
}
