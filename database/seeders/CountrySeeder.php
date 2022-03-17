<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        $filePath = database_path('seeders/raw/countries.sql');
        if(File::exists($filePath)){
            DB::unprepared(file_get_contents($filePath));
            $this->command->info('Contries Table Seed');
        }
    }
}
