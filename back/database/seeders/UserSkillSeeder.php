<?php

namespace Database\Seeders;

use App\Models\Skill;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->count(10)->create()->each(function($user) {
            $skills = Skill::all();
            $randomSkills = $skills->random(rand(1, 4));
            $user->skills()->attach($randomSkills);
        });
    }
}
