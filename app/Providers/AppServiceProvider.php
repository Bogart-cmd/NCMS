<?php

namespace App\Providers;

use App\Models\Students;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Database\QueryException;

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
        $total_numbers = 0;
        // Avoid DB hits during console commands like migrate/cache clear
        if (app()->runningInConsole()) {
            View::share(["total_numbers" => $total_numbers]);
            return;
        }

        if (Schema::hasTable('students')) {
            try {
                $total_numbers = Students::where('status', 0)->count();
            } catch (QueryException $e) {
                $total_numbers = 0;
            }
        }
        View::share(["total_numbers" => $total_numbers]);
    }
}
