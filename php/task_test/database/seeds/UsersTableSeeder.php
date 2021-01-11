<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            // 'name' => Str::random(10),
            // 'email' => Str::random(10).'@gmail.com',
            // 'password' => Hash::make('password'),
            [
                'name' => 'user1',
                'email' => 'test@test.com',
                'password' => Hash::make('password123'),
            ],[
                'name' => 'あああ',
                'email' => 'test0001@test.com',
                'password' => Hash::make('password123'),
            ],[
                'name' => 'いいい',
                'email' => 'test0002@test.com',
                'password' => Hash::make('password123'),
            ]
        ]);
    }
}
