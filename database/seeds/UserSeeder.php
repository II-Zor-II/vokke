<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Arr;
use App\Models\Kangaroo as KangarooModel;
use App\Models\User;
use App\Constants\Kangaroo;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sampleUser = factory(User::class)
            ->create([
                'email' => 'user@gmail.com',
                'password' =>  Hash::make('password')
            ])->each(function($user) {
                $faker = Faker\Factory::create();
                for($i = 0; $i < 10; $i ++) {
                    KangarooModel::create([
                        'user_id'   => $user->id,
                        'birth_date' => $faker->dateTimeBetween('1990-01-01', '2022-01-01'),
                        'name' => $faker->firstName,
                        'nickname' =>$faker->word,
                        'color' => $faker->hexColor,
                        'gender' => Arr::random(Kangaroo::GENDER),
                        'friendliness' => Arr::random(Kangaroo::FRIENDLINESS),
                        'weight' => $faker->numberBetween(35, 90), // kg
                        'height' => $faker->numberBetween(3, 8), // ft
                    ]);
                }
            });
        if(app()->environment('local')) {
            Log::info($sampleUser);
        }
    }
}
