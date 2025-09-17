<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data=[
            'Technology Category',
            'Health Category',
            'Sports Category',
        ];
        foreach($data as $item){
            Category::create([
                'name'=>$item,
                'slug'=>Str::slug($item),
                'status'=>1,
            ]);
        }
    }
}
