<?php

namespace App\Http\Controllers\Twill;

use A17\Twill\Models\Contracts\TwillModelContract;
use A17\Twill\Services\Listings\Columns\Text;
use A17\Twill\Services\Listings\TableColumns;
use A17\Twill\Services\Forms\Fields\Input;
use A17\Twill\Services\Forms\Form;
use A17\Twill\Http\Controllers\Admin\ModuleController as BaseModuleController;
use A17\Twill\Services\Forms\Fields\Medias;

class PropertyController extends BaseModuleController
{
    protected $moduleName = 'properties';
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
            Input::make()->name('rent0')->label('Rent with no houses')
        );

        $form->add(
            Input::make()->name('rent1')->label('Rent with 1 house')
        );

        $form->add(
            Input::make()->name('rent2')->label('Rent with 2 houses')
        );

        $form->add(
            Input::make()->name('rent3')->label('Rent with 3 houses')
        );

        $form->add(
            Input::make()->name('rent4')->label('Rent with 4 houses')
        );

        $form->add(
            Input::make()->name('rentHotel')->label('Rent with hotel')
        );

        $form->add(
            Input::make()->name('mortgage')->label('Mortgage Value')
        );

        $form->add(
            Input::make()->name('costHouse')->label('Cost to build a house')
        );

        $form->add(
            Input::make()->name('costHotel')->label('Cost to build a hotel')
        );

        return $form;
    }

    /**
     * This is an example and can be removed if no modifications are needed to the table.
     */
    protected function additionalIndexTableColumns(): TableColumns
    {
        $table = parent::additionalIndexTableColumns();

        $table->add(
            Text::make()->field('description')->title('Description')
        );

        return $table;
    }
}
