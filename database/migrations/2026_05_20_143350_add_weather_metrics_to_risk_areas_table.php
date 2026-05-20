<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddWeatherMetricsToRiskAreasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('risk_areas', function (Blueprint $table) {
            // Adiciona as colunas permitindo valores nulos (para dados antigos que não tinham isso)
            $table->decimal('temperature', 5, 2)->nullable()->after('description');
            $table->decimal('precipitation_mm', 5, 2)->nullable()->after('temperature');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('risk_areas', function (Blueprint $table) {
            // Remove as colunas em caso de rollback (usando sintaxe tradicional de array)
            $table->dropColumn(array('temperature', 'precipitation_mm'));
        });
    }
}
