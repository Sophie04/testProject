<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->string('text');
            $table->string('userName');
            $table->string('userPhoto');
            $table->unsignedBigInteger('userId');
            $table->unsignedBigInteger('postId');
            $table->timestamps();
            

            $table->foreign('userId')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table->foreign('postId')
                ->references('id')
                ->on('posts')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
}
