<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

<<<<<<< HEAD:vendor/laravel/framework/src/Illuminate/Database/Migrations/stubs/migration.update.stub
class {{ class }} extends Migration
=======
class AddCanVoteToUsersTable extends Migration
>>>>>>> 08bbfb6c2608490d5b2d1e1552bce413db7177a8:database/migrations/2021_07_14_225604_add_can_vote_to_users_table.php
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
<<<<<<< HEAD:vendor/laravel/framework/src/Illuminate/Database/Migrations/stubs/migration.update.stub
        Schema::table('{{ table }}', function (Blueprint $table) {
            //
=======
        Schema::table('users', function (Blueprint $table) {
            //
             $table->boolean('can_vote_now')->default(0);
>>>>>>> 08bbfb6c2608490d5b2d1e1552bce413db7177a8:database/migrations/2021_07_14_225604_add_can_vote_to_users_table.php
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
<<<<<<< HEAD:vendor/laravel/framework/src/Illuminate/Database/Migrations/stubs/migration.update.stub
        Schema::table('{{ table }}', function (Blueprint $table) {
=======
        Schema::table('users', function (Blueprint $table) {
>>>>>>> 08bbfb6c2608490d5b2d1e1552bce413db7177a8:database/migrations/2021_07_14_225604_add_can_vote_to_users_table.php
            //
        });
    }
}
