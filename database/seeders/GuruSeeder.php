<?php

namespace Database\Seeders;

use App\Models\Guru;
use Illuminate\Database\Seeder;

class GuruSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $gurus = [
          
                [
                    'id' => 'ff46', // Generate unique ID
                    'nama' => 'Sri hayatul husna',
                    'deskripsi' => 'Mengajar untuk mata kuliah Matematika Diskrit,Pernah bekerja di Ali baba. .',
                    'tahunlahir' => 1997,
                    'category_id' => 1,
                    'lulusan' => 'Harvard',
                    'foto_sampul' => 'adi.jpg',

                ],
                [
                    'id' => 'ff58', // Generate unique ID
                    'nama' => '	Alde Alanda, S.Kom., M.T ',
                    'deskripsi' => 'Lahir pada tanggal 25 agustus 1988.pernah menempuh pendidikan Institut Teknologi Bnadung.Bekerja sebagai dosen di Politeknik Negeri Padang 
                    Dengan status PNS golongan III.C',
                    'tahunlahir' => 1985,
                    'category_id' => 2,
                    'lulusan' => 'MIT',
                    'foto_sampul' => 'alde.jpg',

                ],
                [
                    'id' => 'ff72', // Generate unique ID
                        'nama' => 'Aldo Erianda, S.ST., M.T',
                        'deskripsi' => 'Bekerja sebagai dosen di Politeknik Negeri Padang dengan pangat atau golongan III.b.
                        Menepuh pendidikan di Institut Teknologi Padang',
                        'tahunlahir' => 1980,
                        'category_id' => 1,
                        'lulusan' => 'Stanford',
                        'foto_sampul' => 'aldo.jpg',

                ],
                [
                    'id' => 'ff83', // Generate unique ID
                    'nama' => 'Alyani Atsarina, S.E.I., M.Si.',
                    'deskripsi' => 'Lahir dan besar di padang pada tanggal 24 januari 1992.
                    menegajar untuk mata kuliah akuntasi',
                    'tahunlahir' => 1992,
                    'category_id' => 1,
                    'lulusan' => 'Caltech',
                    'foto_sampul' => 'alyani.jpg',

                ],
                [
                    'id' => 'ff76', // Generate unique ID
                    'nama' => 'Cipto Prabowo, S.T., M.T',
                    'deskripsi' => 'Mengajar untuk mata kuliah Embbedded system .Menempuh pendidikan di Universitas Gajah Mada.
                    Pangkat dan golongan Penata/III.c',
                    'tahunlahir' => 1988,
                    'category_id' => 2,
                    'lulusan' => 'MIT',
                    'foto_sampul' => 'cipto.jpg',

                ],
                [
                    'id' => 'ff96', // Generate unique ID
                    'nama' => 'Yori Adi Atma, S.Pd., M.Kom',
                    'deskripsi' => 'Lahir di lima puluh kota pada tanggal 10 mei 1990.Meempuh pendidikan di Universitas Putra Indonesia',
                    'tahunlahir' => 1990,
                    'category_id' => 2,
                    'lulusan' => 'MIT',
                    'foto_sampul' => 'yori.jpg',

                ],
                [
                    'id' => 'ff86', // Generate unique ID
                    'nama' => 'Cipto Prabowo, S.T., M.T',
                    'deskripsi' => 'Mengajar untuk mata kuliah Embbedded system .Menempuh pendidikan di Universitas Gajah Mada.
                    Pangkat dan golongan Penata/III.c',
                    'tahunlahir' => 1988,
                    'category_id' => 2,
                    'lulusan' => 'MIT',
                    'foto_sampul' => 'cipto.jpg',

                ],
                [
                    'id' => 'ff84', // Generate unique ID
                    'nama' => 'Alyani Atsarina, S.E.I., M.Si.',
                    'deskripsi' => 'Lahir dan besar di padang pada tanggal 24 januari 1992.
                    menegajar untuk mata kuliah akuntasi',
                    'tahunlahir' => 1992,
                    'category_id' => 2,
                    'lulusan' => 'Caltech',
                    'foto_sampul' => 'alyani.jpg',

                ]
               
        
            ];
            

            foreach ($gurus as $guru) {
                Guru::create([
                    'id' => $guru['id'],
                    'nama' => $guru['nama'],
                    'deskripsi' => $guru['deskripsi'],
                    'tahunlahir' => $guru['tahunlahir'],
                    'category_id' => $guru['category_id'],
                    'lulusan' => $guru['lulusan'],
                    'foto_sampul' => $guru['foto_sampul'],
                ]);
            }
    }
}
