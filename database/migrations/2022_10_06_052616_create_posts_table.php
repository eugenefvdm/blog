<?php

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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('category_id')->nullable();
            $table->string('title');
            $table->string('slug');
            $table->text('body');            
            $table->string('excerpt');
            $table->json('tags')->nullable(); 
            $table->string('description')->nullable();
            $table->string('featured_image')->nullable();
            $table->string('featured_image_alt_tag')->nullable();
            $table->string('attachment_file_names')->nullable();
            $table->string('original_image')->nullable();
            $table->string('status')->nullable();
            // $table->integer('sort')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
