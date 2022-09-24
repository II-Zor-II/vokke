<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Kangaroo as KangarooModel;
use App\Models\User;

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
                $user->kangaroos()->createMany(
                    factory(KangarooModel::class, 10)
                        ->make()
                        ->toArray()
                );
            });
        if(app()->environment('local')) {
            Log::info($sampleUser);
        }
    }
}
