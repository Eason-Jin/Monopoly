<?php

namespace App\Http\Controllers\Twill;

use A17\Twill\Services\Forms\Form;
use A17\Twill\Services\Forms\Fields\Input;
use A17\Twill\Services\Forms\Fields\Medias;
use A17\Twill\Services\Listings\Columns\Text;
use A17\Twill\Services\Listings\TableColumns;
use A17\Twill\Models\Contracts\TwillModelContract;
use A17\Twill\Http\Controllers\Admin\ModuleController as BaseModuleController;

class SpecialController extends BaseModuleController
{
    protected $moduleName = 'specials';
    /**
     * This method can be used to enable/disable defaults. See setUpController in the docs for available options.
     */
    protected function setUpController(): void
    {
        $this->disablePermalink();
    }

    /**
     * See the table builder docs for more information. If you remove this method you can use the blade files.
     * When using twill:module:make you can specify --bladeForm to use a blade form instead.
     */
    public function getForm(TwillModelContract $model): Form
    {
        $form = parent::getForm($model);

        $form->add(
            Input::make()->name('title')->label('Title')->translatable()
        );

        $form->add(
            Medias::make()->name('cover')->label('Cover image')
        );

        $form->add(
            Input::make()->name('cost')->label('Cost to purchase')
        );

        $form->add(
            Input::make()->name('own1')->label('Rent for owning 1')
        );

        $form->add(
            Input::make()->name('own2')->label('Rent for owning 2')
        );

        $form->add(
            Input::make()->name('own3')->label('Rent for owning 3')
        );

        $form->add(
            Input::make()->name('own4')->label('Rent for owning 4')
        );

        $form->add(
            Input::make()->name('mortgage')->label('Mortgage value')
        );

        return $form;
    }

    /**
     * This is an example and can be removed if no modifications are needed to the table.
     */
    protected function additionalIndexTableColumns(): TableColumns
    {
        $table = parent::additionalIndexTableColumns();

        return $table;
    }
}
