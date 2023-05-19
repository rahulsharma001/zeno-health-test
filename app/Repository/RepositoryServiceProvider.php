<?php

namespace App\Repository;

use App\Models\Drug;
use App\Repository\Drug\DrugInterface;
use App\Repository\Drug\DrugRepository;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider implements DeferrableProvider
{

    /**
     * Register all Repositories
     *
     * @return void
     */
    public function register(): void
    {
        $this->registerDrugRepository();
    }

    protected function registerDrugRepository(): void
    {
        $this->app->bind(DrugInterface::class, function ($app) {
            return new DrugRepository(new Drug());
        });
    }
}
