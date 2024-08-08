<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Jurusan;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::create([
            'name' => 'Rheino',
            'email' => 'rheino.3223@gmail.com',
            'password' => 'Rheino'
        ]);

        
        Jurusan::create([
            'nama' => 'Teknik Konstruksi Property',
            'kode_jurusan' => 'TKP'
        ]);
        Jurusan::create([
            'nama' => 'Desain Pemodelan Informasi Bangungan',
            'kode_jurusan' => 'DPIB'
        ]);
        Jurusan::create([
            'nama' => 'Teknik Instalasi Tenaga Listrik',
            'kode_jurusan' => 'TITL'
        ]);
        Jurusan::create([
            'nama' => 'Teknik Pendingin Tata Udara',
            'kode_jurusan' => 'TPTU'
        ]);
        Jurusan::create([
            'nama' => 'Teknik Audio Video',
            'kode_jurusan' => 'TAV'
        ]);
        Jurusan::create([
            'nama' => 'Teknik Kendaraan Ringan',
            'kode_jurusan' => 'TKR'
        ]);
        Jurusan::create([
            'nama' => 'Teknik Sepeda Motor',
            'kode_jurusan' => 'TSM'
        ]);
        Jurusan::create([
            'nama' => 'Teknik Mesin',
            'kode_jurusan' => 'TM'
        ]);
        Jurusan::create([
            'nama' => 'Teknik Komputer Jaringan',
            'kode_jurusan' => 'TKJ'
        ]);
        Jurusan::create([
            'nama' => 'Rekayasa Perangkat Lunak',
            'kode_jurusan' => 'RPL'
        ]);
        Jurusan::create([
            'nama' => 'Desain Komunikasi Visual',
            'kode_jurusan' => 'DKV'
        ]);

        Jurusan::create([
                'nama' => 'Teknik Perfilman',
                'kode_jurusan' => 'PRF'
        ]);
    }
}
