<?php

use Illuminate\Database\Seeder;
use App\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Role::truncate();

      Role::create(['name' => 'admin',
                    'slug' => 'admin'    ]);
      Role::create(['name' => 'supplier',
                    'slug' => 'supplier']);
      Role::create(['name' => 'manager',
                    'slug' => 'manager' ]);
      Role::create(['name' => 'user',
                    'slug' => 'user'    ]);
      //Role::create(['slug' => 'admin']);
      //Role::create(['slug' => 'supplier']);
      //Role::create(['slug' => 'manager']);
      //Role::create(['slug' => 'user']);
    }
}
