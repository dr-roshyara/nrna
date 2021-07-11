<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCandidaciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candidacies', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned()->unique();
            $table->string('candidacy_id');
            $table->string('candidacy_name');
            $table->bigInteger('proposer_id')->unsigned();
            $table->string('proposer_name');
            $table->bigInteger('supporter_id')->unsigned();            
            $table->string('supporter_name'); 
            $table->string('post_name');
            $table->string('post_id')->nullable;
            $table->string('image_path_1')->nullable;
            $table->string('image_path_2')->nullable; 
            $table->string('image_path_3')->nullable;                         
            //
            $table->foreign('user_id') 
                ->references('id')->on('users') 
                ->onDelete('cascade');
            //
            //  $table->foreign('proposer_id')
            //       ->references('id')->on('users')
            //       ->onDelete('cascade');
            // //
            //  $table->foreign('supporter_id')
            //       ->references('id')->on('users')
            //       ->onDelete('cascade');
            // //                  
            $table->foreign('post_id')
                  ->references('post_id')
                  ->on('posts')
                  ->onDelete('cascade');
      
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('candidacies');
    }
}
