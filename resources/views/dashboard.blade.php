<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Painel de Controle - Nossa Confecção') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <!-- Grid de Resumo -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <!-- Card Clientes -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 border-l-4 border-indigo-500">
                    <div class="flex items-center">
                        <div class="p-3 bg-indigo-100 rounded-full text-indigo-600 mr-4 text-2xl">👥</div>
                        <div>
                            <p class="text-sm font-medium text-gray-600 uppercase">Total de Clientes</p>
                            <p class="text-2xl font-bold text-gray-900">{{ \App\Models\Cliente::count() }}</p>
                        </div>
                    </div>
                    <a href="{{ route('clientes.index') }}" class="block mt-4 text-xs text-indigo-600 font-bold hover:underline">Ver todos →</a>
                </div>

                <!-- Card Placeholder para Pedidos/Produtos -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 border-l-4 border-green-500">
                    <div class="flex items-center">
                        <div class="p-3 bg-green-100 rounded-full text-green-600 mr-4 text-2xl">🧵</div>
                        <div>
                            <p class="text-sm font-medium text-gray-600 uppercase">Peças em Produção</p>
                            <p class="text-2xl font-bold text-gray-900">0</p>
                        </div>
                    </div>
                    <p class="mt-4 text-xs text-gray-400 italic">Módulo em breve</p>
                </div>

                <!-- Card Placeholder para Financeiro -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 border-l-4 border-yellow-500">
                    <div class="flex items-center">
                        <div class="p-3 bg-yellow-100 rounded-full text-yellow-600 mr-4 text-2xl">💰</div>
                        <div>
                            <p class="text-sm font-medium text-gray-600 uppercase">Faturamento Mensal</p>
                            <p class="text-2xl font-bold text-gray-900">R$ 0,00</p>
                        </div>
                    </div>
                    <p class="mt-4 text-xs text-gray-400 italic">Módulo em breve</p>
                </div>
            </div>

            <!-- Bem-vindo e Atalhos Rápidos -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-8">
                <h3 class="text-lg font-bold text-gray-800 mb-4">Bem-vindo, {{ Auth::user()->name }}!</h3>
                <p class="text-gray-600 mb-6">O que você deseja fazer hoje?</p>
                
                <div class="flex flex-wrap gap-4">
                    <a href="{{ route('clientes.create') }}" class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded shadow transition">
                        + Cadastrar Novo Cliente
                    </a>
                    <button class="bg-gray-100 hover:bg-gray-200 text-gray-700 px-4 py-2 rounded shadow transition cursor-not-allowed">
                        Novo Pedido
                    </button>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
