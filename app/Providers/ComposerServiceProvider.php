<?php

namespace App\Providers;

use App\Model\Menu;
use App\Model\Roles;
use App\User;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('includes.sidebar', function ($view) {
            $menu = Menu::get();
            $user = User::whereId(\Auth::id())->first();
            $roles = Roles::whereId($user->role_id)->first();

            if (\Auth::user()->role_id == 1) {
                $menu = Menu::get();
            } else {
                if ($roles) {
                    $permissions = explode(',', $roles->permissions);
                    $menu = Menu::whereIn('id', $permissions)->whereNull('parent_id')->get();
                }
            }
            $view->with('menu', $menu);
        });
        // View::composer('includes.sidebar', function ($view) {
        //     $user = User::whereId(\Auth::id())->first();
        //     $user = explode(',',$user->permissions);
        //     $view->with('user',$user);
        // });
    }
}
