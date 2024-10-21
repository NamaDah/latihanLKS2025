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
            <div class="breadcrumb-item active"><a href="/category">Category</a></div>
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
                        <form action="{{route('category.update', $category->id)}}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered">
                                    <tr>
                                        <td>Name</td>
                                        <td><input type="text" value="{{ $category->name }}" name="name" class="form-control" id="">
                                        </td>
                                    </tr>
                                    <tr>
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
