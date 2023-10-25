<?php

namespace Database\Seeders;

use App\Models\Templates;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TemplatesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Templates::create([
            'code' => '123123',
            'title' => 'Menuju lebih baik',
            'request_letter' => 'Selamat ulang tahun !!',
            'description' => 'Berkisah dari jaman dahulu kala',
            'author' => 'budi',
        ]);
        Templates::create([
            'code' => '321321',
            'title' => 'Menuju lebih jahat',
            'request_letter' => 'Selamat ulang hari !!',
            'description' => 'Berkisah dari jaman sekarang',
            'author' => 'tono',
        ]);
        Templates::create([
            'code' => '121212',
            'title' => 'Menuju lebih bagus',
            'request_letter' => 'Selamat ulang ulangan !!',
            'description' => 'Berkisah dari jaman yang akan data',
            'author' => 'yudi',
        ]);
    }
}
