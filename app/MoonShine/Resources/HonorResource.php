<?php

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\Honor;

use Leeto\MoonShineTree\Resources\TreeResource;
use MoonShine\Decorations\Block;
use MoonShine\Decorations\Tab;
use MoonShine\Decorations\Tabs;
use MoonShine\Fields\Image;
use MoonShine\Fields\Number;
use MoonShine\Fields\StackFields;
use MoonShine\Fields\SwitchBoolean;
use MoonShine\Fields\Text;
use MoonShine\Resources\Resource;
use MoonShine\Fields\ID;
use MoonShine\Actions\FiltersAction;

class HonorResource extends Resource
{
    public static string $model = Honor::class;

    public string $titleField = 'ru_title';

    public static string $orderType = 'ASC';

    public static string $title = 'Достижения';

    public function fields(): array
    {
        return [
            ID::make()->sortable(),
            Block::make('Основное', [
                Tabs::make([
                    Tab::make('KZ', [
                        Text::make('Название на казахском', 'kk_title')
                            ->hideOnIndex(),
                        Image::make('Изображение на казахском', 'kk_image')
                            ->hideOnIndex()
                    ]),
                    Tab::make('RU', [
                        Text::make('Название на русском', 'ru_title'),
                        Image::make('Изображение на русском', 'ru_image')
                    ]),
                    Tab::make('EN', [
                        Text::make('Название на английском', 'en_title')
                            ->hideOnIndex(),
                        Image::make('Изображение на английском', 'en_image')
                            ->hideOnIndex()
                    ]),
                ]),
                Number::make('Положение', 'order'),
                SwitchBoolean::make('Публикация', 'published'),
            ]),
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
