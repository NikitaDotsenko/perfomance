<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\PostStatus;
use App\Models\User;
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
         $users = User::factory(10)->create();
         $this->call(PostStatusSeeder::class);
         $users->each(function (User $user){
             Post::factory()
                 ->count(5)
                 ->for($user, 'author')
                 ->for(PostStatus::all()->random(), 'status')
                 ->create();
         });

    }
}
