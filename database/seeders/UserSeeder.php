<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Role::create([
            'name' => 'admin',
            'display_name' => 'Izin Admin',
        ]);

        $pengguna = Role::create([
            'name' => 'pengguna',
            'display_name' => 'Izin Pengguna',
        ]);

        $kasir = Role::create([
            'name' => 'kasir',
            'display_name' => 'Izin Kasir',
        ]);

        $userAdmin = new User();
        $userAdmin->name = 'Rifa Fauziah';
        $userAdmin->email = 'admin@gmail.com';
        $userAdmin->password = Hash::make('12345678');
        $userAdmin->save();
        $userAdmin->attachRole($admin);

        $userPengguna = new User();
        $userPengguna->name = 'Didin Samsudin';
        $userPengguna->email = 'didin@gmail.com';
        $userPengguna->password = Hash::make('12345678');
        $userPengguna->save();
        $userPengguna->attachRole($pengguna);

        $userKasir = new User();
        $userKasir->name = 'Jajang Samsudin';
        $userKasir->email = 'jajang@gmail.com';
        $userKasir->password = Hash::make('12345678');
        $userKasir->save();
        $userKasir->attachRole($kasir);

        $userKasirDua = new User();
        $userKasirDua->name = 'Siti Samsudin';
        $userKasirDua->email = 'siti@gmail.com';
        $userKasirDua->password = Hash::make('12345678');
        $userKasirDua->save();
        $userKasirDua->attachRole($kasir);

    }
}
