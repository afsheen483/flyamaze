<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\User;
use DB;
class DropDownProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        view()->composer('*',function($view){
            $view->with('manager_array',User::role('Manager')->get());
            });
            view()->composer('*',function($view){
                $view->with('caller_array',User::role('caller')->get());
                });
                view()->composer('*',function($view){
                    $view->with('visa_array',DB::table('visa')->where('is_deleted','=',0)->get());
                    });
                    view()->composer('*',function($view){
                        $view->with('transport_array',DB::table('transports')->where('is_deleted','=',0)->get());
                        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
