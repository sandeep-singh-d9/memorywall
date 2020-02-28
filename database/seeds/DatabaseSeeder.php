<?php

use App\Model\Menu;
use App\Model\Role;
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
        $data = [
            ['menu' => 'Home', 'routes' => 'home', 'icon' => 'home'],
            ['menu' => 'User', 'routes' => 'users', 'icon' => 'perm_identity'],
            ['menu' => 'User role', 'routes' => 'roles', 'icon' => 'supervisor_account'],
            ['menu' => 'Orders', 'routes' => 'orders', 'icon' => 'ballot'],
            ['menu' => 'Promocode', 'routes' => 'promocodes', 'icon' => 'ballot'],
            ['menu' => 'Subscribers', 'routes' => 'subscribers', 'icon' => 'ballot'],
            ['menu' => 'Issues', 'routes' => 'issues', 'icon' => 'ballot'],
            ['menu' => 'Logout', 'routes' => 'logout', 'icon' => 'lock'],
        ];
        foreach ($data as $key => $value) {
            Menu::create([
                'menu' => $value['menu'],
                'routes' => $value['routes'],
                'icon' => $value['icon'],
            ]);
        }
        $role = [
            ['role_name' => 'Admin', 'permissions' => '1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17'],
            ['role_name' => 'Seller', 'permissions' => '1,2,3,4,5,6,7,8,9,10'],
            ['role_name' => 'Customer', 'permissions' => ''],
        ];
        foreach ($role as $key => $value) {
            Role::create([
                'role_name' => $value['role_name'],
                'permissions' => $value['permissions'],
            ]);
        }

    }
}
