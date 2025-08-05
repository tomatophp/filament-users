<?php

return [
    'group' => 'الإعدادات',
    'resource' => [
        'id' => 'م',
        'single' => 'مستخدم',
        'email_verified_at' => 'البريد الالكتروني مفعل',
        'created_at' => 'تم اضافته في',
        'updated_at' => 'تم تعديله في',
        'verified' => 'مفعل',
        'unverified' => 'غير مفعل',
        'name' => 'الاسم',
        'email' => 'البريد الالكتروني',
        'password' => 'كلمة المرور',
        'password_confirmation' => 'تأكيد كلمة المرور',
        'roles' => 'الرتب',
        'teams' => 'الفرق',
        'label' => 'المستخدمين',
        'title' => [
            'show' => 'عرض مستخدم',
            'delete' => 'حذف مستخدم',
            'impersonate' => 'تقمص مستخدم',
            'create' => 'إنشاء مستخدم',
            'edit' => 'تعديل مستخدم',
            'list' => 'المستخدمين',
            'home' => 'المستخدمين',
        ],
        'notificaitons' => [
            'last' => [
                'title' => 'خطأ',
                'body' => 'لا يمكنك حذف آخر مستخدم',
            ],
            'self' => [
                'title' => 'خطأ',
                'body' => 'لا يمكنك حذف نفسك',
            ],
        ],
        'avatar' => 'الصورة الشخصية',
        'change_password' => 'تغيير كلمة المرور',
        'change_password_auto' => 'تم تغيير كلمة المرور بشكل آلي',
        'change_password_success' => 'تم تغيير كلمة المرور بنجاح',
        'change_password_auto_body' => 'تم تغيير كلمة المرور بشكل آلي',
        'change_password_success_body' => 'تم تغيير كلمة المرور بنجاح',
        'change_password_auto_body_placeholder' => 'اترك فارغ لتوليد تلقائي',
        'change_password_success_body_placeholder' => 'اترك فارغ لتوليد تلقائي',
    ],
    'bulk' => [
        'teams' => 'تحديث الفرق',
        'roles' => 'تحديث الأدوار',
    ],
    'team' => [
        'title' => 'الفرق',
        'single' => 'فريق',
        'columns' => [
            'avatar' => 'الصورة الشخصية',
            'name' => 'الاسم',
            'owner' => 'المالك',
            'personal_team' => 'فريق شخصي',
        ],
    ],
    'banner' => [
        'impersonating' => 'تقمص',
        'leave' => 'ترك التقمص',
    ],
];
