<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
//        for($i=0;$i<=6348;$i++) {
//            $user = User::create([
//                'name' => $request->name,
//                'email' => $request->email,
//                'password' => Hash::make($request->password),
//            ]);
//        }

        $users = User::all();
        foreach ($users as $user) {
            $user->update(['rating' => random_int(0, 500) / 100]);
            $user->roles()->sync([1]);
        }
    }
}
