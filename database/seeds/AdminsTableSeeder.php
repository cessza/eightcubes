<?php

use Illuminate\Database\Seeder;


class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('admins')->delete();
        $adminRecords = [
            ['id'=>1,
            'position'=>'Logistic Manager',
            'name'=>'admin',
            'type'=>'admin',
            'age'=>25,
            'email'=>'admins@admin.com',
            'contactNo'=>'09111111111',
            'password'=>'$2y$10$SFMCwwaXRt3/ktJal4XmoepjfdCW/RUVTylm5RcnB/CWkmxzwaL7m',
            'image'=>'',
            'status'=>1
            ],
            ['id'=>2,
            'position'=>'Sales Team',
            'name'=>'staff',
            'type'=>'subadmin',
            'age'=>20,
            'email'=>'staff@admin.com',
            'contactNo'=>'09111111111',
            'password'=>'$2y$10$SFMCwwaXRt3/ktJal4XmoepjfdCW/RUVTylm5RcnB/CWkmxzwaL7m',
            'image'=>'',
            'status'=>1
            ],
            ['id'=>3,
            'position'=>'Inventory Clerk',
            'name'=>'inventory',
            'type'=>'subadmin',
            'age'=>23,
            'email'=>'inventory@admin.com',
            'contactNo'=>'09111111111',
            'password'=>'$2y$10$SFMCwwaXRt3/ktJal4XmoepjfdCW/RUVTylm5RcnB/CWkmxzwaL7m',
            'image'=>'',
            'status'=>1
            ],
        ];

        DB::table('admins')->insert($adminRecords);
       /* foreach($adminRecords as $key => $record){
            \App\Admin::create($record);
        }*/
    }
}
