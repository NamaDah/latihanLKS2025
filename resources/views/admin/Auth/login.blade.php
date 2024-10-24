<x-app-layout title="Login">

    <x-slot name="heading">Login</x-slot>
    <form action="{{ route('login') }}" method="POST">
        @csrf
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <tr>
                    <td>Name</td>
                    <td><input type="text" value="{{ $product->name }}" name="name" class="form-control"
                            id="">
                    </td>
                </tr>
                <tr>
                    <td>Price</td>
                    <td><input type="text" value="{{ $product->price }}" name="price" class="form-control"></td>
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
                            <input type="file" class="custom-file-input" id="customFile" name="image">
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
</x-app-layout>
