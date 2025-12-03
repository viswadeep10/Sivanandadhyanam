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
        $categories = Category::where('status',1)->select('id','name')->get();
        $programes = Program::where('status',1)->select('id','name','image','slug')->orderBy('order_no','ASC')->get();
        $services = Service::where('status',1)->select('id','name')->orderBy('order_no','ASC')->get();
                $setting = DB::table('settings')->where('id',1)->first();

         View::share(['categories'=>$categories,'programes'=>$programes,'services'=>$services,'setting'=>$setting]);
    }
}
