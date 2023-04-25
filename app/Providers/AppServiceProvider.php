<?php

namespace App\Providers;

use App\Console\Commands\GetUsersCommand;
use App\Contracts\CustomerInterface;
use App\Contracts\ExternalApiInterface;
use App\Http\Controllers\MicrosoftApiController;
use App\Models\Client;
use App\Services\CustomerService;
use App\Services\MicrosoftApiService;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Carbon;
use Illuminate\Support\ServiceProvider;
use Laravel\Passport\Passport;

class AppServiceProvider extends ServiceProvider
{
    /**
     * All the container bindings that should be registered.
     *
     * @var array
     */
    public array $bindings = [
        CustomerInterface::class => CustomerService::class,
    ];

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
        Paginator::useBootstrap();
        Passport::useClientModel(Client::class);
        Passport::tokensExpireIn(Carbon::now()->addDays(1));
//        Passport::refreshTokensExpireIn(Carbon::now()->addMinutes(4));

        $this->app->when(MicrosoftApiController::class)
            ->needs(ExternalApiInterface::class)
            ->give(function () {
                return new MicrosoftApiService($this->app->get(CustomerInterface::class));
            });

        $this->app->when(GetUsersCommand::class)
            ->needs(ExternalApiInterface::class)
            ->give(function () {
                return new MicrosoftApiService($this->app->get(CustomerInterface::class));
            });
    }
}
