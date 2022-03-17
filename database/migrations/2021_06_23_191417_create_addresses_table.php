<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->string('description')->nullable();
            $table->string('street', 90)->nullable()->index();
            $table->text('complement')->nullable();
            $table->string('number')->default('0');
            $table->string('postal_code')->nullable();
            $table->string('neighborhood')->nullable();
            $table->foreignId('city_id')->constrained('cities');
            $table->softDeletes();
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
        Schema::dropIfExists('addresses');
    }
}
