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
       Schema::create('pedidos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // clave foránea
            $table->string('producto');
            $table->integer('cantidad');
            $table->decimal('total', 8, 2);
            $table->timestamps();

            // Definir la relación
            $table->foreign('user_id')
                ->references('id')
                ->on('users') // <-- cambia aquí si tu tabla es 'usuarios'
                ->onDelete('cascade');
});

    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pedidos');
    }
};
