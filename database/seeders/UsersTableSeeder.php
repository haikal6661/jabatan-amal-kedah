<?php
namespace Database\Seeders;

use App\Models\User;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::updateOrCreate([
            
            'kod_kawasans_id' => '1',
            'name' => 'Super Admin',
            'email' => 'haikal.ariff13@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('admin1234'),
            'created_at' => now(),
            'updated_at' => now()
        // DB::table('users')->insert([
        //     'name' => 'Admin Admin',
        //     'email' => 'admin@material.com',
        //     'email_verified_at' => now(),
        //     'password' => Hash::make('secret'),
        //     'created_at' => now(),
        //     'updated_at' => now()
        ]);
    }
}
