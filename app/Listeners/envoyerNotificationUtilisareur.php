<?php

namespace App\Listeners;

use App\Events\OffreCree;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class envoyerNotificationUtilisareur
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
        $auteur = $event->auteur_nom;
        $email= $event->auteur_email;

        Mail::send(
            'email.notificationUtilisateur',['nom'=>$auteur],function($message) use($email,$auteur){
            $message->from('admin@lesoffres.com');
            $message->to($email,$auteur);
            $message->subject('Merci pour votre offre');
        });
    }
}
