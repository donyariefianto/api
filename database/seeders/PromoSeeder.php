<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PromoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // data faker indonesia
        $faker = Faker::create('id_ID');
 
        // membuat data dummy sebanyak 10 record
        for($x = 1; $x <= 10; $x++){
 
        	// insert data dummy pegawai dengan faker
        	DB::table('promo')->insert([
        		'promo' => $faker->promo,
        		'gambar' => $faker->gambar,
                'exp_promo' => $faker->exp_promo,
                'diskon' => $faker->diskon,
                'valid' =>$faker->valid,
        	]);
 
        }
 
    }
}
