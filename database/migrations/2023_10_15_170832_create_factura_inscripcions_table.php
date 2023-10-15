<?php

use App\Models\Factura;
use App\Models\Inscripcion;
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
        Schema::create('factura_inscripcions', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('inscrito_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedInteger('factura_id')->references('id')->on('facturas')->onDelete('cascade');
            $table->unsignedBigInteger('pago_programado_id')->nullable();
        });

        /*foreach (Inscripcion::all() as $enrollment) {
            $invoices = Factura::whereId($enrollment->invoice_id);

            if ($invoices->count() > 0) {
                foreach ($invoices->get() as $invoice) {
                    $enrollment->invoices()->attach($invoice);
                }
            }
        }*/
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('factura_inscripcions');
    }
};
