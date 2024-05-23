<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    
        Schema::create('cursos', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->double('value', 15, 2);
            $table->integer('vacancies');
            $table->date('registrations');
            $table->date('registrations_up_to');
            $table->string('description', 255);
            $table->boolean('is_active')->default(true);
            $table->string('image');
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
        Schema::dropIfExists('cursos');
    }
};
