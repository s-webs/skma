<?php

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\News;

use MoonShine\Decorations\Block;
use MoonShine\Decorations\Tab;
use MoonShine\Decorations\Tabs;
use MoonShine\Fields\Image;
use MoonShine\Fields\NoInput;
use MoonShine\Fields\Slug;
use MoonShine\Fields\StackFields;
use MoonShine\Fields\SwitchBoolean;
use MoonShine\Fields\Text;
use MoonShine\Fields\TinyMce;
use MoonShine\Resources\Resource;
use MoonShine\Fields\ID;
use MoonShine\Actions\FiltersAction;

class NewsResource extends Resource
{
    public static string $model = News::class;

    public static string $title = 'Новости';

    public string $titleField = 'ru_title';

    public function fields(): array
    {
        return [
            ID::make()->sortable(),
            Block::make('', [
                Tabs::make([
                    Tab::make('KZ', [
                        Text::make('Название на казахском', 'kk_title')
                            ->hideOnIndex(),
                        TinyMce::make('Содержание на казахском', 'kk_content')
                            ->hideOnIndex(),
                        Slug::make('Ссылка для казахского языка', 'kk_slug')->from('kk_title')
                            ->separator('-')
                            ->unique()
                            ->hideOnIndex(),
                    ]),
                    Tab::make('RU', [
                        Text::make('Название на русском', 'ru_title'),
                        TinyMce::make('Содержание на русском', 'ru_content')
                            ->hideOnIndex(),
                        Slug::make('Ссылка для русского языка', 'ru_slug')->from('ru_title')
                            ->separator('-')
                            ->unique(),

                    ]),
                    Tab::make('EN', [
                        Text::make('Название на английском', 'en_title')
                            ->hideOnIndex(),
                        TinyMce::make('Содержание на английском', 'en_content')
                            ->hideOnIndex(),
                        Slug::make('Ссылка для английского языка', 'en_slug')->from('en_title')
                            ->separator('-')
                            ->unique()
                            ->hideOnIndex(),
                    ])
                ]),
                Image::make('Изображение', 'image')
                    ->removable(),
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
