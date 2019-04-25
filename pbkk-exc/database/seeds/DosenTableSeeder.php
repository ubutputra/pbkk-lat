<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
//use DB;
//use App\Quotation;
class DosenTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker = Faker::create('id_ID');
        $saveNIP = 511640001;
        for ($i=1; $i < 50; $i++) { 
           
         DB::table('dosens')->insert([
            'nip' => $saveNIP,
            'namadosen' => $faker->name,
            
        ]);
            $saveNIP += 1;
         }
    }
}
