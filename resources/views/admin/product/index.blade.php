@extends('admin.master')

@section('title')
    <title>Product Page</title>
@endsection

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Product Page</h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissable show fade">
                            <div class="allert-body">
                                <span>{{ 'success' }}</span>
                            </div>
                        </div>
                    @endif
                    <div class="card">
                        <div class="card-header">
                            <a href="{{ route('product.create') }}" class="btn btn-primary">Add Data</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Product Name</th>
                                            <th>Price</th>
                                            <th>Description</th>
                                            <th>Image</th>
                                            <th>Category</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($product as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->name }}</td>
                                                <td>{{ $item->price }}</td>
                                                <td>{{ $item->description }}</td>
                                                <td>
                                                    <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->name }}" width="100">
                                                </td>
                                                <td>{{ $item->category->name }}</td>
                                                <td>
                                                    <a href="{{ route('product.edit', $item->id) }}"
                                                       class="btn btn-warning">Edit</a>
                                                    <a href="{{ route('product.destroy', $item->id) }}"
                                                       class="btn btn-danger">Delete</a>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="7" class="text-center">No Data Available</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
