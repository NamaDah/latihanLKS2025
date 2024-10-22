@extends('admin.master')

@section('title')
    <title>Edit Page</title>
@endsection

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Edit Page</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="/product">Product</a></div>
                <div class="breadcrumb-item">Form</div>
            </div>

        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                    <div class="card">
                        <div class="card-header">
                            <h4>Add Page</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('product.update', $product->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('POST')
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered">
                                        <tr>
                                            <td>Name</td>
                                            <td><input type="text" value="{{ $product->name }}" name="name"
                                                    class="form-control" id="">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Price</td>
                                            <td><input type="text" value="{{ $product->price }}" name="price"
                                                    class="form-control"></td>
                                        </tr>
                                        <tr>
                                        <tr>
                                            <td>Description</td>
                                            <td><input type="text" value="{{ $product->description }}" name="description"
                                                    class="form-control"></td>
                                        </tr>
                                        <tr>
                                            <td>Image</td>
                                            <td>

                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="customFile"
                                                        name="image">
                                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                                </div>

                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Category</td>
                                            <td> <select name="category_id" id="" class="form-select-md">
                                                    @foreach ($categories as $category)
                                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                        </tr>
                                        <td>&nbsp</td>
                                        <td><button class="btn btn-primary">Save</button></td>
                                        </tr>
                                    </table>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
