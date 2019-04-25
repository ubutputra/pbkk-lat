<?php

use Illuminate\Database\Seeder;
use App\dosen;
use Faker\Factory as Faker;

use App\Quotation;
class MhsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
     
        // $dosen = DB::select(DB::raw("select nip from dosens") );
        $dosen = DB::table('dosens')->pluck('nip');
        $faker = Faker::create('id_ID');
        $saveNRP = 5116100000;
        for ($i=1; $i < 100; $i++) { 
           
            DB::table('mhs')->insert([
               'nrp' => $saveNRP,
               'nama' => $faker->name,
               'nipdosenwali' => $faker->randomElement($dosen)
               
           ]);
               $saveNRP += 1;
            }
    }
}
