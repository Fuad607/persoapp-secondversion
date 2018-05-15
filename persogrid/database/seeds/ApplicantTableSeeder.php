<?php

use Illuminate\Database\Seeder;
use Flynsarmy\CsvSeeder\CsvSeeder;

class ApplicantTableSeeder extends CsvSeeder
{


    public function __construct()
    {
        $this->table = 'applicants';
        $this->csv_delimiter = ';';
        $this->filename = base_path() . '/database/seeds/csvs/applicant.csv';
    }
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Uncomment the below to wipe the table clean before populating
        DB::table($this->table)->truncate();

        parent::run();
    }
}
