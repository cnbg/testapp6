<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id')->nullable();
            $table->unsignedInteger('post_id')->nullable();
            $table->text('content');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('user_id')->on('users')->references('id')
                  ->cascadeOnUpdate()->nullOnDelete();
            $table->foreign('post_id')->on('posts')->references('id')
                  ->cascadeOnUpdate()->nullOnDelete();
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
};
