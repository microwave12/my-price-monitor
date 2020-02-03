<?php

namespace App\Console;

use App\Entities\Page;
use App\Entities\PageDetail;
use App\Helpers\Helper;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->call(function () {
            $page = Page::all();
    
            foreach ($page as $list) {
                if (date("i", strtotime($list['created_at'])) == date("i")) {
                    $content = Helper::contentCrawler($list['link']);
                    if (empty($content)) {
                        continue;
                    }
                    
                    $content['page_id'] = $list['id'];
                    PageDetail::create($content);
                }
            }
        })->everyMinute();
    }

    /**
     * Register the Closure based commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        require base_path('routes/console.php');
    }
}
