<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // foreach (range(1, 10) as $index) {
        //     $role = '';
        //     if($index == 1){
        //         $role = 'SuperAdmin';
        //     }
        //     elseif($index == 2){
        //         $role = 'Admin';
        //     }
        //     elseif($index == 3){
        //         $role = 'Moderator';
        //     }
        //     elseif($index == 4){
        //         $role = 'Editor';
        //     }

        //     Brand::create([
        //         'brand_name_en' => Str::lower($role).'@gmail.com',
        //         'password' => Hash::make('123456789'),
        //         'role' => $role,
        //         'status' => 'Active',
        //         'email_verified_at' => Carbon::now()
        //     ]);

        //     AdminProfile::create([
        //         'email' => Str::lower($role).'@gmail.com',
        //         'role' => $role,
        //         'status' => 'Active',
        //         'name' => $role,
        //         'created_by' => 'Ibrahim'
        //     ]);
        // }
    }
}
