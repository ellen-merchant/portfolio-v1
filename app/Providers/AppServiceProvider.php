<?php

namespace App\Providers;

use Illuminate\Support\Collection;
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
        $this->createNavigation();
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    private function createNavigation()
    {
        $navigation = collect([
            'home' => 'About Me',
            'cv' => 'Curriculum Vitae',
            'blog' => 'Knowledge Base'
        ]);

        $this->composerNavigation($navigation);
        $this->composerActiveNavigation($navigation);
    }

    private function composerNavigation(Collection $navigation)
    {
        view()->composer('*', function ($view) use ($navigation) {
            $view->with('navigation', $navigation);
        });
    }

    private function composerActiveNavigation(Collection $navigation)
    {
        $navigation->each(function ($item, $key) {
            view()->composer($key, function ($view) use ($key) {
                $view->with('activeNav', $key);
            });
        });
    }
}
