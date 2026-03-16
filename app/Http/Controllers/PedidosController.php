<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use Illuminate\Http\Request;

class PedidoController extends Controller
{
    // Lista todos os pedidos (Geralmente paginados)
    public function index()
    {
        $pedidos = Pedido::with('user')->latest()->paginate(10);
        return view('pedidos.index', compact('pedidos'));
    }

    // Exibe o formulário de criação (se necessário)
    public function create()
    {
        return view('pedidos.create');
    }

    // Salva o novo pedido no banco
    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'total'   => 'required|numeric',
            // Adicione outras validações aqui
        ]);

        Pedido::create($validated);

        return redirect()->route('pedidos.index')
                         ->with('success', 'Pedido criado com sucesso!');
    }

    // Mostra um pedido específico
    public function show(Pedido $pedido)
    {
        // Se tiver itens, use: $pedido->load('items.produto');
        return view('pedidos.show', compact('pedido'));
    }

    // Atualiza o status ou dados do pedido
    public function update(Request $request, Pedido $pedido)
    {
        $pedido->update($request->all());
        return redirect()->back()->with('success', 'Pedido atualizado!');
    }

    // Remove (ou faz soft delete) o pedido
    public function destroy(Pedido $pedido)
    {
        $pedido->delete();
        return redirect()->route('pedidos.index')->with('warning', 'Pedido excluído.');
    }
}
