<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\reservation_session;
use App\Models\setting;
use App\Models\allow_day;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
    
    $permissionUsers = Permission::create([
        'name' => 'userRole',
    ]);
    
    $permissionRegistration = Permission::create([
        'name' => 'registration',
    ]);
    
    $permissionCheckin = Permission::create([
        'name' => 'checkin',
    ]);
    
    $permissionFeedback = Permission::create([
        'name' => 'feedback',
    ]);
    
    $permissionSetting = Permission::create([
        'name' => 'setting',
    ]);

    $superAdminRole = Role::create([
        'name' => 'super Admin',
    ]);

    $AdminRole = Role::create([
        'name' => 'Admin',
    ]);

    $superAdminRole->givePermissionTo($permissionUsers);
    $superAdminRole->givePermissionTo($permissionRegistration);
    $superAdminRole->givePermissionTo($permissionCheckin);
    $superAdminRole->givePermissionTo($permissionFeedback);
    $superAdminRole->givePermissionTo($permissionSetting);
    
    $AdminRole->givePermissionTo($permissionCheckin);
    $AdminRole->givePermissionTo($permissionFeedback);
    $AdminRole->givePermissionTo($permissionSetting);
    $AdminRole->givePermissionTo($permissionRegistration);

    allow_day::create([
        'allow_days' => 2,
    ]);

    allow_day::create([
        'allow_days' => 4,
    ]);

    setting::create([
        'kuota' => 20,
        'date_interval' => 10,
    ]);

    reservation_session::create([
        'session_name' => 'sesi 1',
        'start_time' => '09:00',
        'end_time'=> '11:00',
    ]);

    reservation_session::create([
        'session_name' => 'sesi 2',
        'start_time' => '15:00',
        'end_time'=> '17:00',
    ]);
           
    $superAdmin = User::create([
        'name' => 'admin1',
        'password' => bcrypt('123'),
     ]);
 
    $admin1 = User::create([
         'name' => 'admin2',
         'password' => bcrypt('123'),
     ]);
 
    $admin2 = User::create([
         'name' => 'admin3',
         'password' => bcrypt('123'),
     ]);
 
    $admin3 = User::create([
         'name' => 'admin4',
         'password' => bcrypt('123'),
     ]);
 
    $admin4 =User::create([
         'name' => 'admin5',
         'password' => bcrypt('123'),
     ]);

     $superAdmin->assignRole($superAdminRole);
     $admin1->assignRole($AdminRole);
     $admin2->assignRole($AdminRole);
     $admin3->assignRole($AdminRole);
     $admin4->assignRole($AdminRole);
    }
}
