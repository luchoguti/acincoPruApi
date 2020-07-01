<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->uuid ('id_accounts')->primary();
            $table->bigInteger ('number_account');
            $table->string ('name_cardholder');
            $table->unsignedInteger('id_type_document');
            $table->foreign('id_type_document')->references('id_type_document')->on('type_documents')->onDelete('cascade');
            $table->string ('number_identification');
            $table->char ('banks');
            $table->foreign('banks')->references('id_banks')->on('banks')->onDelete('cascade');
            $table->unsignedBigInteger('type_account');
            $table->foreign('type_account')->references('id_type_account')->on('type_accounts')->onDelete('cascade');
            $table->char ('password_account');
            $table->timestamps();
            $table->softDeletes ();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('accounts');
    }
}
