<?php

use App\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
  /**
   * Seed the application's database.
   *
   * @return void
   */
  public function run()
  {
    factory(User::class, 2)->create();
    $this->call(CategorySeeder::class);
  }
}
