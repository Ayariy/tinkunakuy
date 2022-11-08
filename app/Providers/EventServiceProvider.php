<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;
use JeroenNoten\LaravelAdminLte\Events\BuildingMenu;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        Event::listen(BuildingMenu::class, function (BuildingMenu $event) {
            // Add some items to the menu...
            $kichwa = str_replace(parse_url(url()->current(), PHP_URL_HOST), "ki." . explode(".", parse_url(url()->current(), PHP_URL_HOST))[1], url()->current());
            $spanish =   str_replace(parse_url(url()->current(), PHP_URL_HOST), "es." . explode(".", parse_url(url()->current(), PHP_URL_HOST))[1], url()->current());
            $english = str_replace(parse_url(url()->current(), PHP_URL_HOST), "en." . explode(".", parse_url(url()->current(), PHP_URL_HOST))[1], url()->current());
            $event->menu->add(
                ['header' => "idioma"]
            );
            $event->menu->add([
                'text' => "kichwa",
                'url' => $kichwa,
                'icon' => 'fas fa-language'
            ]);
            $event->menu->add([
                'text' => "english",
                'url' => $english,
                'icon' => 'fas fa-language'
            ]);
            $event->menu->add([
                'text' => "spanish",
                'url' => $spanish,
                'icon' => 'fas fa-language'
            ]);
        });
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     *
     * @return bool
     */
    public function shouldDiscoverEvents()
    {
        return false;
    }
}