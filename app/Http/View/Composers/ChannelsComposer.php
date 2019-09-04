<?php

namespace App\Http\View\Composers;

use App\channel;
use Illuminate\View\View;

class ChannelsComposer
{

    public function compose(View $view)
    {
        $view->with('channels', channel::orderBy('name')->get());
    }
}
