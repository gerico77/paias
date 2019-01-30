<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ProfessorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('professors', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email');
            $table->timestamps('joing_date');
            $table->string('password')->nullable();
            $table->string('designation');
            $table->string('department_id');
            $table->string('gender');
            $table->integer('role_id')->unsigned()->nullable();
            $table->foreign('role_id', 'fk_253_role_role_id_user')->references('id')->on('roles');
            $table->string('remember_token')->nullable();

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
        Schema::dropIfExists('professors');
    }
}
