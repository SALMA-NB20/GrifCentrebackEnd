<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNameAndPriceToFormationsTable extends Migration
{
    public function up()
    {
        Schema::table('formations', function (Blueprint $table) {
            $table->string('name')->after('id');
            $table->decimal('price', 8, 2)->after('name');
        });
    }

    public function down()
    {
        Schema::table('formations', function (Blueprint $table) {
            $table->dropColumn(['name', 'price']);
        });
    }
}