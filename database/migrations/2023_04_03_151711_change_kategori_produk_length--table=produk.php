<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        schema::table('produk', function(Blueprint $table) {
            $table->string('kategori_produk', 150)->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        schema::table('produk',function (Blueprint $table) {
            $table->string('kategori_produk', 100)->change();
        });
    }
};
