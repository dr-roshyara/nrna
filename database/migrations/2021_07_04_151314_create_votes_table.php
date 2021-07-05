<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('votes', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->string('code');
            $table->string('state');
             $table->string('icc_member');
            $table->string('president');
            $table->string('vp1');
            $table->string('vp2');
            $table->string('wvp');
            $table->string('gs');
            $table->string('sec1');
            $table->string('sec2');
            $table->string('treasure');
            $table->string('woman_co');
            $table->string('youth_co');
            $table->string('culture_co');
            $table->string('children_co');
            $table->string('student_co');
            #
            $table->string('s1_member1');
            $table->string('s1_member2');
            $table->string('s1_member3');
            #
            $table->string('s2_member1');
            $table->string('s2_member2');
            $table->string('s2_member3');
           #
            $table->string('s3_member1');
            $table->string('s3_member2');
            $table->string('s3_member3');
           #
            $table->string('s4_member1');
            $table->string('s4_member2');
            $table->string('s4_member3');
            #
            $table->string('s5_member1');
            $table->string('s5_member2');
            $table->string('s5_member3');
            #
            $table->string('s6_member1');
            $table->string('s6_member2');
            $table->string('s6_member3');
            #
            $table->string('s7_member1');
            $table->string('s7_member2');
            $table->string('s7_member3');
            #
            $table->string('s8_member1');
            $table->string('s8_member2');     
            $table->string('s8_member3');     
            #
            //
            $table->foreign('user_id')
                ->references('id')->on('users') 
                ->onDelete('cascade');
            //
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
        Schema::dropIfExists('votes');
    }
}
