<?php

namespace App\Listeners;

use App\Events\CartCountEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class AddToCartCountListener
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
     * @param  CartCountEvent  $event
     * @return void
     */
    public function handle(CartCountEvent $event)
    {
        $event->count ++;
    }
}
