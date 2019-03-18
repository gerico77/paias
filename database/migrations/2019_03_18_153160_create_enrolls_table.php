<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEnrollsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enrolls', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->nullable();
            $table->foreign('user_id', 'fk_256_user_user_id_enrolls')->references('id')->on('users');
            $table->integer('subject_id')->unsigned()->nullable();
            $table->foreign('subject_id', 'fk_256_subject_subject_id_enrolls')->references('id')->on('subjects');
            $table->integer('role_id')->unsigned()->nullable();
            $table->foreign('role_id', 'fk_253_role_role_id_enrolls')->references('id')->on('roles');
            $table->timestamps();
            $table->softDeletes();

            $table->index(['deleted_at']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('enrolls');
    }
}
