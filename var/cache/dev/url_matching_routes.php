<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/_profiler' => [[['_route' => '_profiler_home', '_controller' => 'web_profiler.controller.profiler::homeAction'], null, null, null, true, false, null]],
        '/_profiler/search' => [[['_route' => '_profiler_search', '_controller' => 'web_profiler.controller.profiler::searchAction'], null, null, null, false, false, null]],
        '/_profiler/search_bar' => [[['_route' => '_profiler_search_bar', '_controller' => 'web_profiler.controller.profiler::searchBarAction'], null, null, null, false, false, null]],
        '/_profiler/phpinfo' => [[['_route' => '_profiler_phpinfo', '_controller' => 'web_profiler.controller.profiler::phpinfoAction'], null, null, null, false, false, null]],
        '/_profiler/open' => [[['_route' => '_profiler_open_file', '_controller' => 'web_profiler.controller.profiler::openAction'], null, null, null, false, false, null]],
        '/admin/category' => [[['_route' => 'category.index', '_controller' => 'App\\Controller\\CategoryController::index'], null, null, null, true, false, null]],
        '/admin/category/create' => [[['_route' => 'category.create', '_controller' => 'App\\Controller\\CategoryController::create'], null, null, null, false, false, null]],
        '/' => [[['_route' => 'home.index', '_controller' => 'App\\Controller\\HomeController::index'], null, null, null, false, false, null]],
        '/admin/product' => [[['_route' => 'product.index', '_controller' => 'App\\Controller\\ProductController::index'], null, null, null, false, false, null]],
        '/admin/product/create' => [[['_route' => 'product.create', '_controller' => 'App\\Controller\\ProductController::create'], null, null, null, false, false, null]],
        '/search' => [[['_route' => 'product.search', '_controller' => 'App\\Controller\\ProductController::searchAction'], null, null, null, false, false, null]],
        '/register' => [[['_route' => 'register', '_controller' => 'App\\Controller\\RegistrationController::register'], null, null, null, false, false, null]],
        '/login' => [[['_route' => 'app_login', '_controller' => 'App\\Controller\\SecurityController::login'], null, null, null, false, false, null]],
        '/logout' => [[['_route' => 'app_logout', '_controller' => 'App\\Controller\\SecurityController::logout'], null, null, null, false, false, null]],
        '/admin/user' => [[['_route' => 'user.index', '_controller' => 'App\\Controller\\UserController::index'], null, null, null, false, false, null]],
        '/admin/user/create' => [[['_route' => 'user.create', '_controller' => 'App\\Controller\\UserController::create'], null, null, null, false, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/_(?'
                    .'|error/(\\d+)(?:\\.([^/]++))?(*:38)'
                    .'|wdt/([^/]++)(*:57)'
                    .'|profiler/([^/]++)(?'
                        .'|/(?'
                            .'|search/results(*:102)'
                            .'|router(*:116)'
                            .'|exception(?'
                                .'|(*:136)'
                                .'|\\.css(*:149)'
                            .')'
                        .')'
                        .'|(*:159)'
                    .')'
                .')'
                .'|/admin/(?'
                    .'|category/(?'
                        .'|edit/([^/]++)(*:204)'
                        .'|destroy/([^/]++)(*:228)'
                    .')'
                    .'|image/destroy/([^/]++)(*:259)'
                    .'|product/(?'
                        .'|edit/([^/]++)(*:291)'
                        .'|destroy/([^/]++)(*:315)'
                    .')'
                    .'|user/destroy/([^/]++)(*:345)'
                .')'
                .'|/category/([^/]++)(*:372)'
                .'|/product/show/([^/]++)(*:402)'
                .'|/user/(?'
                    .'|show/([^/]++)(*:432)'
                    .'|edit/([^/]++)(*:453)'
                .')'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        38 => [[['_route' => '_preview_error', '_controller' => 'error_controller::preview', '_format' => 'html'], ['code', '_format'], null, null, false, true, null]],
        57 => [[['_route' => '_wdt', '_controller' => 'web_profiler.controller.profiler::toolbarAction'], ['token'], null, null, false, true, null]],
        102 => [[['_route' => '_profiler_search_results', '_controller' => 'web_profiler.controller.profiler::searchResultsAction'], ['token'], null, null, false, false, null]],
        116 => [[['_route' => '_profiler_router', '_controller' => 'web_profiler.controller.router::panelAction'], ['token'], null, null, false, false, null]],
        136 => [[['_route' => '_profiler_exception', '_controller' => 'web_profiler.controller.exception_panel::body'], ['token'], null, null, false, false, null]],
        149 => [[['_route' => '_profiler_exception_css', '_controller' => 'web_profiler.controller.exception_panel::stylesheet'], ['token'], null, null, false, false, null]],
        159 => [[['_route' => '_profiler', '_controller' => 'web_profiler.controller.profiler::panelAction'], ['token'], null, null, false, true, null]],
        204 => [[['_route' => 'category.edit', '_controller' => 'App\\Controller\\CategoryController::edit'], ['id'], null, null, false, true, null]],
        228 => [[['_route' => 'category.destroy', '_controller' => 'App\\Controller\\CategoryController::destroy'], ['id'], null, null, false, true, null]],
        259 => [[['_route' => 'image.destroy', '_controller' => 'App\\Controller\\ImageController::destroy'], ['image'], null, null, false, true, null]],
        291 => [[['_route' => 'product.edit', '_controller' => 'App\\Controller\\ProductController::edit'], ['id'], null, null, false, true, null]],
        315 => [[['_route' => 'product.destroy', '_controller' => 'App\\Controller\\ProductController::destroy'], ['id'], null, null, false, true, null]],
        345 => [[['_route' => 'user.destroy', '_controller' => 'App\\Controller\\UserController::destroy'], ['id'], null, null, false, true, null]],
        372 => [[['_route' => 'home.products_category', '_controller' => 'App\\Controller\\HomeController::productCategories'], ['id'], null, null, false, true, null]],
        402 => [[['_route' => 'product.show', '_controller' => 'App\\Controller\\ProductController::show'], ['id'], null, null, false, true, null]],
        432 => [[['_route' => 'user.show', '_controller' => 'App\\Controller\\UserController::show'], ['id'], null, null, false, true, null]],
        453 => [
            [['_route' => 'user.edit', '_controller' => 'App\\Controller\\UserController::edit'], ['id'], null, null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
