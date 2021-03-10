<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Users extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {

        $table->increments(id);
        $table->string('name');
        $table->string('email',200);
        $table->string('password');
        $table->string('user_token');
        $table->tinyInteger('is_active',1)->default('1');
        $table->timestamp('created_on')->default('CURRENT_TIMESTAMP');
        $table->integer('created_by',11);
        $table->integer('modified_by',11);
        $table->datetime('modified_on');
        $table->primary('id');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
