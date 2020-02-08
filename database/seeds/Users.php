<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;
class Users extends Seeder
{
    public function run()
    {
        $role_employee = Role::where('name', 'employee')->first();
        $role_manager  = Role::where('name', 'manager')->first();
        $employee = new User();
        $employee->name = 'Admin';
    $employee->email = 'admin@example.com';
    $employee->password = bcrypt('admin');
    $employee->save();
    $employee->roles()->attach($role_employee);
    $manager = new User();
    $manager->name = 'UsersTableSeeder';
    $manager->email = 'manager@example.com';
    $manager->password = bcrypt('secret');
    $manager->save();
    $manager->roles()->attach($role_manager);
  }
}