<?php

use App\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //$this->call(UsersTableDataSeeder::class);
        User::create([
            'first_name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => \Hash::make('123456'),
            'role_id' => 1,
        ]);

    }
}
