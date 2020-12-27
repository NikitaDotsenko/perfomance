<?php

namespace Database\Seeders;

use App\Models\PostStatus;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class PostStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $statuses = [
            [
                'id'   => PostStatus::DRAFT_ID,
                'slug' => PostStatus::DRAFT
            ],
            [
                'id'   => PostStatus::PUBLISHED_ID,
                'slug' => PostStatus::PUBLISHED
            ]
        ];
        PostStatus::insert($statuses);
    }
}
