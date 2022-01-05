<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Schema;


class Comments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table){
            $table->bigInteger('id',true, true);
            $table->bigInteger('post_id', false, true);
            $table->foreign('post_id')->references('id')->on('posts')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('comment', 521);
            $table->timestamp('created_at')->default(Carbon::now());
            $table->timestamp('updated_at')->default(Carbon::now());
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
