<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\slider;
use App\Models\Competence;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        User::create(['name'=> 'Biro IT', 'email' => 'biroit@nusanipa.ac.id', 'status'=>'active','role'=>'superadmin','password'=>'admin']);
        User::create(['name'=> 'Admin Prodi', 'email' => 'prodi@nusanipa.ac.id', 'status'=>'active','role'=>'admin','password'=>'admin']);

        Competence::create(['type'=> 'Kopetensi', 'image' => 'assets/img/icon/teacher.svg', 'title'=>'Judul','description'=>'Deskripsi']);
    }
}
