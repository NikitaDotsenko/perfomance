<?php

use App\Models\Post;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(app(Post::class)->getTable(), function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->text('content')->nullable();
            $table->string('title', 100)->nullable();
            $table->unsignedBigInteger('status_id')->nullable();
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('status_id')->references('id')->on('post_statuses');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table(app(Post::class)->getTable(), function (Blueprint $table) {
            $table->dropForeign('posts_user_id_foreign');
            $table->dropForeign('posts_statuses_status_id_foreign');
            $table->dropIfExists();
        });
    }
}
