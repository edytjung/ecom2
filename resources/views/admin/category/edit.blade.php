@extends('admin.layouts.layout')
@section('admin_page_title', 'Edit Category')
@section('admin_layout')
    <h3>Edit Category -> {{ $category->category_name }}</h3>
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0 card-title">Create Category</h5>

        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger" role="alert">
                    @foreach ($errors->all() as $error)
                        <div class="alert-message">
                            {{ $error }}
                        </div>
                    @endforeach
                </div>
            @endif

            @if (session('message'))
                <div class="alert alert-success" role="alert">
                    {{ session('message') }}
                </div>
            @endif
            <form action="{{ route('update.category', $category->id) }}" method="POST">
                @csrf
                @method('PUT')
                <label class="mb-2 fw-bold" for="category_name">Give Name of Your Category</label>
                <input type="text" class="form-control" placeholder="Computer" name="category_name"
                    value="{{ $category->category_name }}">
                <button type="submit" class="mt-2 btn btn-primary w-100">Update Category</button>
            </form>
        </div>
    </div>
@endsection
