<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Category::create(
            [
                'name' => 'Web Design',
                'slug' => Str::slug('Web Design')
            ]
        );
        Category::create(
            [
                'name' => 'Web Dev',
                'slug' => Str::slug('Web Dev')
            ]
        );
        Category::create(
            [
                'name' => 'Programming',
                'slug' => Str::slug('programming')
            ]
        );
        Category::create(
            [
                'name' => 'Mobile Apps',
                'slug' => Str::slug('Mobile Apps')
            ],
        );
        Category::create(
            [
                'name' => 'Frontend Dev',
                'slug' => Str::slug('Frontend Dev')
            ],
        );
    }
}
