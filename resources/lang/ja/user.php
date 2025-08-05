<?php

return [
    'group' => 'ALC',
    'resource' => [
        'id' => 'ID',
        'single' => 'ユーザー',
        'email_verified_at' => 'メールアドレス認証日時',
        'created_at' => '作成日時',
        'updated_at' => '更新日時',
        'verified' => '認証済',
        'unverified' => '未認証',
        'name' => '名前',
        'email' => 'メールアドレス',
        'password' => 'パスワード',
        'password_confirmation' => 'パスワード確認',
        'roles' => 'ロール',
        'teams' => 'チーム',
        'label' => 'ユーザー',
        'title' => [
            'show' => 'ユーザーを表示',
            'delete' => 'ユーザーを削除',
            'impersonate' => 'ユーザーを偽装',
            'create' => 'ユーザーを作成',
            'edit' => 'ユーザーを編集',
            'list' => 'ユーザー',
            'home' => 'ユーザー',
        ],
        'notificaitons' => [
            'last' => [
                'title' => 'エラー',
                'body' => '最後のユーザーを削除することはできません',
            ],
            'self' => [
                'title' => 'エラー',
                'body' => '自分自身を削除することはできません',
            ],
        ],
        'avatar' => 'アバター',
        'change_password' => 'パスワードを変更',
        'change_password_auto' => 'パスワードが自動的に変更されました',
        'change_password_success' => 'パスワードが正常に変更されました',
        'change_password_auto_body' => 'パスワードが自動的に変更されました',
        'change_password_success_body' => 'パスワードが正常に変更されました',
        'change_password_auto_body_placeholder' => '自動生成する場合は空欄にしてください',
        'change_password_success_body_placeholder' => '自動生成する場合は空欄にしてください',
    ],
    'bulk' => [
        'teams' => 'チームを更新',
        'roles' => 'ロールを更新',
    ],
    'team' => [
        'title' => 'チーム',
        'single' => 'チーム',
        'columns' => [
            'avatar' => 'アバター',
            'name' => '名前',
            'owner' => 'オーナー',
            'personal_team' => '個人チーム',
        ],
    ],
    'banner' => [
        'impersonating' => '偽装中',
        'leave' => '偽装を終了',
    ],
];
