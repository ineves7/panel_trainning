<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotificationConfigurationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notification_configurations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('type_id')->constrained('notification_types');
            $table->foreignId('user_id')->constrained('users');
            $table->boolean('email');
            $table->boolean('browser');
            $table->boolean('app');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notification_configurations');
    }
}
