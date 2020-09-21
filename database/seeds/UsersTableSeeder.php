<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //User::truncate();
        DB::table('users')->insert([

        //$adminRole = Role::where('name', 'admin')->first();
        //$managerRole = Role::where('name', 'manager')->first();
        //$supplierRole = Role::where('name', 'supplier')->first();
        //$userRole = Role::where('name', 'user')->first();

        [
          'name' => 'Sandok',
          'email' => 'sandok@test.nl',
          'password' => Hash::make('sandoktest')
        ],

        [
          'name' => 'manager',
          'email' => 'sandok@auther.nl',
          'password' => Hash::make('password')
        ],

        [
          'name' => 'test',
          'email' => 'test@test.nl',
          'password' => Hash::make('password')
        ],
        [
          'name' => 'hoi',
          'email' => 'tester@test.nl',
          'password' => Hash::make('password')
        ]
        ]);
        //$admin->roles()->attach($adminRole);
        //$manager->roles()->attach($managerRole);
        //$supplier->roles()->attach($supplierRole);
        //$user->roles()->attach($userRole);
    }
}
