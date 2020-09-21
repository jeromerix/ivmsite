<?php

use Illuminate\Database\Seeder;
use App\Role;

class UsersRolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::Table('user_roles')->insert([

           // one like on one comment
           'user_id' => '1',
           'role_id' => '1',
        ],
          'user_id' => '2',
          'role_id' => '2',
       ],
          'user_id' => '3',
          'role_id' => '3',
        ],
          'user_id' => '4',
          'role_id' => '4',
       ]);
    }
}
