@extends('admin.layouts.layout')
@section('admin_page_title', 'Manage Category')
@section('admin_layout')
    <h3>Manage Category</h3>
    <div class="card flex-fill">
        <div class="card-header">
            <h5 class="mb-0 card-title">All Category</h5>
        </div>
        @if (session('message'))
            <div class="alert alert-success" role="alert">
                {{ session('message') }}
            </div>
        @endif
        <table class="table my-0 table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Cetegory Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <td>
                            {{ $category->id }}
                        </td>
                        <td>
                            {{ $category->category_name }}
                        </td>
                        <td>
                            <a class="btn btn-info" href="{{ route('show.category', $category->id) }}">Edit</a>
                            <form action="{{ route('delete.category', $category->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
