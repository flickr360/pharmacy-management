@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create Order</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('orders.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="supplier_id" class="form-label">Supplier</label>
            <select name="supplier_id" id="supplier_id" class="form-control" required>
                <option value="">Select Supplier</option>
                @foreach($suppliers as $supplier)
                    <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                @endforeach
            </select>
        </div>

        <div id="medicine-rows">
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="medicines[]" class="form-label">Medicine</label>
                    <select name="medicines[]" class="form-control" required>
                        <option value="">Select Medicine</option>
                        @foreach($medicines as $medicine)
                            <option value="{{ $medicine->id }}">{{ $medicine->medicine_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="quantities[]" class="form-label">Quantity</label>
                    <input type="number" name="quantities[]" class="form-control" required>
                </div>
                <div class="col-md-2">
                    <button type="button" class="btn btn-danger mt-4 remove-row">Remove</button>
                </div>
            </div>
        </div>

        <button type="button" id="add-medicine" class="btn btn-secondary mb-3">Add Medicine</button>

        <button type="submit" class="btn btn-primary">Submit Order</button>
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
