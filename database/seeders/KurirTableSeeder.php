<?php

namespace Database\Seeders;

use App\Models\Kurir;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class KurirTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        for ($i = 1; $i <= 50; $i++) {
            Kurir::insert([
                'nama' => $faker->name,
                'no_telepon' => $faker->phoneNumber,
                'wilayah_operasi' => $faker->city,
                'created_at' => now(),
            ]);
        }
    }
}
