<?php

use Illuminate\Database\Seeder;
use App\Admin;
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
        $user = [
            [
               'name'=>'k',
               'email'=>'k@gmail.com',
                'is_supper'=>'1',
               'password'=> bcrypt('123456'),
            ],
        ];
        foreach ($user as $key => $value) {
            Admin::create($value);
        }
    }
}
