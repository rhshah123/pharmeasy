<?php

use App\Role;
use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    $role_employee = new Role();
    $role_employee->name = 'patient';
    $role_employee->description = 'A Patient User';
    $role_employee->save();

    $role_manager = new Role();
    $role_manager->name = 'doctor';
    $role_manager->description = 'A Doctor User';
    $role_manager->save();

    $role_manager = new Role();
    $role_manager->name = 'pharmacist';
    $role_manager->description = 'A Pharmacist User';
    $role_manager->save();
    }
}
