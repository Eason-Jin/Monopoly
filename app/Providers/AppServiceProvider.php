<?php

namespace App\Providers;

use App\Models\Player;
use Illuminate\Support\Facades\View;
use Illuminate\View\View as IlluminateView;
use A17\Twill\Facades\TwillNavigation;
use A17\Twill\Facades\TwillAppSettings;
use Illuminate\Support\ServiceProvider;
use A17\Twill\Services\Settings\SettingsGroup;
use A17\Twill\View\Components\Navigation\NavigationLink;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        TwillNavigation::addLink(
            NavigationLink::make()->forModule('pages')
        );

        TwillNavigation::addLink(
            NavigationLink::make()->forModule('properties')
        );

        TwillNavigation::addLink(
            NavigationLink::make()->forModule('specials')
        );

        TwillNavigation::addLink(
            NavigationLink::make()->forModule('players')
        );

        TwillAppSettings::registerSettingsGroup(
            SettingsGroup::make()->name('homepage')->label('Homepage')
        );

        View::composer(['components.twill.blocks.gameboard',], function (IlluminateView $view) {
            $players = Player::all();

            $view->with('players', $players ?? null);
        });

        View::composer(['components.twill.blocks.players',], function (IlluminateView $view) {
            $players = Player::all();

            $view->with('players', $players ?? null);
        });
    }
}
