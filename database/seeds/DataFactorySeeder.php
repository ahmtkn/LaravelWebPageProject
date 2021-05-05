<?php

use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class DataFactorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Category::class,10)->create();
        factory(Tag::class,20)->create();
        factory(User::class,10)->create();
        factory(Post::class,35)->create();
        //factory(Comment::class,10)->create();

        $data=[];
        for ($i=0;$i<80;$i++){
            $data[]=[
                'post_id'=>rand(1,35),
                'tag_id'=>rand(1,20),
                'created_at'=>Carbon::now()->toDateTimeString(),
                'updated_at'=>Carbon::now()->toDateTimeString(),
            ];
        }
        DB::table('post_tag')->insert($data);
    }
}
