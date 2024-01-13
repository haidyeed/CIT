<?php

namespace App\Listeners;

use App\Models\Statistic;

class ChangeStatisticsCount
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($request)
    {
        $previousTasktsCount = Statistic::where('user_id', $request->user_id)->first()->tasks_count ?? 0;

        Statistic::updateOrCreate(
            ['user_id' => $request->user_id],
            [
                'user_id' => $request->user_id,
                'tasks_count' => ++$previousTasktsCount
            ]
        );

    }
}