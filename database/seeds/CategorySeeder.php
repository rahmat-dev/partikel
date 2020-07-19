<?php

use App\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $categories = [
      'Bisnis', 'Gaya Hidup', 'Kuliner', 'Olahraga', 'Otomotif', 'Pengembangan Diri',
      'Teknologi', 'Wisata'
    ];

    foreach ($categories as $category) {
      Category::create([
        'name' => $category,
        'slug' => Str::slug($category),
      ]);
    }
  }
}
