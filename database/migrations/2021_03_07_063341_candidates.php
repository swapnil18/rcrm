<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Candidates extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candidates', function (Blueprint $table) {

        $table->increments(id);
        $table->string('first_name',40);
        $table->string('last_name',40);
        $table->string('email',100);
        $table->string('contact_number',15);
        $table->tinyInteger('gender',4)->nullable()->default('NULL');
        $table->string('specialization',200)->nullable()->default('NULL');
        $table->integer('work_ex_year',11);
        $table->integer('candidate_dob',11);
        $table->string('address',500)->nullable()->default('NULL');
        $table->string('resume',200)->nullable()->default('NULL');
        $table->timestamp('created_on')->default('CURRENT_TIMESTAMP');
        $table->integer('created_by',11)->nullable()->default('NULL');
        $table->integer('modified_by',11)->nullable()->default('NULL');
        $table->datetime('modified_on')->nullable()->default('NULL');
        $table->primary('id');    
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('candidates');
    }
}
