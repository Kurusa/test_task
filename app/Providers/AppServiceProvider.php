<?php

namespace App\Providers;

use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;

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
        Validator::extend('date_difference', function ($attribute, $value, $parameters, $validator) {
            $parameters = $validator->getData();
            $startDate = Carbon::parse($parameters['start_date']);
            $endDate = Carbon::parse($parameters['end_date']);

            return $startDate->diffInDays($endDate) < config('stats.max_date_range');
        });
    }
}
