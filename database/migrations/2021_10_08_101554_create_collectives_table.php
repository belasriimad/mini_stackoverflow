<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCollectivesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('collectives', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrainted();
            $table->foreignId('category_id')->constrained();
            $table->string('title');
            $table->string('slug');
            $table->text('description');
            $table->softDeletes();
            $table->integer('members')->default(0);
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
        Schema::dropIfExists('collectives');
    }
}
