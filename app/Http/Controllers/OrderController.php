<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::all();

        return view('orders.index', compact('orders'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'customer_name' => ['required', 'string', 'max:255'],
            'order_date'    => ['required', 'date'],
            'delivered_at'  => ['nullable', 'date', 'after_or_equal:order_date'],
        ], [
            'customer_name.required' => 'O nome do cliente é obrigatório.',
            'order_date.required'    => 'A data do pedido é obrigatória.',
            'order_date.date'        => 'A data do pedido deve ser uma data válida.',
            'delivered_at.date'      => 'A data de entrega deve ser uma data válida.',
            'delivered_at.after_or_equal' => 'A data de entrega não pode ser anterior à data do pedido.',
        ]);

        $validated['status'] = 'pendente';

        Order::create($validated);

        return redirect()->route('order.index')->with('success', 'Pedido criado com sucesso');
    }

    public function delete(int $id)
    {
        $order = Order::find($id);

        if (!$order) {
            return redirect()->route('order.index')->with('error', 'Pedido não encontrado');
        }

        $order->delete();

        return redirect()->route('order.index')->with('success', 'Pedido deletado com sucesso');
    }

    public function update(Request $request, int $id)
    {
        $order = Order::findOrFail($id);

        $validated = $request->validate([
            'customer_name' => ['sometimes', 'required', 'string', 'max:255'],
            'order_date'    => ['sometimes', 'required', 'date'],
            'delivered_at'  => ['nullable', 'date', 'after_or_equal:order_date'],
            'status'        => ['sometimes', 'required', Rule::in(['pendente', 'entregue', 'cancelado'])],
        ], [
            'customer_name.required' => 'O nome do cliente é obrigatório.',
            'order_date.required'    => 'A data do pedido é obrigatória.',
            'order_date.date'        => 'A data do pedido deve ser uma data válida.',
            'delivered_at.date'      => 'A data de entrega deve ser uma data válida.',
            'delivered_at.after_or_equal' => 'A data de entrega não pode ser anterior à data do pedido.',
            'status.required'        => 'O status é obrigatório.',
            'status.in'              => 'O status deve ser um dos seguintes valores: pendente, entregue ou cancelado.',
        ]);

        $order->update($validated);

        return redirect()->route('order.index')->with('success', 'Pedido atualizado com sucesso');
    }
}