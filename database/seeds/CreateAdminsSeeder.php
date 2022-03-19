<?php

use Illuminate\Database\Seeder;

use App\Admin;

class CreateAdminsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name' => 'Admin 1',
                'email' => 'admin@ulula.com',
                'password' => bcrypt('123456')
            ],
            [
                'name' => 'Admin2',
                'email' => 'admin2@ulula.com',
                'password' => bcrypt('123456')
            ]
        ];

        foreach($users as $key => $value) {
            Admin::create($value);
        }
    }
}
