@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Order</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="/orders/{{ $order->id }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="supplier_id" class="form-label">Supplier</label>
            <select name="supplier_id" id="supplier_id" class="form-control" required>
                <option value="">Select Supplier</option>
                @foreach($suppliers as $supplier)
                    <option value="{{ $supplier->id }}" {{ $order->supplier_id == $supplier->id ? 'selected' : '' }}>
                        {{ $supplier->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div id="medicine-rows">
            @foreach($order->medicines as $medicine)
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="medicines[]" class="form-label">Medicine</label>
                        <select name="medicines[]" class="form-control" required>
                            <option value="">Select Medicine</option>
                            @foreach($medicines as $m)
                                <option value="{{ $m->id }}" {{ $medicine->id == $m->id ? 'selected' : '' }}>
                                    {{ $m->medicine_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="quantities[]" class="form-label">Quantity</label>
                        <input type="number" name="quantities[]" class="form-control" value="{{ $medicine->pivot->quantity }}" required>
                    </div>
                    <div class="col-md-2">
                        <button type="button" class="btn btn-danger mt-4 remove-row">Remove</button>
                    </div>
                </div>
            @endforeach
        </div>

        <button type="button" id="add-medicine" class="btn btn-secondary mb-3">Add Medicine</button>
        <button type="submit" class="btn btn-primary">Update Order</button>
    </form>
</div>

<script>
document.getElementById('add-medicine').addEventListener('click', function() {
    const row = document.querySelector('.row.mb-3').cloneNode(true);
    document.getElementById('medicine-rows').appendChild(row);
    row.querySelector('input').value = '';
    row.querySelector('select').value = '';
});

document.addEventListener('click', function(event) {
    if (event.target.classList.contains('remove-row')) {
        event.target.closest('.row.mb-3').remove();
    }
});
</script>
@endsection
