<?php

// translations for Shibomb/FilamentTodo
return [
    'enums' => [
        'is_finished' => [
            'unfinished' => '未完了',
            'finished' => '完了',
        ],
    ],
    'navigation' => [
        'category' => [
            'group' => 'ToDo',
            'label' => 'カテゴリー',
        ],
        'todo' => [
            'group' => 'ToDo',
            'label' => 'ToDo',
        ],
    ],
    'resource' => [
        'category' => [
            'label' => 'カテゴリー',
            'single' => 'カテゴリー',

            'name' => 'カテゴリー名',
            'color' => 'カラー',
            'sort_order' => '並び順',
        ],
        'todo' => [
            'label' => 'ToDos',
            'single' => 'ToDo',

            'title' => 'タイトル',
            'content' => 'コンテンツ',
            'image' => 'イメージ',
            'published_at' => '公開日',
            'is_finished' => '完了',
        ],
    ],
    'help' => [
        'todo' => [
            'list' => [
                'filter' => [
                    'unfinished_only' => '未完了のみ',
                    'published_until' => '公開日が以前',
                ],
            ],
            'form' => [
                'title' => 'Todo',
                'description' => 'Description',
                'status' => 'Status',
                'is_finished' => [
                    'helper' => 'Check when <strong>finished.<strong>',
                ],
            ],
        ],
    ],
];
