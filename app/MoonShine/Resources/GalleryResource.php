<?php

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\Gallery;

use MoonShine\Fields\Image;
use MoonShine\Resources\Resource;
use MoonShine\Fields\ID;
use MoonShine\Actions\FiltersAction;

class GalleryResource extends Resource
{
    public static string $model = Gallery::class;

    public static string $title = 'Галерея';

    public function fields(): array
    {
        return [
            ID::make()->sortable(),
            Image::make('Изображение', 'image'),
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
