<?php

use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comments')->delete();

        for ($i=0; $i < 100; $i++) {
            \App\Comment::create([
                'nickname'   => '88duif',
                'email'   => '88duif@163.com',
                'website'    => '88duif',
                'content' => "aab".$i,
                'article_id' => mt_rand(17,117),
            ]);
        }
    }
}
