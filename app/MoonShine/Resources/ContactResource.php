<?php

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\Contact;

use MoonShine\Decorations\Tab;
use MoonShine\Decorations\Tabs;
use MoonShine\Fields\Checkbox;
use MoonShine\Fields\Image;
use MoonShine\Fields\Select;
use MoonShine\Fields\Text;
use MoonShine\Resources\Resource;
use MoonShine\Fields\ID;
use MoonShine\Actions\FiltersAction;

class ContactResource extends Resource
{
    public static string $model = Contact::class;

    public static string $title = 'Contacts';

    public function fields(): array
    {
        return [
            ID::make()->sortable(),
            Tabs::make([
                Tab::make('KZ', [
                    Text::make('Название на казахском', 'kk_title')
                        ->hideOnIndex(),
                    Text::make('Ссылка на казахском', 'kk_link')
                        ->hideOnIndex(),
                ]),
                Tab::make('RU', [
                    Text::make('Название на русском', 'ru_title'),
                    Text::make('Ссылка на русском', 'ru_link'),
                ]),
                Tab::make('EN', [
                    Text::make('Название на английском', 'en_title')
                        ->hideOnIndex(),
                    Text::make('Ссылка на английском', 'en_link')
                        ->hideOnIndex(),
                ]),
            ]),
            Select::make('Расположение', 'type')
                ->options([
                    0 => 'Мы в социальных сетях',
                    1 => 'Про нас'
                ]),
            Checkbox::make('Внешняя ссылка', 'external')
        ];
    }

    public function rules(Model $item): array
    {
        return [];
    }

    public function search(): array
    {
        return ['id'];
    }

    public function filters(): array
    {
        return [];
    }

    public function actions(): array
    {
        return [
            FiltersAction::make(trans('moonshine::ui.filters')),
        ];
    }
}
