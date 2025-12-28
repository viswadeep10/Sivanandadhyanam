<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Pagination\Paginator;
use App\Models\Category;
use App\Models\Program;
use App\Models\Service;
use Illuminate\Support\Facades\View;
use DB;
use Illuminate\Support\Facades\Broadcast;


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
        //
        Paginator::useBootstrap();
        Schema::defaultStringLength(191);
        Broadcast::routes(['middleware' => ['web', 'auth']]);
        require base_path('routes/channels.php');
    }
}
