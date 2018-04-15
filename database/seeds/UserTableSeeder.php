<?php

use App\Role;
use App\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_pat = Role::where('name', 'patient')->first();
        $role_pha  = Role::where('name', 'pharmacist')->first();
        $role_doc  = Role::where('name', 'doctor')->first();
        //
        $doctor = new User();
        $doctor->name = 'Dr. Shrikant';
        $doctor->email = 'shrikant@example.com';
        $doctor->password = bcrypt('secret');
        $doctor->save();
        $doctor->roles()->attach($role_doc);
        //
        $pharmacist = new User();
        $pharmacist->name = 'Shawan';
        $pharmacist->email = 'shawan@example.com';
        $pharmacist->password = bcrypt('secret');
        $pharmacist->save();
        $pharmacist->roles()->attach($role_pha);
        //
        $patient = new User();
        $patient->name = 'Raju';
        $patient->email = 'raju@example.com';
        $patient->password = bcrypt('secret');
        $patient->save();
        $patient->roles()->attach($role_pat);

        $patient = new User();
        $patient->name = 'Rohan Shah';
        $patient->email = 'rhshah123@gmail.com';
        $patient->password = bcrypt('rhshah123');
        $patient->save();
        $patient->roles()->attach($role_pat);
    }
}
