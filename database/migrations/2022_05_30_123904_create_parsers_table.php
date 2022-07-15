<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parsers', function (Blueprint $table) {
            // $table->id();
            $table->string('id')->nullable()->default('');
            $table->string('mark')->nullable()->default('');
            $table->string('model')->nullable()->default('');
            $table->string('generation')->nullable()->default('');
            $table->string('year')->nullable()->default('');
            $table->string('run')->nullable()->default('');
            $table->string('color')->nullable()->default('');
            $table->string('body-type')->nullable()->default('');
            $table->string('engine-type')->nullable()->default('');
            $table->string('transmission')->nullable()->default('');
            $table->string('gear-type')->nullable()->default('');
            $table->string('generation_id')->nullable()->default('');  
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('parsers');
    }
}
