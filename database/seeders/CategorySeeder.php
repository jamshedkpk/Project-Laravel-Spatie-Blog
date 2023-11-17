<?php
namespace Database\Seeders;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        Category::create
        ([
            'name'=>'Showes',
            'status'=>1,
            'user_id'=>2
        ]);
        Category::create
        ([
            'name'=>'Cosmatics',
            'status'=>1,
            'user_id'=>1
        ]);
        Category::create
        ([
            'name'=>'Garments',
            'status'=>1,
            'user_id'=>2
        ]);
        Category::create
        ([
            'name'=>'Crockeries',
            'status'=>1,
            'user_id'=>1
        ]);
        Category::create
        ([
            'name'=>'Jewallaries',
            'status'=>1,
            'user_id'=>2
        ]);
    }
}
