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
use App\Models\Player;
use App\Models\Special;

class Players extends TwillBlockComponent
{
  public function render(): View
  {
    return view('components.twill.blocks.players');
  }
  public function getForm(): Form
  {
    return Form::make([]);
  }

  public static function getBlockTitle(?Block $block = null): string
  {
    return "Game Footer";
  }
}
