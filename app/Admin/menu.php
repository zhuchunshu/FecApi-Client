<?php
return [
    [
        'id'            => '1', // 此id只要保证当前的数组中是唯一的即可
        'title'         => '站点设置',
        'icon'          => 'feather icon-settings',
        'uri'           => '',
        'parent_id'     => 0,
        'permission_id' => 'test', // 与权限绑定
        'roles'         => 'test-roles', // 与角色绑定
    ],
    [
        'id'            => '2', // 此id只要保证当前的数组中是唯一的即可
        'title'         => '基本设置',
        'icon'          => '',
        'uri'           => 'setting/setting',
        'parent_id'     => '1',
    ],
    [
        'id'            => 3, // 此id只要保证当前的数组中是唯一的即可
        'title'         => '功能开关',
        'icon'          => '',
        'uri'           => 'setting/switch',
        'parent_id'     => '1',
    ],
    [
        'id'            => 4, // 此id只要保证当前的数组中是唯一的即可
        'title'         => '用户管理',
        'icon'          => 'feather icon-users',
        'uri'           => '',
        'parent_id'     => 0,
    ],
    [
        'id'            => 5, // 此id只要保证当前的数组中是唯一的即可
        'title'         => '所有用户',
        'icon'          => '',
        'uri'           => 'users',
        'parent_id'     => 4,
    ],
    [
        'id'            => 6, // 此id只要保证当前的数组中是唯一的即可
        'title'         => 'API Tokens',
        'icon'          => '',
        'uri'           => 'ApiTokens',
        'parent_id'     => 4,
    ],
];
