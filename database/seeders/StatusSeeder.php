<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    public function run(): void
    {
        Status::create([
            'name' => 'Yangi',
            'code' => 'new',
            'for' => 'order'
        ]);

        Status::create([
            'name' => 'Tasdiqlandi',
            'code' => 'confirmed',
            'for' => 'order'
        ]);

        Status::create([
            'name' => 'Ishlanyapti',
            'code' => 'processing',
            'for' => 'order'
        ]);

        Status::create([
            'name' => 'Yetkazib berilyapti',
            'code' => 'shipping',
            'for' => 'order'
        ]);

        Status::create([
            'name' => 'Yetkazib berildi',
            'code' => 'delivered',
            'for' => 'order'
        ]);

        Status::create([
            'name' => 'Tugatildi',
            'code' => 'completed',
            'for' => 'order'
        ]);

        Status::create([
            'name' => 'Yopildi',
            'code' => 'closed',
            'for' => 'order'
        ]);

        Status::create([
            'name' => 'Bekor qilindi',
            'code' => 'canceled',
            'for' => 'order'
        ]);

        Status::create([
            'name' => 'Qaytarib berildi',
            'code' => 'refunded',
            'for' => 'order'
        ]);

        Status::create([
            'name' => 'To\'lov kutilmoqda',
            'code' => 'waiting_payment',
            'for' => 'order'
        ]);

        Status::create([
            'name' => 'To\'landi',
            'code' => 'paid',
            'for' => 'order'
        ]);

        Status::create([
            'name' => 'To\'lovda Xato',
            'code' => 'payment_error',
            'for' => 'order'
        ]);
    }
}
