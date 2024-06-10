<?php

namespace Database\Seeders;

use App\Models\Employer;
use App\Models\User;
use App\Models\Work;
use App\Models\WorkApplication;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public function run(): void
    {

        User::factory()->create([
            "name"=> "Sohaib Khiaf",
            "email"=> "sohaibkhiaf@gmail.com",
        ]);

        User::factory(300)->create();

        $users = User::all()->shuffle();

        for($i=0; $i<20; $i++) {
            Employer::factory()->create([
                "user_id" => $users->pop()->id
            ]);
        }

        $employers = Employer::all();

        for($i=0; $i< 100; $i++){
            Work::factory()->create([
                "employer_id" => $employers->random()->id
            ]);
        }


        foreach ($users as $user){
            $works = Work::inRandomOrder()->take(rand(0, 4))->get();

            foreach($works as $work){
                WorkApplication::factory()->create([
                    "work_id"=> $work->id,
                    "user_id" => $user->id,
                ]);
            }
        }
    }
}
