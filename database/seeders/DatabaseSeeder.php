<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            'Technology',
            'Engineering',
            'Goverment',
            'Medical',
            'Construction',
            'Software'
        ];

        foreach ($categories as $category) {
            
                Category::create([
                'name' => $category
                ]);
        
    }
}
}