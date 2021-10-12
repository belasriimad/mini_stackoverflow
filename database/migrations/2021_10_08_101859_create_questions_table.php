<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrainted();
            $table->foreignId('category_id')->constrained();
            $table->unsignedBigInteger('collective_id')->nullable();
            $table->string('title');
            $table->string('slug');
            $table->text('body');
            $table->softDeletes();
            $table->integer('votes')->default(0);
            $table->foreign('collective_id')->references('id')
                ->on('collectives')->onDelete('cascade');
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
        Schema::dropIfExists('questions');
    }
}
