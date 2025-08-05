<?php

return [
    'group' => 'Pengaturan',
    'resource' => [
        'id' => 'ID',
        'single' => 'Pengguna',
        'email_verified_at' => 'Email Terverifikasi',
        'created_at' => 'Dibuat Pada',
        'updated_at' => 'Diperbarui Pada',
        'verified' => 'Terverifikasi',
        'unverified' => 'Belum Terverifikasi',
        'name' => 'Nama',
        'email' => 'Email',
        'password' => 'Kata Sandi',
        'password_confirmation' => 'Konfirmasi Kata Sandi',
        'roles' => 'Peran',
        'teams' => 'Tim',
        'label' => 'Pengguna',
        'title' => [
            'show' => 'Lihat Pengguna',
            'delete' => 'Hapus Pengguna',
            'impersonate' => 'Menyamar sebagai Pengguna',
            'create' => 'Buat Pengguna',
            'edit' => 'Edit Pengguna',
            'list' => 'Pengguna',
            'home' => 'Pengguna',
        ],
        'notifications' => [
            'last' => [
                'title' => 'Kesalahan',
                'body' => 'Anda tidak dapat menghapus pengguna terakhir',
            ],
            'self' => [
                'title' => 'Kesalahan',
                'body' => 'Anda tidak dapat menghapus diri sendiri',
            ],
        ],
        'avatar' => 'Avatar',
        'change_password' => 'Ubah Kata Sandi',
        'change_password_auto' => 'Kata Sandi berubah secara otomatis',
        'change_password_success' => 'Kata Sandi berubah secara sukses',
        'change_password_auto_body' => 'Kata Sandi berubah secara otomatis',
        'change_password_success_body' => 'Kata Sandi berubah secara sukses',
        'change_password_auto_body_placeholder' => 'Biarkan kosong untuk menghasilkan secara otomatis',
        'change_password_success_body_placeholder' => 'Biarkan kosong untuk menghasilkan secara otomatis',
    ],
    'bulk' => [
        'teams' => 'Perbarui Tim',
        'roles' => 'Perbarui Peran',
    ],
    'team' => [
        'title' => 'Tim',
        'single' => 'Tim',
        'columns' => [
            'avatar' => 'Avatar',
            'name' => 'Nama',
            'owner' => 'Pemilik',
            'personal_team' => 'Tim Pribadi',
        ],
    ],
    'banner' => [
        'impersonating' => 'Menyamar',
        'leave' => 'Keluar dari Menyamar',
    ],
];
