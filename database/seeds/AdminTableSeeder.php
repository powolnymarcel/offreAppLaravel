<?php

use Illuminate\Database\Seeder;
use App\admin;
class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin= new admin();
        $admin->nom ='admin';
        $admin->password =bcrypt('test_pw');
        $admin->save();
    }
}
