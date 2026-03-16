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
            // Relaciona com a tabela users (ou clientes)
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            
            // Informações de valores
            $table->decimal('total', 10, 2)->default(0);
            $table->decimal('desconto', 10, 2)->default(0);
            
            // Status do pedido (ex: pendente, pago, enviado, cancelado)
            $table->string('status')->default('pendente');
            
            // Controle de entrega/logística
            $table->string('codigo_rastreio')->nullable();
            $table->text('observacoes')->nullable();
            
            $table->timestamps();
            $table->softDeletes(); // Opcional: para não excluir do banco permanentemente
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
