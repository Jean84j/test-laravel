<?php

namespace App\Providers;

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
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('contact.contact', function ($view) {

            $contact = [
                'phone' => [
                    '+38(050)123-45-56',
                    '+38(080)123-45-56',
                    '+38(090)123-45-56',
                ],
                'mail' => 'admin@mail.com',
            ];

            $view->with(['contact' => $contact]);
        });
    }
}
