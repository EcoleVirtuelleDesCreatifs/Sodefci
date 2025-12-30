<?php

namespace App\Widgets;

use Illuminate\Support\Str;
use TCG\Voyager\Facades\Voyager;
use TCG\Voyager\Widgets\BaseDimmer;
use Illuminate\Support\Facades\Auth;

class DevisDimmer extends BaseDimmer
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [];

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
        $count = \App\Models\Devis::count();
        $string = trans_choice('Devis', $count);

        return view('voyager::dimmer', array_merge($this->config, [
            'icon'   => 'voyager-credit-cards',
            'title'  => "{$count} {$string}",
            'text'   => "Vous avez {$count} {$string} dans votre base de données. Cliquez sur le bouton pour voir tous les devis demandés par les prospects.",
            'button' => [
                'text' => __('Voir tous les devis'),
                'link' => route('voyager.devis.index'),
            ],
            'image' => voyager_asset('images/widget-backgrounds/01.jpg'),
        ]));
    }

    /**
     * Determine if the widget should be displayed.
     *
     * @return bool
     */
    public function shouldBeDisplayed()
    {
        return Auth::user()->can('browse', Voyager::model('User'));
    }
}
