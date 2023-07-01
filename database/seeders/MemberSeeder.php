<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class MemberSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('members')->insert(['id_cate_member' => '1','fullname' => 'Thành Công', 'username' => 'Admin', 'password' => Hash::make('123456'), 'status' => '1', 'role' => '0']);
    }
}
