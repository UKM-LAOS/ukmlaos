<?php

namespace App\Providers;

use App\Contracts\PaymentInterface;
use App\Services\MidtransPaymentService;
use Carbon\CarbonImmutable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
        $this->app->bind(PaymentInterface::class, MidtransPaymentService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Model::unguard();
        Model::shouldBeStrict(!app()->isProduction());

        Date::use(CarbonImmutable::class);

        DB::prohibitDestructiveCommands(app()->isProduction());

        View::composer('components.course.front.navbar', function ($view) {
            $view->with('menus', config('course.front-menus'));
        });
        View::composer('components.course.front.footer', function ($view) {
            $view->with('menus', config('course.front-menus'));
        });
        View::composer('components.course.back.aside', function ($view) {
            $view->with('menus', config('course.back-menus'));
        });
        View::composer('components.cp.front.navbar', function ($view) {
            $view->with('menus', config('cp.front-menus'));
        });

        /* Course */
        // Back Component
        Blade::include('components.course.back.breadcrumbs', 'Breadcrumbs');
        Blade::include('components.course.back.my-courses-card', 'MyCoursesCard');

        // Front Component
        Blade::include('components.course.front.course-card', 'CourseCard');
        Blade::include('components.course.front.empty-state', 'EmptyState');
        Blade::include('components.course.front.init-state', 'InitState');
        Blade::include('components.course.front.video-modal', 'VideoModal');
        Blade::include('components.course.front.elements.TextInput', 'TextInput');
        Blade::include('components.course.front.elements.CheckboxInput', 'CheckboxInput');
        Blade::include('components.course.front.elements.Button', 'Button');
        Blade::include('components.course.front.elements.Toastr', 'Toastr');

        /* CP */
        // Front Component
        Blade::include('components.cp.front.navbar', 'NavbarCP');
        Blade::include('components.cp.front.footer', 'FooterCP');
        Blade::include('components.cp.front.empty-state', 'EmptyStateCP');
    }
}
