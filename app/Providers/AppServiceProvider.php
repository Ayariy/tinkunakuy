<?php

namespace App\Providers;

use Carbon\CarbonInterface;
use Illuminate\Filesystem\FilesystemAdapter;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\ServiceProvider;



class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->isLocal()) {
            $this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
        }
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $boringLanguage = 'ki';
        $translator = \Carbon\Translator::get($boringLanguage);
        $translator->setTranslations([
            // 'day' => ':count boring day|:count boring days',

            'year' => ':count watapi|:count watakunapi',
            'a_year' => 'Shuk watapi|:count watakunapi',
            'y' => ':count watapi|:count watakunapi',
            'month' => ':count killapi|:count killakunapi',
            'a_month' => 'Shuk killapi|:count killakunapi',
            'm' => ':count killapi|:count killakunapi',
            'week' => ':count hunkaypi|:count hunkaykunapi',
            'a_week' => 'Shuk hunkaypi|:count hunkaykunapi',
            'w' => 'countsem',
            'day' => ':count punchapi|:count punchakunapi',
            'a_day' => 'Shuk punchapi|:count punchakunapi',
            'd' => ':countd',
            'hour' => ':count pachapi|:count pachakunapi',
            'a_hour' => 'Shuk pachapi|:count pachakunapi',
            'h' => ':counth',
            'minute' => ':count chinikupi|:count chinikukunapi',
            'a_minute' => 'Shuk chinikupi|:count chinikukunapi',
            'min' => ':countm',
            'second' => ':count chinillapi|:count chinillakunapi',
            'a_second' => 'Shuk chinillakunapi|:count chinillakunapi',
            's' => ':counts',
            'millisecond' => ':count milisegundo|:count milisegundos',
            'a_millisecond' => 'un milisegundo|:count milisegundos',
            'ms' => ':countms',
            'microsecond' => ':count microsegundo|:count microsegundos',
            'a_microsecond' => 'un microsegundo|:count microsegundos',
            'µs' => ':countµs',
            'ago' => 'sarun :time',
            'from_now' => 'shamuk :time',
            'after' => ':time kipa',
            'before' => ':time ñawpa',
            'diff_now' => 'Chayrallaku',
            'diff_today' => 'kunan',
            'diff_today_regexp' => 'kunan(?:\\s+a)?(?:\\s+las)?',
            'diff_yesterday' => 'kayna',
            'diff_yesterday_regexp' => 'kayna(?:\\s+a)?(?:\\s+las)?',
            'diff_tomorrow' => 'kaya',
            'diff_tomorrow_regexp' => 'kaya(?:\\s+a)?(?:\\s+las)?',
            'diff_before_yesterday' => 'Kaynani',
            'diff_after_tomorrow' => 'Kayapak kaya',
            'formats' => [
                'LT' => 'H:mm',
                'LTS' => 'H:mm:ss',
                'L' => 'DD/MM/YYYY',
                'LL' => 'D [punchapi] MMMM [killapi] YYYY',
                'LLL' => 'D [punchapi] MMMM [killapi] YYYY H:mm',
                'LLLL' => 'dddd, D [punchapi] MMMM [killapi] YYYY H:mm',
            ],
            'calendar' => [
                'sameDay' => function (CarbonInterface $current) {
                    return '[kunan] LT [pachapi]';
                },
                'nextDay' => function (CarbonInterface $current) {
                    return '[kaya] LT [pachapi]';
                },
                'nextWeek' => function (CarbonInterface $current) {
                    return 'dddd LT [pachapi]';
                },
                'lastDay' => function (CarbonInterface $current) {
                    return '[Kayna] LT [pachapi]';
                },
                'lastWeek' => function (CarbonInterface $current) {
                    return '[kayna] dddd [punchapi] LT [pachapi]';
                },
                'sameElse' => 'L',
            ],
            'months' => ['kulla', 'panchi', 'pawkar', 'ayriwa', 'aymuray', 'raymi', 'sitwa', 'karway', 'kuski', 'wayru', 'sasi', 'kapak'],
            'months_short' => ['kul', 'pan', 'paw', 'ayr', 'aym', 'ray', 'sit', 'kar', 'kus', 'way', 'sas', 'kap'],
            'mmm_suffix' => '.',
            'ordinal' => ':numberº',
            'weekdays' => ['inti', 'awaki', 'awkarik', 'chillay', 'kullka', 'chaska', 'wacha'],
            'weekdays_short' => ['int.', 'awa.', 'awk.', 'chi.', 'kul.', 'cha.', 'wac.'],
            'weekdays_min' => ['in', 'aw', 'ak', 'ch', 'ku', 'ca', 'wa'],
            'first_day_of_week' => 1,
            'day_of_first_week_of_year' => 4,
            'list' => [', ', ' y '],
            'meridiem' => ['a. m.', 'p. m.'],
        ]);
    }
}