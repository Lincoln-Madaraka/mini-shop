<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('salaries', function (Blueprint $table) {
            $table->decimal('gross_product', 10, 2)->after('amount');
            $table->decimal('shif', 10, 2)->after('gross_product');
            $table->decimal('housing_levy', 10, 2)->after('shif');
            $table->decimal('paye', 10, 2)->after('housing_levy');
            $table->decimal('net_product', 10, 2)->after('paye');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('salaries', function (Blueprint $table) {
            $table->dropColumn(['gross_product', 'shif', 'housing_levy', 'paye', 'net_product']);
        });
    }
};
