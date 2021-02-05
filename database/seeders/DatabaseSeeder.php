<?php

namespace Database\Seeders;

use App\Models\Faculty;
use App\Models\Study;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {        
        // User::create([
           
        //     'email' => 'superadmin@superadmin.com',
        //     'password' => bcrypt('password'),
        //     'akses'  => 'superadmin'
        // ]);

        // User::create([
        
        //     'email' => 'panitia@panitia.com',
        //     'password' => bcrypt('password'),
        //     'akses'  => 'panitia'
        // ]);

        // User::create([
           
        //     'email' => 'admin@admin.com',
        //     'password' => bcrypt('password'),
        //     'akses'  => 'admin'
        // ]);

        Faculty::create([
            'id'        => 1,
            'name' => 'SOSPOL',
          
        ]);
        Faculty::create([
            'id'        => 2,
         
            'name' => 'FAKULTAS ILMU KOMPUTER',
        ]);
        Faculty::create([
            'id'        => 3,
         
            'name' => 'FAKULTAS KEGURUAN DAN ILMU PENDIDIKAN',
        ]);
        Faculty::create([
            'id'        => 4,
          
            'name' => 'FAKULTAS PERTANIAN DAN PERIKANAN',
        ]);
        Faculty::create([
            'id'        => 5,
        
            'name' => 'FAKULTAS TEKNIK',
        ]);
        Faculty::create([
            'id'        => 6,
      
            'name' => 'FAKULTAS HUKUM',
        ]);
        Study::create([
            'faculty_id' => '2',
            'name' => 'INFORMATIKA',
          
        ]);
        Study::create([
            'faculty_id' => '2',
            'name' => 'SISTEM INFORMASI',
           
        ]);
        Study::create([
            'faculty_id' => '4',
            'name' => 'AGROTEKNOLOGI',
     
        ]);
        Study::create([
            'faculty_id' => '4',
            'name' => 'AKUAKULTUR',
   
        ]);
        Study::create([
            'faculty_id' => '6',
            'name' => 'ILMU HUKUM',
   
        ]);
        Study::create([
            'faculty_id' => '1',
            'name' => 'ILMU PEMERINTAHAN',
           
        ]);
        Study::create([
            'faculty_id' => '5',
            'name' => 'ARSITEKTUR',
       
        ]);
        Study::create([
            'faculty_id' => '5',
            'name' => 'TEKNIK SIPIL',
        ]);
        Study::create([
            'faculty_id' => '3',
            'name' => 'PENDIDIKAN BAHASA INGGRIS',
            
        ]);
        Study::create([
            'faculty_id' => '3',
            'name' => 'PENDIDIKAN MATEMATIKA',
           
        ]);
        Study::create([
            'faculty_id' => '3',
            'name' => 'PENDIDIKAN GURU SEKOLAH DASAR',
            
        ]);
        Study::create([
            'faculty_id' => '3',
            'name' => 'ADMINISTRASI PENDIDIKAN',
         
        ]);
        Study::create([
            'faculty_id' => '5',
            'name' => 'PERENCANAAN WILAYAH DAN KOTA',
            
        ]);
    }
}
