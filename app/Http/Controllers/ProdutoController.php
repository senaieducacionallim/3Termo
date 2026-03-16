<?php

namespace App\Http\Controllers;

use App\Models\Produto; // Certifique-se de ter o Model Produto criado
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    /**
     * Lista todos os produtos.
     */
    public function index()
    {
        $produtos = Produto::all();
        return view('produtos.index', compact('produtos'));
    }

    /**
     * Exibe o formulário de criação.
     */
    public function create()
    {
        return view('produtos.create');
    }

    /**
     * Salva um novo produto no banco.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nome'      => 'required|string|max:255',
            'preco'     => 'required|numeric',
            'categoria' => 'required|string',
            'sku'       => 'required|string|unique:produtos,sku',
        ]);

        Produto::create($request->all());

        return redirect()->route('produtos.index')
                         ->with('success', 'Produto cadastrado com sucesso!');
    }

    /**
     * Exibe o formulário de edição.
     */
    public function edit(string $id)
    {
        $produto = Produto::findOrFail($id);
        return view('produtos.edit', compact('produto'));
    }

    /**
     * Atualiza os dados do produto.
     */
    public function update(Request $request, string $id)
    {
        $produto = Produto::findOrFail($id);

        $request->validate([
            'nome'      => 'required|string|max:255',
            'preco'     => 'required|numeric',
            'categoria' => 'required|string',
            'sku'       => 'required|string|unique:produtos,sku,' . $id,
        ]);

        $produto->update($request->all());

        return redirect()->route('produtos.index')
                         ->with('success', 'Produto atualizado com sucesso!');
    }

    /**
     * Remove o produto.
     */
    public function destroy(string $id)
    {
        $produto = Produto::findOrFail($id);
        $produto->delete();

        return redirect()->route('produtos.index')
                         ->with('success', 'Produto excluído com sucesso!');
    }
}
