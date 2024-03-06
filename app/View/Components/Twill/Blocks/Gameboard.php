<?php

namespace App\View\Components\Twill\Blocks;

use App\Models\Page;
use App\Models\Property;
use A17\Twill\Models\Block;
use A17\Twill\Services\Forms\Form;
use Illuminate\Contracts\View\View;
use A17\Twill\Services\Forms\Fields\Input;
use A17\Twill\Services\Forms\Fields\Medias;
use A17\Twill\Services\Forms\Fields\Browser;
use A17\Twill\Services\Forms\Fields\Wysiwyg;
use A17\Twill\View\Components\Blocks\TwillBlockComponent;
use App\Models\Special;

class Gameboard extends TwillBlockComponent
{
  public function render(): View
  {
    return view('components.twill.blocks.gameboard');
  }
  public function getForm(): Form
  {
    return Form::make([
      Input::make()->name('title')->translatable(),

      Input::make()->name('parking_top')->label('Parking Text Top')->translatable(),

      Input::make()->name('parking_bottom')->label('Parking Text Bottom')->translatable(),

      Medias::make()->name('parking_icon')->label('Parking Icon')->max(1),

      Input::make()->name('jail_top')->label('Jail Text Top')->translatable(),

      Input::make()->name('jail_bottom')->label('Jail Text Bottom')->translatable(),

      Medias::make()->name('jail_icon')->label('Jail Icon')->max(1),

      Input::make()->name('in_jail_top')->label('In Jail Text Top')->translatable(),

      Input::make()->name('in_jail_bottom')->label('In Jail Text Bottom')->translatable(),

      Input::make()->name('visiting')->label('Visiting Text')->translatable(),

      Medias::make()->name('in_jail_icon')->label('In Jail Icon')->max(1),

      Input::make()->name('go_top')->label('Go Text Top')->translatable(),

      Input::make()->name('go_bottom')->label('Go Text Bottom')->translatable(),

      Medias::make()->name('go_icon')->label('Go Icon')->max(1),
      
      Browser::make()
        ->name('top_cards')
        ->modules([Property::class, Special::class])
        ->max(9),

      Browser::make()
        ->name('left_cards')
        ->modules([Property::class, Special::class])
        ->max(9),

      Browser::make()
        ->name('right_cards')
        ->modules([Property::class, Special::class])
        ->max(9),

      Browser::make()
        ->name('bottom_cards')
        ->modules([Property::class, Special::class])
        ->max(9),
    ]);
  }

  public static function getBlockTitle(?Block $block = null): string
  {
    return "Game Board";
  }
}
