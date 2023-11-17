<?php
namespace Database\Seeders;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
public function run(): void
{
// create admin user and assign admin role
User::create
([
'name'=>'admin',
'email'=>'admin@gmail.com',
'password'=>Hash::make('admin')
])->assignRole('admin');
// create a general user and assign user role
User::create
([
'name'=>'user',
'email'=>'user@gmail.com',
'password'=>Hash::make('admin')
])->assignRole('user');
}
}
