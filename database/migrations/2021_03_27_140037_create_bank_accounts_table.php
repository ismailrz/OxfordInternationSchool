<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBankAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bank_accounts', function (Blueprint $table) {
            $table->id();
            $table->smallInteger('financial_organization_id')->unique();
            $table->bigInteger('store_id')->nullable();
            // $table->string('bank');
            $table->string('account_name');
            $table->string('account_no')->nullable();
            $table->string('branch')->nullable();
            $table->tinyInteger('account_type')->nullable();
            $table->string('swift_code')->nullable();
            $table->string('route_no')->nullable();
            $table->timestamps();
            $table->dateTime('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bank_accounts');
    }
}
