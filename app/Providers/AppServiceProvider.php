<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        /*
         *  $allCity = [
            1=>"Sydney",
            2=>"Adelaide",
            3=>"Brisbane",
            4=>"Melbourne",
            5=>"Sunshine Coast",
            6=>"Gold Coast",
            7=>"Cairns",
            8=>"Alice Springs",
            9=>"Canberra",
            10=>"Hobart",
            11=>"Perth",
            12=>"Auckland",
            13=>"Wellington",
            14=>"Rotorua",
            15=>"Christchurch",
            16=>"Queenstown",
            17=>"Dunedin",
            18=>"Darwin"
            ];
         */

        view()->composer('*', function ($view) {
            $allSuppliers = \App\Supplier::all();

            $allCity = \Cache::remember('allCity', 120, function() {
                return \App\City::all();
            });

            $allPickup = [1=>"Arrival", 2=>"Departure", 3=>"Other"];
            $allStatus = [1=>"Normal", 2=>"Cancelled"];
            $allVehicle = [1=>"Standard Sedan", 2=>"Standard Minivan", 3=>"Standard Van", 4=>"Other"];
            $cur_array = [1=>"AUD", 2=>"NZD"];
            $paid_to_supplier_array = [0=>"NO", 1=>"YES", 2=>"CHECK REQUIRED"];
            $hotelbeds_paid_array = [0=>"NO", 1=>"YES", 2=>"PAID LESS"];
            $hotelbeds_invoice_array = [0=>"NO", 1=>"YES-MAHA", 2=>"YES-SAMAH"];

            $currentUser = auth()->user();
            $currentRouteName = \Route::currentRouteName();
            $currentLocale = app()->getLocale();
            $currentUrl = current_url();

            $view->with(compact('allTags',
                                'allStatus',
                                'allCity',
                                'allPickup',
                                'allVehicle',
                                'allSuppliers',
                                'cur_array',
                                'paid_to_supplier_array',
                                'hotelbeds_paid_array',
                                'hotelbeds_invoice_array',
                                'currentUser',
                                'currentRouteName',
                                'currentLocale',
                                'currentUrl'));
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

    }
}
