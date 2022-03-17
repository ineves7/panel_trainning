<?php

namespace Database\Seeders;

use App\Models\State;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class StateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        Model::unguard();

        $filePath = database_path('seeders/raw/states.sql');

        if(File::exists($filePath)){
            DB::unprepared(file_get_contents($filePath));
            $this->command->info('States Table Seed');
        }
    }
}
