<?php

namespace Database\Seeders;
use App\Models\Product; 
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create(['name' => 'Mango', 'category' => 'Fruits', 'description' => 'Sweet and juicy Thai mangoes.']);
        Product::create(['name' => 'Durian', 'category' => 'Fruits', 'description' => 'The king of fruits, with a unique aroma.']);
        Product::create(['name' => 'Thai Chili', 'category' => 'Vegetables', 'description' => 'Spicy chilies perfect for cooking.']);
        Product::create(['name' => 'Holy Basil', 'category' => 'Thai Herb', 'description' => 'Aromatic herb for authentic Thai dishes.']);
        Product::create(['name' => 'Tamarind Paste', 'category' => 'Thai Product', 'description' => 'Concentrated tamarind paste for sauces.']);
    
        //
    }
}
