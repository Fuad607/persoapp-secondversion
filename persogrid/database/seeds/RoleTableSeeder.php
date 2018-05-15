<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){


        $role_applicantBlank = new Role();
        $role_applicantBlank->name = 'applicantBlank';
        $role_applicantBlank->description = 'An uninitialized Applicant User';
        $role_applicantBlank->save();

        $role_applicant = new Role();
        $role_applicant->name = 'applicant';
        $role_applicant->description = 'A Applicant User';
        $role_applicant->save();

        $role_businessBlank = new Role();
        $role_businessBlank->name = 'businessBlank';
        $role_businessBlank->description = 'An uninitialized Business User';
        $role_businessBlank->save();

        $role_business = new Role();
        $role_business->name = 'business';
        $role_business->description = 'A Business User';
        $role_business->save();
    }
}
