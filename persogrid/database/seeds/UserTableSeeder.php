<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;
use Flynsarmy\CsvSeeder\CsvSeeder;

class UserTableSeeder extends CsvSeeder
{


    public function __construct()
    {
        $this->table = 'users';
        $this->csv_delimiter = ';';
        $this->filename = base_path() . '/database/seeds/csvs/Account.csv';
        $this->should_trim = true;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        $role_applicant = Role::where('name', 'applicant')->first();
//        $role_business  = Role::where('name', 'business')->first();
//        $role_applicantBlank = Role::where('name', 'applicantBlank')->first();
//        $role_businessBlank  = Role::where('name', 'businessBlank')->first();
//        $applicant = new User();
//        $applicant->firstname = 'TestBewerber';
//        $applicant->lastname = 'TestBewerber';
//        $applicant->email = 'applicant@example.com';
//        $applicant->password = bcrypt('secret');
//        $applicant->save();
//        $applicant->roles()->attach($role_applicant);
//        $business = new User();
//        $business->firstname = 'TestUnternehmen';
//        $business->lastname = 'TestUnternehmen';
//        $business->email = 'business@example.com';
//        $business->password = bcrypt('secret');
//        $business->save();
//        $business->roles()->attach($role_business);


        //DB::disableQueryLog();

        // Uncomment the below to wipe the table clean before populating
        DB::table($this->table)->truncate();

        parent::run();
    }
}
