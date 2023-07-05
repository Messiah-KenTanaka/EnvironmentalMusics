<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        /**
         * Paginate a standard Laravel Collection.
         *
         * @param int $perPage
         * @param int $total
         * @param int $page
         * @param string $pageName
         * @return array
         */

        if (config('app.env') === 'production') {
            \URL::forceScheme('https');
        }
        
        Collection::macro('paginate', function ($perPage, $total = null, $page = null, $pageName = 'page') {
            $page = $page ?: LengthAwarePaginator::resolveCurrentPage($pageName);
            $results = $this->forPage($page, $perPage)->values();
            $path = request()->url(); // Get the current URL without query string
        
            return new LengthAwarePaginator(
                $results,
                $total ?: $this->count(),
                $perPage,
                $page,
                [
                    'path' => url($path), // Use the Laravel url() helper to force https scheme if necessary
                    'pageName' => $pageName,
                ]
            );
        });        
    }
}
