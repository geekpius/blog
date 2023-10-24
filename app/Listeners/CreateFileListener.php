<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class CreateFileListener
{
    /**
     * Handle the event.
     */
    public function handle(object $event): void
    {
        $event->post->createBannerImage($event->bannerImage);
        $event->post->refresh();
    }
}
