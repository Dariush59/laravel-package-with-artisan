<?php

namespace Phoenix\Expenses;

use Illuminate\Support\ServiceProvider;
use Phoenix\Expenses\Console\Commands\ExpenseDependencies;
use Phoenix\Expenses\Http\Middleware\Admin;
use Phoenix\Expenses\Models\ExpensePayOutType;

class ExpenseServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {

        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'phoenix');
         $this->loadViewsFrom(__DIR__.'/../resources/views', 'expense');

        $this->loadMigrationsFrom(database_path('migrations/expense'));
        $this->loadRoutesFrom( __DIR__ . '/../routes/web.php');
        $this->loadRoutesFrom( __DIR__ . '/../routes/web.php');

        $this->app['router']->middleware('admin', Admin::class);

        $this->publishes([
            __DIR__ . '/../database/migrations' => database_path('migrations'),
            __DIR__ . '/../database/json_files' => database_path('json_files')
        ], 'expense-database');



        // Publishing is only necessary when using the CLI.
        if ($this->app->runningInConsole()) {
            $this->bootForConsole();
        }
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/expense.php', 'expense');

        // Register the service the package provides.
        $this->app->singleton('expense', function ($app) {
            return new Expense;
        });

        $this->app->bind('payOutType', function (){
            return new ExpensePayOutType;
        });

    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['expense'];
    }

    /**
     * Console-specific booting.
     *
     * @return void
     */
    protected function bootForConsole()
    {
        $this->commands([
            ExpenseDependencies::class,
        ]);
        // Publishing the configuration file.
        /*$this->publishes([
            __DIR__.'/../config/expense.php' => config_path('expense.php'),
        ], 'expense.config');*/

        // Publishing the views.
        /*$this->publishes([
            __DIR__.'/../resources/views' => base_path('resources/views/vendor/phoenix'),
        ], 'expense.views');*/

        // Publishing assets.
        /*$this->publishes([
            __DIR__.'/../resources/assets' => public_path('vendor/phoenix'),
        ], 'expense.views');*/

        // Publishing the translation files.
        /*$this->publishes([
            __DIR__.'/../resources/lang' => resource_path('lang/vendor/phoenix'),
        ], 'expense.views');*/

        // Registering package commands.
        // $this->commands([]);
    }
}
