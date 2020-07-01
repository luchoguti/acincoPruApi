<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB as DB;
use \Carbon\Carbon as Carbon;

class TypeDocumentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
        DB::table('type_documents')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');

        DB::table ('type_documents')->insert ([
            [
                'description_type_document'=>'Cedula',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'description_type_document'=>'Cedula de extranjeria',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'description_type_document'=>'Pasaporte',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]
        ]);
    }
}
