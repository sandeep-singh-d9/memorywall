<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'first_name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => '123456',
            'role_id' => 1,
        ]);

    }
}
