<?php
namespace Database\Seeders;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
public function run(): void
{
Permission::create([
'name'=>'view-user'
]);  
Permission::create([
'name'=>'create-user'
]);  
Permission::create([
'name'=>'edit-user'
]);  
Permission::create([
'name'=>'delete-user'
]);  
Permission::create([
'name'=>'view-category'
]);  
Permission::create([
'name'=>'create-category'
]);  
Permission::create([
'name'=>'edit-category'
]);  
Permission::create([
'name'=>'delete-category'
]);  
Permission::create([
'name'=>'view-post'
]);  
Permission::create([
'name'=>'create-post'
]);  
Permission::create([
'name'=>'edit-post'
]);  
Permission::create([
'name'=>'delete-post'
]);  
                                                                                                                    }
}
