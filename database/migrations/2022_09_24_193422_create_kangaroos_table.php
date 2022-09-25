<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Constants\Kangaroo;
class CreateKangaroosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kangaroos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->unsignedBigInteger('user_id'); // foreign key for owner
            $table->foreign('user_id')->references('id')
                ->on('users');
            $table->string('name', 255)
                ->unique();
            $table->integer('weight'); // grams
            $table->integer('height'); // millimeters
            $table->string('nickname', 255);
            $table->enum('gender', Kangaroo::GENDER);
            $table->string('color', 10)->nullable();
            $table->enum('friendliness', Kangaroo::FRIENDLINESS);
            $table->dateTime('birth_date');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kangaroos');
    }
}
