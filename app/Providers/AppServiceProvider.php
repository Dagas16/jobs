<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Blade::if('isrecruiter', function () {
            $id = Auth::id();
            //sjekker om bruker er logget inn og hører til en bedrift
            if ($id == null || !User::find($id)->isRecruiter()) {
                return false;
            };
            return true;
        });

        Blade::if('issearcher', function () {
            $id = Auth::id();
            //sjekker om bruker er logget inn og hører til en bedrift
            if ($id == null || User::find($id)->isRecruiter()) {
                return false;
            };
            return true;
        });
    }
}
