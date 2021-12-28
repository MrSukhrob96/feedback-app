<?php

namespace App\Providers;

use App\Feedback\Managers\FeedbackFactory;
use App\Feedback\Managers\Interfaces\FeedbackFactoryInterface;
use App\Feedback\Repositories\DbRepository;
use App\Feedback\Repositories\TxtRepository;
use Illuminate\Support\ServiceProvider;

class FeedbackProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(FeedbackFactryInterface::class, FeedbackFactory::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        
    }
}