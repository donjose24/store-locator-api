<?php

use Illuminate\Database\Seeder;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name = "kriste";
        $user->email = 'admin@medisearch.com';
        $user->password = Hash::make('admin');
        $user->save();
    }
}
