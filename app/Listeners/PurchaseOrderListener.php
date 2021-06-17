<?php

namespace App\Listeners;

use App\Notifications\PurchaseOrderNotification;
use App\PurchaseOrder;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;
use App\User;

class PurchaseOrderListener
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
    public function handle($event)
    {
        
       
        Notification::send(User::find(1), new PurchaseOrderNotification($event->purchaseorder));
    }
}
