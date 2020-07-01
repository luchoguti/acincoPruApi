<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountToAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('account_to_accounts', function (Blueprint $table) {
            $table->increments('id_account_to_account');
            $table->char ('account_origin');
            $table->foreign('account_origin')->references('id_accounts')->on('accounts')->onDelete('cascade');
            $table->char ('account_association');
            $table->foreign('account_association')->references('id_accounts')->on('accounts')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('account_to_accounts');
    }
}
