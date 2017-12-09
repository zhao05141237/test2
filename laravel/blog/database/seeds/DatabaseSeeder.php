<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(ArticleSeeder::class);
        $this->call(CommentSeeder::class);
//         $this->call('UserTableSeeder');

//         $this->command->info('User table seeded!');
    }
}
