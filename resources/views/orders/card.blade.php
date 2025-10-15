<div class="card mb-3" id="order-{{ $order->id }}">
    <div class="card-body">
        <h5 class="card-title">{{ $order->customer_name }}</h5>
        <p class="card-text mb-1">
            <strong>Data do pedido:</strong> {{ \Carbon\Carbon::parse($order->order_date)->format('d/m/Y') }}<br>
            <strong>Data de entrega:</strong> {{ $order->delivered_at ? \Carbon\Carbon::parse($order->delivered_at)->format('d/m/Y') : '-' }}<br>
            <strong>Status:</strong>
            <span class="badge bg-{{ $order->status == 'entregue' ? 'success' : ($order->status == 'pendente' ? 'warning' : 'danger') }}">
                {{ ucfirst($order->status) }}
            </span>
        </p>

        <div class="text-end d-flex justify-content-end gap-2">
            <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#updateOrderModal-{{ $order->id }}">
                Atualizar
            </button>

            <form method="POST" action="{{ route('order.delete', $order->id) }}">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-sm btn-danger">Deletar</button>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="updateOrderModal-{{ $order->id }}" tabindex="-1" aria-labelledby="updateOrderLabel-{{ $order->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('order.update', $order->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h5 class="modal-title" id="updateOrderLabel-{{ $order->id }}">Atualizar Pedido</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="customer_name-{{ $order->id }}" class="form-label">Nome do cliente</label>
                        <input type="text" name="customer_name" id="customer_name-{{ $order->id }}" class="form-control" value="{{ $order->customer_name }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="order_date-{{ $order->id }}" class="form-label">Data do pedido</label>
                        <input type="date" name="order_date" id="order_date-{{ $order->id }}" class="form-control" value="{{ \Carbon\Carbon::parse($order->order_date)->format('Y-m-d') }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="delivered_at-{{ $order->id }}" class="form-label">Data de entrega</label>
                        <input type="date" name="delivered_at" id="delivered_at-{{ $order->id }}" class="form-control" value="{{ $order->delivered_at ? \Carbon\Carbon::parse($order->delivered_at)->format('Y-m-d') : '' }}">
                    </div>

                    <div class="mb-3">
                        <label for="status-{{ $order->id }}" class="form-label">Status</label>
                        <select name="status" id="status-{{ $order->id }}" class="form-select" required>
                            <option value="pendente" {{ $order->status == 'pendente' ? 'selected' : '' }}>Pendente</option>
                            <option value="entregue" {{ $order->status == 'entregue' ? 'selected' : '' }}>Entregue</option>
                            <option value="cancelado" {{ $order->status == 'cancelado' ? 'selected' : '' }}>Cancelado</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-primary">Salvar alterações</button>
                </div>
            </form>
        </div>
    </div>
</div>