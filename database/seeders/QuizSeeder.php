<?php

namespace Database\Seeders;

use App\Models\Quiz;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class QuizSeeder extends Seeder
{
    protected $model = Quiz::class;
    /**
     * Run the database seeds.
     *
     * 
     * @return void
     */
    public function run()
    {
        \App\Models\Quiz::factory(5)->create();
    }
}
