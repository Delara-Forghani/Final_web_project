<?php

use Illuminate\Database\Seeder;
use App\User;
class UsersTablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'دل آرا',
            'sirname'=>'فرقانی',
            'password' => Hash::make('salam'),
            'phone' => '3285745',
            'email' => 'delara@gmail.com',
            'user-role' => 'admin'
        ]);
    }
}
