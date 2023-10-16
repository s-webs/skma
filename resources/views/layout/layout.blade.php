<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords"
          content="ОҚМА, ЮКМА, SKMA, Medical Academy, медицинская академия, медицина академиясы, Оңтүстік Қазақстан медицина академиясы, Южно-Казахстанская медицинская академия, South Kazakhstan Medical Academy, мед колледж, колледж">
    @yield('description')
    <link rel="stylesheet" href="/css/normalize.css">
    @stack('header-styles')
    <link rel="stylesheet" href="/css/footer.css">
    <link rel="stylesheet" href="/css/media.css">
    <link rel="icon" href="/img/icon.png">
    <title>@yield('title') | {{$information->getProperty('title')}}</title>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-R3SQ4VB7WZ"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }

        gtag('js', new Date());

        gtag('config', 'G-R3SQ4VB7WZ');
    </script>

    <!-- Yandex.Metrika counter -->
    <script type="text/javascript">
        (function (m, e, t, r, i, k, a) {
            m[i] = m[i] || function () {
                (m[i].a = m[i].a || []).push(arguments)
            };
            m[i].l = 1 * new Date();
            k = e.createElement(t), a = e.getElementsByTagName(t)[0], k.async = 1, k.src = r, a.parentNode.insertBefore(k, a)
        })
        (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

        ym(83934916, "init", {
            clickmap: true,
            trackLinks: true,
            accurateTrackBounce: true
        });
    </script>
    <noscript>
        <div><img src="https://mc.yandex.ru/watch/83934916" style="position:absolute; left:-9999px;" alt=""/></div>
    </noscript>
    <!-- /Yandex.Metrika counter -->
</head>
<body>
<div class="main_container">
    <header class="header">
        <div class="header_top">
            <ul class="language_list">
                <li class="language_item"><a href="/kk{{$kkLink ? '/' . $kkLink : ''}}{{$page ?? ''}}"
                                             class="language_link {{app()->getLocale() === 'kk' ? 'language_link_active' : ''}}">қаз</a>
                </li>
                <li class="language_item"><a href="/ru{{$ruLink ? '/' . $ruLink : ''}}{{$page ?? ''}}"
                                             class="language_link {{app()->getLocale() === 'ru' ? 'language_link_active' : ''}}">рус</a>
                </li>
                <li class="language_item"><a href="/en{{$enLink ? '/' . $enLink : ''}}{{$page ?? ''}}"
                                             class="language_link {{app()->getLocale() === 'en' ? 'language_link_active' : ''}}">eng</a>
                </li>
            </ul>

            <form action="/{{app()->getLocale()}}/search" class="header_form">
                <button type="submit" class="header_form_button"><img src="/img/header-search-icon.png" alt=""></button>
                <input type="text" name="header_search" class="header_form_input" placeholder="{{__('utils.search')}}"
                       required>
            </form>
        </div>
        <div class="header_menu">
            <a href="/{{app()->getLocale()}}" class="header_logo_link"><img src="/img/logo.png" alt=""
                                                                            class="header_logo"></a>
            <div class="header_menu_top">
                <div class="container">
                    <div class="header_menu_list">
                        <ul class="header_menu_list_left header_menu_list_block">
                            @foreach ($topLeftMenus as $menu)
                                <li class="header_menu_item">
                                    <a href="{{$menu->getProperty('link')}}"
                                       class="header_menu_link">{{$menu->getProperty('title')}}</a>

                                    @if ($menu->hasChildren())
                                        <div class="header_menu_dropdown_icon"></div>
                                        <ul class="header_submenu">
                                            @foreach ($menu->childrenRecursive as $submenu)
                                                <li class="header_menu_item">
                                                    <a href="{{$submenu->getProperty('link')}}"
                                                       class="header_menu_link">{{$submenu->getProperty('title')}}</a>
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
                                    <a href="{{$menu->getProperty('link')}}"
                                       class="header_menu_link">{{$menu->getProperty('title')}}</a>

                                    @if ($menu->hasChildren())
                                        <div class="header_menu_dropdown_icon"></div>
                                        <ul class="header_submenu">
                                            @foreach ($menu->childrenRecursive as $submenu)
                                                <li class="header_menu_item">
                                                    <a href="{{$submenu->getProperty('link')}}"
                                                       class="header_menu_link">{{$submenu->getProperty('title')}}</a>
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
                                    <a href="{{$menu->getProperty('link')}}"
                                       class="header_menu_link">{{$menu->getProperty('title')}}</a>

                                    @if ($menu->hasChildren())
                                        <div class="header_menu_dropdown_icon"></div>
                                        <ul class="header_submenu">
                                            @foreach ($menu->childrenRecursive as $submenu)
                                                <li class="header_menu_item">
                                                    <a href="{{$submenu->getProperty('link')}}"
                                                       class="header_menu_link">{{$submenu->getProperty('title')}}</a>
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
                                    <a href="{{$menu->getProperty('link')}}"
                                       class="header_menu_link">{{$menu->getProperty('title')}}</a>

                                    @if ($menu->hasChildren())
                                        <div class="header_menu_dropdown_icon"></div>
                                        <ul class="header_submenu">
                                            @foreach ($menu->childrenRecursive as $submenu)
                                                <li class="header_menu_item">
                                                    <a href="{{$submenu->getProperty('link')}}"
                                                       class="header_menu_link">{{$submenu->getProperty('title')}}</a>
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

    <div class="header_mobile">
        <a href="/{{app()->getLocale()}}"><img src="/img/logo.png" class="header_mobile_logo" alt=""></a>

        <div class="hamburger">
            <div class="hamburger_inner">
                <div></div>
                <div></div>
                <div></div>
            </div>
        </div>
    </div>

    <div class="header_mobile_menu">
        <ul class="language_list">
            <li class="language_item"><a href="/kk{{$kkLink ? '/' . $kkLink : ''}}{{$page ?? ''}}"
                                         class="language_link {{app()->getLocale() === 'kk' ? 'language_link_active' : ''}}">қаз</a>
            </li>
            <li class="language_item"><a href="/ru{{$ruLink ? '/' . $ruLink : ''}}{{$page ?? ''}}"
                                         class="language_link {{app()->getLocale() === 'ru' ? 'language_link_active' : ''}}">рус</a>
            </li>
            <li class="language_item"><a href="/en{{$enLink ? '/' . $enLink : ''}}{{$page ?? ''}}"
                                         class="language_link {{app()->getLocale() === 'en' ? 'language_link_active' : ''}}">eng</a>
            </li>

            <div class="header_mobile_menu_close">
                <div></div>
                <div></div>
            </div>
        </ul>

        <form action="/search" class="header_form">
            <button type="submit" class="header_form_button"><img src="/img/header-search-icon.png" alt=""></button>
            <input type="text" name="header_search" class="header_form_input" placeholder="{{__('utils.search')}}"
                   required>
        </form>

        <ul>
            @foreach ($topLeftMenus as $menu)
                <li class="header_mobile_menu_item">
                    <div class="header_mobile_menu_item_header">
                        <a href="{{$menu->getProperty('link')}}"
                           class="header_mobile_menu_link">{{$menu->getProperty('title')}}</a>
                        @if ($menu->hasChildren())
                            <div class="header_menu_dropdown_icon"></div>
                        @endif
                    </div>

                    @if ($menu->hasChildren())
                        <ul class="header_mobile_submenu d-none">
                            @foreach ($menu->childrenRecursive as $submenu)
                                <li class="header_mobile_menu_item">
                                    <a href="{{$submenu->getProperty('link')}}"
                                       class="header_mobile_menu_link">{{$submenu->getProperty('title')}}</a>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </li>
            @endforeach
        </ul>
        <ul>
            @foreach ($topRightMenus as $menu)
                <li class="header_mobile_menu_item">
                    <div class="header_mobile_menu_item_header">
                        <a href="{{$menu->getProperty('link')}}"
                           class="header_mobile_menu_link">{{$menu->getProperty('title')}}</a>
                        @if ($menu->hasChildren())
                            <div class="header_menu_dropdown_icon"></div>
                        @endif
                    </div>

                    @if ($menu->hasChildren())
                        <ul class="header_mobile_submenu d-none">
                            @foreach ($menu->childrenRecursive as $submenu)
                                <li class="header_mobile_menu_item">
                                    <a href="{{$submenu->getProperty('link')}}"
                                       class="header_mobile_menu_link">{{$submenu->getProperty('title')}}</a>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </li>
            @endforeach
        </ul>
        <ul>
            @foreach ($bottomLeftMenus as $menu)
                <li class="header_mobile_menu_item">
                    <div class="header_mobile_menu_item_header">
                        <a href="{{$menu->getProperty('link')}}"
                           class="header_mobile_menu_link">{{$menu->getProperty('title')}}</a>
                        @if ($menu->hasChildren())
                            <div class="header_menu_dropdown_icon"></div>
                        @endif
                    </div>

                    @if ($menu->hasChildren())
                        <ul class="header_mobile_submenu d-none">
                            @foreach ($menu->childrenRecursive as $submenu)
                                <li class="header_mobile_menu_item">
                                    <a href="{{$submenu->getProperty('link')}}"
                                       class="header_mobile_menu_link">{{$submenu->getProperty('title')}}</a>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </li>
            @endforeach
        </ul>
        <ul>
            @foreach ($bottomRightMenus as $menu)
                <li class="header_mobile_menu_item">
                    <div class="header_mobile_menu_item_header">
                        <a href="{{$menu->getProperty('link')}}"
                           class="header_mobile_menu_link">{{$menu->getProperty('title')}}</a>
                        @if ($menu->hasChildren())
                            <div class="header_menu_dropdown_icon"></div>
                        @endif
                    </div>

                    @if ($menu->hasChildren())
                        <ul class="header_mobile_submenu d-none">
                            @foreach ($menu->childrenRecursive as $submenu)
                                <li class="header_mobile_menu_item">
                                    <a href="{{$submenu->getProperty('link')}}"
                                       class="header_mobile_menu_link">{{$submenu->getProperty('title')}}</a>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </li>
            @endforeach
        </ul>

        <ul class="header_mobile_sidebar_menu">
            @each('partials.mobile-sidebar-menu', $sidebarMenus, 'menu', 'partials.no-sidebar-menu')
        </ul>
    </div>

    @yield('content')

    <footer class="footer">
        <div class="container">
            <div class="footer_inner">
                <img src="/img/logo_light.png" class="footer_logo" alt="">

                <div class="footer_blocks">
                    <div class="footer_block">
                        <h2 class="footer_heading">{{__('utils.we_are_in_socials')}}</h2>
                        <div class="footer_block_line"></div>

                        <ul class="footer_list">
                            @foreach($contactsSocialLinks as $link)
                                <li class="footer_item">
                                    <a href="{{$link->getProperty('link')}}"
                                       {{$link->external ? 'target="_blank"' : ''}} class="footer_link">{{$link->getProperty('title')}}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="footer_block">
                        <h2 class="footer_heading">{{__('utils.about_us')}}</h2>
                        <div class="footer_block_line"></div>

                        <ul class="footer_list">
                            @foreach($contactsAboutLinks as $link)
                                <li class="footer_item">
                                    <a href="{{$link->getProperty('link')}}"
                                       {{$link->external ? 'target="_blank"' : ''}} class="footer_link">{{$link->getProperty('title')}}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>

@stack('footer-scripts')
<script src="/js/common.js"></script>
<script src="/js/sidebar.js"></script>
</body>
</html>
