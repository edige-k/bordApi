<?php

namespace App\Providers;

use App\Services\Admin\Contracts\CreateOrganization;
use App\Services\Admin\PartnerService;
use Illuminate\Support\ServiceProvider;

class ActionServiceProvider extends ServiceProvider
{

    public array $singletons = [
        CreateOrganization::class => PartnerService::class,
    ];

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
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
