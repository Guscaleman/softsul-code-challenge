<div class="card shadow-sm mb-4">
    <div class="card-header bg-primary text-white">Novo Pedido</div>
    <div class="card-body">
        <form action="{{ route('order.store') }}" method="POST" class="border p-3 bg-white rounded">
            @csrf
            <div class="mb-3">
                <label for="customer_name" class="form-label">Nome do cliente</label>
                <input type="text" name="customer_name" id="customer_name" class="form-control" value="{{ old('customer_name') }}" required>
            </div>

            <div class="mb-3">
                <label for="order_date" class="form-label">Data do pedido</label>
                <input type="date" name="order_date" id="order_date" class="form-control" value="{{ old('order_date') }}" required>
            </div>

            <div class="mb-3">
                <label for="delivered_at" class="form-label">Data de entrega (opcional)</label>
                <input type="date" name="delivered_at" id="delivered_at" class="form-control" value="{{ old('delivered_at') }}">
            </div>

            <button type="submit" class="btn btn-primary">Criar pedido</button>
        </form>
    </div>
</div>