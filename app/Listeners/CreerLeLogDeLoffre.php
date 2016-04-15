<?php

namespace App\Listeners;

use App\Events\OffreCree;
use App\Offreslog;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class CreerLeLogDeLoffre
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
     * @param  OffreCree  $event
     * @return void
     */
    public function handle(OffreCree $event)
    {
      $auteur = $event->auteur;

        $log=new Offreslog();
        $log->auteur=$auteur;
        $log->save();
    }
}
