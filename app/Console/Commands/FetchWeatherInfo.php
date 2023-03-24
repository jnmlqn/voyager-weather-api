<?php

namespace App\Console\Commands;

use App\Services\WeatherService;
use Illuminate\Console\Command;
use Log;

class FetchWeatherInfo extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'weather:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch weather info for the following cities';

    /**
     * @var WeatherService
     */
    protected WeatherService $weatherService;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(WeatherService $weatherService)
    {
        parent::__construct();

        $this->weatherService = $weatherService;
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        if (!$this->weatherService->createOrUpdateWeather()) {
            Log::info('weather-info-updated');

            return 1;
        }

        return 0;
    }
}
