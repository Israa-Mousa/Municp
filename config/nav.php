<?php return([
    'dashboard' => [
        'title' => 'Dashboard',
        'icon' => 'far fa-circle nav-icon',
        'route.active' => 'dashboard.index',
        'route' => '/dashboard',
    ],
    'TOURISM AND ANTIQUITIES' => [
        'title' => 'Tourism',
        'icon' => '	fas fa-archway nav-icon',
        'route.active' => 'dashboard.tourisms.*',
        'route' => '/dashboard/tourisms',
    ],
    'PROJECTS AND ACHIEVEMENTS' => [
        'title' => 'Projects',
        'icon' => 'fas fa-folder-open nav-icon',
        'route.active' => 'dashboard.projects.*',
        'route' => '/dashboard/projects',
    ],
    'CITIZEN SERVICES' => [
    'title' => 'Services',
    'icon' => 'fas fa-tasks nav-icon',
    'route.active' => 'dashboard.services.*',
    'route' => '/dashboard/services',
],
    'blogs' => [
        'title' => 'Blogs',
        'icon' => 'fas fa-book nav-icon',
        'route.active' => 'dashboard.blogs.*',
        'route' => '/dashboard/blogs',
    ],
    'user' => [
        'title' => 'users',
        'icon' => 'far fa-user nav-icon',
        'route.active' => 'dashboard.user.*',
        'route' => '/dashboard/user',
    ],
    'careers' => [
        'title' => 'careers',
        'icon' => 'fas fa-bullhorn nav-icon',
        'route.active' => 'dashboard.careers.*',
        'route' => '/dashboard/careers',
    ],
    'tenders' => [
        'title' => 'Tenders',
        'icon' => 'fas fa-file-contract nav-icon',
        'route.active' => 'dashboard.tenders.*',
        'route' => '/dashboard/tenders',
    ],
    'institutions' => [
        'title' => 'institutions',
        'icon' => 'fas fa-building nav-icon',
        'route.active' => 'dashboard.institutions.*',
        'route' => '/dashboard/institutions',
    ],
    'contact' => [
        'title' => 'contactlist',
        'icon' => 'fas fa-address-book nav-icon',
        'route.active' => 'dashboard.contact.*',
        'route' => '/dashboard/contacts',
    ],
]);
    ?>
