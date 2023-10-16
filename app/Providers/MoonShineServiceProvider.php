<?php

namespace App\Providers;

use App\Models\Banner;
use App\Models\Contact;
use App\Models\Gallery;
use App\Models\Honor;
use App\Models\Menu;
use App\Models\News;
use App\Models\Page;
use App\Models\Question;
use App\Models\Slider;
use App\MoonShine\Resources\BannerResource;
use App\MoonShine\Resources\BottomLeftMenuResource;
use App\MoonShine\Resources\BottomRightMenuResource;
use App\MoonShine\Resources\ContactResource;
use App\MoonShine\Resources\GalleryResource;
use App\MoonShine\Resources\HonorResource;
use App\MoonShine\Resources\MenuResource;
use App\MoonShine\Resources\NewsResource;
use App\MoonShine\Resources\PageResource;
use App\MoonShine\Resources\QuestionResource;
use App\MoonShine\Resources\SidebarMenuResource;
use App\MoonShine\Resources\SliderResource;
use App\MoonShine\Resources\TopLeftMenuResource;
use App\MoonShine\Resources\TopRightMenuResource;
use Illuminate\Support\ServiceProvider;
use MoonShine\MoonShine;
use MoonShine\Menu\MenuGroup;
use MoonShine\Menu\MenuItem;
use MoonShine\Resources\MoonShineUserResource;
use MoonShine\Resources\MoonShineUserRoleResource;

class MoonShineServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        app(MoonShine::class)->menu([

            MenuGroup::make('Пользователи', [
                MenuItem::make('moonshine::ui.resource.admins_title', new MoonShineUserResource())
                    ->translatable()
                    ->icon('users'),
                MenuItem::make('moonshine::ui.resource.role_title', new MoonShineUserRoleResource())
                    ->translatable()
                    ->icon('bookmark'),
            ])->translatable(),
            MenuGroup::make('Меню', [
                MenuItem::make('Левое верхнее', new TopLeftMenuResource())->badge(fn() => Menu::ofType('TOP_LEFT')->count()),
                MenuItem::make('Правое верхнее', new TopRightMenuResource())->badge(fn() => Menu::ofType('TOP_RIGHT')->count()),
                MenuItem::make('Левое нижнее', new BottomLeftMenuResource())->badge(fn() => Menu::ofType('BOTTOM_LEFT')->count()),
                MenuItem::make('Правое нижнее', new BottomRightMenuResource())->badge(fn() => Menu::ofType('BOTTOM_RIGHT')->count()),
                MenuItem::make('Боковое', new SidebarMenuResource())->badge(fn() => Menu::ofType('SIDEBAR')->count()),
            ]),
            MenuItem::make('Новости', new NewsResource())->badge(fn() => News::query()->count()),
            MenuItem::make('Страницы', new PageResource())->badge(fn() => Page::query()->count()),
            MenuItem::make('Достижения', new HonorResource())->badge(fn() => Honor::query()->count()),
            MenuItem::make('Слайдеры', new SliderResource())->badge(fn() => Slider::query()->count()),
            MenuItem::make('Галерея', new GalleryResource())->badge(fn() => Gallery::query()->count()),
            MenuItem::make('Баннер', new BannerResource())->badge(fn() => Banner::query()->count()),
            MenuItem::make('Контакты', new ContactResource())->badge(fn() => Contact::query()->count()),
            MenuItem::make('Вопросы-ответы', new QuestionResource())->badge(fn() => Question::query()->count()),
        ]);

    }
}
