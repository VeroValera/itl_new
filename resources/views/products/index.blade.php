@extends('layouts.main')

@section('title', 'Products')

@section('content')
    <div class="container">
        <h1>Products</h1>

        <!-- Display Success Messages -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Table of Products -->
        <table class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Price</th>
                <th>Category</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>${{ $product->price }}</td>
                    <td>{{ $product->category ? $product->category->name : 'Uncategorized' }}</td>
                    <td>
                        <a href="{{ route('products.show', $product->id) }}" class="btn btn-info">View</a>
                        <a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary">Edit</a>
                        <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this product?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <!-- Link to Add New Product -->
        <a href="{{ route('products.create') }}" class="btn btn-success">Add New Product</a>
    </div>
@endsection