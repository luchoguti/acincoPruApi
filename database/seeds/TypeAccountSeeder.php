<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB as DB;
use \Carbon\Carbon as Carbon;

class TypeAccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
        DB::table('type_accounts')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');

        DB::table ('type_accounts')->insert ([
            [
                'description_type_account'=>'Ahorros',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'description_type_account'=>'Corrriente',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]
        ]);
    }
}
