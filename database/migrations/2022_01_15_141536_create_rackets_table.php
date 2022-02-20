<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRacketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rackets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 100);            
            $table->integer('type_id')->unsigned(); 
            $table->unsignedBigInteger('user_id'); 
            $table->integer('weight_id')->unsigned();
            $table->integer('grip_id')->unsigned();
            $table->string('maker', 100);
            $table->string('body', 2000);
            $table->string('image_path')->nullable();
            $table->timestamps();
            $table->softDeletes();
            
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
        Schema::dropIfExists('rackets');
    }
}
