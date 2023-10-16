<?php

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\Question;

use Illuminate\Support\Str;
use MoonShine\Fields\Date;
use MoonShine\Fields\Email;
use MoonShine\Fields\NoInput;
use MoonShine\Fields\SwitchBoolean;
use MoonShine\Fields\Text;
use MoonShine\Fields\Textarea;
use MoonShine\Resources\Resource;
use MoonShine\Fields\ID;
use MoonShine\Actions\FiltersAction;

class QuestionResource extends Resource
{
    public static string $model = Question::class;

    public static string $title = 'Вопросы-ответы';

    public function fields(): array
    {
        return [
            ID::make()->sortable(),
            Text::make('Имя', 'name')->hideOnIndex(),
            NoInput::make('Имя', 'name', static fn($item) => Str::limit($item->name, 50, '...'))
                ->hideOnForm()
                ->hideOnDetail(),
            Email::make('Email', 'email'),
            Textarea::make('Вопрос', 'text')
                ->hideOnIndex(),
            NoInput::make('Вопрос', 'text', static fn($item) => Str::limit($item->text, 50, '...'))
                ->hideOnForm()
                ->hideOnDetail(),
            Textarea::make('Ответ', 'answer')
                ->nullable()
                ->hideOnIndex(),
            SwitchBoolean::make('Публикация', 'published'),
            Date::make('Дата', 'updated_at')
                ->format('d.m.Y')
                ->hideOnForm(),
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
