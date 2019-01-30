<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsToQuestionsOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('questions_options', function (Blueprint $table) {
            $table->integer('question_id')->unsigned()->nullable();
            $table->foreign('question_id', 'fk_257_question_question_id_questions_option')->references('id')->on('questions');
            $table->string('option')->nullable();
            $table->tinyInteger('correct')->nullable()->default(0);
            
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
        Schema::table('questions_options', function (Blueprint $table) {
            //
        });
    }
}
