<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $sampleUser = factory(User::class)
            ->create([
               'email' => 'user@gmail.com',
               'password' =>  Hash::make('password')
            ]);
        if(app()->environment('local')) {
            Log::info($sampleUser);
        }

    }
}
