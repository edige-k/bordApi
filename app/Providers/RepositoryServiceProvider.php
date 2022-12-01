<?php

namespace App\Providers;

use App\Repositories\BaseRepository;
use App\Repositories\EloquentRepositoryInterface;
use App\Repositories\PartnerRepository;
use App\Repositories\PartnerRepositoryInterface;
use http\Env\Request;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public  $bindings=[
        EloquentRepositoryInterface::class => BaseRepository::class,

        PartnerRepositoryInterface::class =>PartnerRepository::class

        ];
    public function register()
    {
//        $this->app->bind(PartnerRepositoryInterface::class, PartnerRepository::class);

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
