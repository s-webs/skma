<?php

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\Banner;

use MoonShine\Decorations\Tab;
use MoonShine\Decorations\Tabs;
use MoonShine\Fields\Checkbox;
use MoonShine\Fields\Image;
use MoonShine\Fields\Select;
use MoonShine\Fields\Text;
use MoonShine\Resources\Resource;
use MoonShine\Fields\ID;
use MoonShine\Actions\FiltersAction;

class BannerResource extends Resource
{
    public static string $model = Banner::class;

    public static string $title = 'Баннеры';

    public function fields(): array
    {
        return [
            ID::make()->sortable(),
            Tabs::make([
                Tab::make('KZ', [
                    Image::make('Изображение на казахском', 'kk_image')
                        ->hideOnIndex(),
                    Text::make('Ссылка на казахском', 'kk_link')
                        ->hideOnIndex(),
                ]),
                Tab::make('RU', [
                    Image::make('Изображение на русском', 'ru_image'),
                    Text::make('Ссылка на русском', 'ru_link'),
                ]),
                Tab::make('EN', [
                    Image::make('Изображение на английском', 'en_image')
                        ->hideOnIndex(),
                    Text::make('Ссылка на английском', 'en_link')
                        ->hideOnIndex(),
                ]),
            ]),
            Select::make('Расположение', 'type')
                ->options([
                    0 => 'Под Меню',
                    1 => 'Под вопросы-ответы',
                    2 => 'Нижнее',
                    3 => 'Над футером',
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
