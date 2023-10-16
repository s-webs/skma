<?php

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\Slider;

use MoonShine\Decorations\Block;
use MoonShine\Decorations\Divider;
use MoonShine\Decorations\Tab;
use MoonShine\Decorations\Tabs;
use MoonShine\Fields\Image;
use MoonShine\Fields\Text;
use MoonShine\Fields\Url;
use MoonShine\Resources\Resource;
use MoonShine\Fields\ID;
use MoonShine\Actions\FiltersAction;

class SliderResource extends Resource
{
    public static string $model = Slider::class;

    public static string $title = 'Sliders';

    public function fields(): array
    {
        return [
            ID::make()->sortable(),

            Block::make('', [
                Tabs::make([
                    Tab::make('KZ', [
                        Text::make('Заголовок на казахском', 'kk_title')
                            ->hideOnIndex(),
                        Text::make('Описание на казахском', 'kk_description')
                            ->hideOnIndex(),
                        Image::make('Изображение для казахского языка', 'kk_image')
                            ->dir('/')
                            ->disk('public')
                            ->allowedExtensions(['jpg', 'gif', 'png'])
                            ->removable(),
                        Text::make('Ссылка для казахского языка', 'kk_link')
                            ->hideOnIndex()
                            ->copy(),
                    ]),
                    Tab::make('RU', [
                        Text::make('Заголовок на русском', 'ru_title')
                            ->hideOnIndex(),
                        Text::make('Описание на русском', 'ru_description')
                            ->hideOnIndex(),
                        Image::make('Изображение для русского языка', 'ru_image')
                            ->dir('/')
                            ->disk('public')
                            ->allowedExtensions(['jpg', 'gif', 'png'])
                            ->removable(),
                        Text::make('Ссылка для русского языка', 'ru_link')
                            ->hideOnIndex()
                            ->copy(),
                    ]),
                    Tab::make('EN', [
                        Text::make('Заголовок на английском', 'en_title')
                            ->hideOnIndex(),
                        Text::make('Описание на английском', 'en_description')
                            ->hideOnIndex(),
                        Image::make('Изображение для английского языка', 'en_image')
                            ->dir('/')
                            ->disk('public')
                            ->allowedExtensions(['jpg', 'gif', 'png'])
                            ->removable(),
                        Text::make('Ссылка для английского языка', 'en_link')
                            ->hideOnIndex()
                            ->copy(),
                    ]),
                ])
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
