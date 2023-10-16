<header class="header">
    <div class="header_top">
        <ul class="language_list">
            <li class="language_item"><a href="/kk{{$kkLink ? '/' . $kkLink : ''}}{{$page ?? ''}}" class="language_link {{app()->getLocale() === 'kk' ? 'language_link_active' : ''}}">қаз</a></li>
            <li class="language_item"><a href="/ru{{$ruLink ? '/' . $ruLink : ''}}{{$page ?? ''}}" class="language_link {{app()->getLocale() === 'ru' ? 'language_link_active' : ''}}">рус</a></li>
            <li class="language_item"><a href="/en{{$enLink ? '/' . $enLink : ''}}{{$page ?? ''}}" class="language_link {{app()->getLocale() === 'en' ? 'language_link_active' : ''}}">eng</a></li>
        </ul>

        <form action="/{{app()->getLocale()}}/search" class="header_form">
            <button type="submit" class="header_form_button"><img src="/img/header-search-icon.png" alt=""></button>
            <input type="text" name="header_search" class="header_form_input" placeholder="{{__('utils.search')}}" required>
        </form>
    </div>
    <div class="header_menu">
        <a href="/{{app()->getLocale()}}" class="header_logo_link"><img src="/img/logo.png" alt="" class="header_logo"></a>
        <div class="header_menu_top">
            <div class="container">
                <div class="header_menu_list">
                    <ul class="header_menu_list_left header_menu_list_block">
                        @foreach ($topLeftMenus as $menu)
                            <li class="header_menu_item">
                                <a href="{{$menu->getProperty('link')}}" class="header_menu_link">{{$menu->getProperty('title')}}</a>

                                @if ($menu->hasChildren())
                                    <div class="header_menu_dropdown_icon"></div>
                                    <ul class="header_submenu">
                                        @foreach ($menu->childrenRecursive as $submenu)
                                            <li class="header_menu_item">
                                                <a href="{{$submenu->getProperty('link')}}" class="header_menu_link">{{$submenu->getProperty('title')}}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif
                            </li>
                        @endforeach
                    </ul>
                    <ul class="header_menu_list_right header_menu_list_block">
                        @foreach ($topRightMenus as $menu)
                            <li class="header_menu_item">
                                <a href="{{$menu->getProperty('link')}}" class="header_menu_link">{{$menu->getProperty('title')}}</a>

                                @if ($menu->hasChildren())
                                    <div class="header_menu_dropdown_icon"></div>
                                    <ul class="header_submenu">
                                        @foreach ($menu->childrenRecursive as $submenu)
                                            <li class="header_menu_item">
                                                <a href="{{$submenu->getProperty('link')}}" class="header_menu_link">{{$submenu->getProperty('title')}}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

        <div class="header_menu_bottom">
            <div class="container">
                <div class="header_menu_list">
                    <ul class="header_menu_list_left header_menu_list_block">
                        @foreach ($bottomLeftMenus as $menu)
                            <li class="header_menu_item">
                                <a href="{{$menu->getProperty('link')}}" class="header_menu_link">{{$menu->getProperty('title')}}</a>

                                @if ($menu->hasChildren())
                                    <div class="header_menu_dropdown_icon"></div>
                                    <ul class="header_submenu">
                                        @foreach ($menu->childrenRecursive as $submenu)
                                            <li class="header_menu_item">
                                                <a href="{{$submenu->getProperty('link')}}" class="header_menu_link">{{$submenu->getProperty('title')}}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif
                            </li>
                        @endforeach
                    </ul>
                    <ul class="header_menu_list_right header_menu_list_block">
                        @foreach ($bottomRightMenus as $menu)
                            <li class="header_menu_item">
                                <a href="{{$menu->getProperty('link')}}" class="header_menu_link">{{$menu->getProperty('title')}}</a>

                                @if ($menu->hasChildren())
                                    <div class="header_menu_dropdown_icon"></div>
                                    <ul class="header_submenu">
                                        @foreach ($menu->childrenRecursive as $submenu)
                                            <li class="header_menu_item">
                                                <a href="{{$submenu->getProperty('link')}}" class="header_menu_link">{{$submenu->getProperty('title')}}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</header>
