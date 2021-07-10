<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     * 
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();            
            $table->string('from');
            $table->string('to');
            $table->string('code');
            $table->string('message'); 
            $table->bigInteger('messager_sender_id')->unsigned();
            $table->bigInteger('messager_sender_name');
            $table->timestamps(); 
             //
            $table->foreign('user_id')
                ->references('id')->on('users') 
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
        Schema::dropIfExists('messages');
    }
}
