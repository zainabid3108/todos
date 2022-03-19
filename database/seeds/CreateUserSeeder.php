<?php

use Illuminate\Database\Seeder;
use App\User;

class CreateUserSeeder extends Seeder
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
                'name' => 'Zain Abid',
                'email' => 'zain@ulula.com',
                'password' => bcrypt('123456')
            ],
            [
                'name' => 'Kamal Rizvi',
                'email' => 'kamal@ulula.com',
                'password' => bcrypt('123456'),
                'is_admin' => 1
            ]
        ];

        foreach($users as $key => $value) {
            User::create($value);
        }
    }
}
