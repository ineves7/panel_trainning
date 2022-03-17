<?php

use App\Models\Genre;
use App\Models\MatrialStatus;
use App\Models\Profession;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeopleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('people', function (Blueprint $table) {
            $table->id();
            $table->string('full_name')->index();
            $table->string('social_name')->nullable();
            $table->morphs('peopleable'); 
            $table->foreignId('genre')->nullable()->constrained('genres');
            $table->foreignId('matrial_status')->nullable()->constrained('matrial_statuses');
            $table->string('status')->default('active')->index();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('people');
    }
}
