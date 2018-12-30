<?php

return [
    'baseUrl' => '',
    'production' => false,
    'siteName' => 'Laravel Zero',
    'siteDescription' => 'Micro-framework for console applications',

    // Algolia DocSearch credentials
    'docsearchApiKey' => 'ac0bd380724d207df97763a999031e82',
    'docsearchIndexName' => 'laravel-zero',

    // navigation menu
    'navigation' => require_once('navigation.php'),

    // helpers
    'isActive' => function ($page, $path) {
        return ends_with(trimPath($page->getPath()), trimPath($path));
    },
    'isActiveParent' => function ($page, $menuItem) {
        if (is_object($menuItem) && $menuItem->children) {
            return $menuItem->children->contains(function ($child) use ($page) {
                return trimPath($page->getPath()) == trimPath($child);
            });
        }
    },
    'url' => function ($page, $path) {
        return starts_with($path, 'http') ? $path : '/' . trimPath($path);
    },
];