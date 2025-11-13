@extends('layouts.app')

@section('content')
    <h1>Dashboard</h1>
    <hr>

    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Total Products</div>
                <div class="card-body">
                    <h2 class="card-title">{{ $totalProducts }}</h2>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Total Inventory Value</div>
                <div class="card-body">
                    <h2 class="card-title">${{ number_format($totalInventoryValue, 2) }}</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-4">
        <h3>Products per Category</h3>
        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>Category</th>
                    <th>Product Count</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($productsPerCategory as $item)
                    <tr>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->product_count }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="2" class="text-center">No categories found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
