<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB as DB;
use \Carbon\Carbon as Carbon;

class BankSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
        DB::table('banks')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');

        DB::table ('banks')->insert ([
            [
                'id_banks'=> \Faker\Provider\Uuid::uuid (),
                'name_bank' => 'Banco de Bogota',
                'nit' => \Illuminate\Support\Str::random ('9'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id_banks'=> \Faker\Provider\Uuid::uuid (),
                'name_bank' => 'Bancolombia',
                'nit' => \Illuminate\Support\Str::random ('9'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id_banks'=> \Faker\Provider\Uuid::uuid (),
                'name_bank' => 'Banco Davivienda',
                'nit' => \Illuminate\Support\Str::random ('9'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id_banks'=> \Faker\Provider\Uuid::uuid (),
                'name_bank' => 'Banco de Occident',
                'nit' => \Illuminate\Support\Str::random ('9'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id_banks'=> \Faker\Provider\Uuid::uuid (),
                'name_bank' => 'BBVA Colombia',
                'nit' => \Illuminate\Support\Str::random ('9'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id_banks'=> \Faker\Provider\Uuid::uuid (),
                'name_bank' => 'Banco GNB Sudameris',
                'nit' => \Illuminate\Support\Str::random ('9'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id_banks'=> \Faker\Provider\Uuid::uuid (),
                'name_bank' => 'Citibank Colombia',
                'nit' => \Illuminate\Support\Str::random ('9'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id_banks'=> \Faker\Provider\Uuid::uuid (),
                'name_bank' => 'Banco Davivienda',
                'nit' => \Illuminate\Support\Str::random ('9'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id_banks'=> \Faker\Provider\Uuid::uuid (),
                'name_bank' => 'Rappi',
                'nit' => \Illuminate\Support\Str::random ('9'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id_banks'=> \Faker\Provider\Uuid::uuid (),
                'name_bank' => 'Nequi',
                'nit' => \Illuminate\Support\Str::random ('9'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
        ]);
    }
}
