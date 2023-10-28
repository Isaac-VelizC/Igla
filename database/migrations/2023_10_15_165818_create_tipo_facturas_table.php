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
        if (! Schema::hasTable('tipo_facturas')) {
            Schema::create('tipo_facturas', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->string('nombre');
                $table->text('descripcion')->nullable();
                $table->text('notas')->nullable();
                $table->string('icon')->nullable();
                $table->timestamps();
            });
        }

        if (Schema::hasTable('facturas')) {
            Schema::table('facturas', function (Blueprint $table) {
                $table->bigInteger('tipo_factura_id')->nullable()->after('id');
                $table->bigInteger('invoice_number')->nullable()->after('id');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tipo_facturas');
    }
};