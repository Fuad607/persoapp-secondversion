<?php

use Illuminate\Database\Seeder;
use Flynsarmy\CsvSeeder\CsvSeeder;

class UserRoleTableSeeder extends CsvSeeder
{

    public function __construct()
    {
        $this->table = 'role_user';
        $this->csv_delimiter = ';';
        $this->filename = base_path() . '/database/seeds/csvs/role_user.csv';
        $this->should_trim = true;
    }
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table($this->table)->truncate();

        parent::run();
    }
}
