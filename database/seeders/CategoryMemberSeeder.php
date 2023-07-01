<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoryMemberSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('category_members')->insert(['name_role' => 'Admin', 'status_role' => '1', 'status' => '0']);
        DB::table('category_members')->insert(['name_role' => 'Thành viên', 'status_role' => '2', 'status' => '0']);
    }
}
