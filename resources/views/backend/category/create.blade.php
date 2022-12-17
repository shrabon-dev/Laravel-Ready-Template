@extends('layouts.masterdashboard')
@section('dashboard_body')
<div class="border-bottom-2 py-32pt position-relative z-1">
    <div class="container-fluid page__container d-flex flex-column flex-md-row align-items-center text-center text-sm-left">
        <div class="flex d-flex flex-column flex-sm-row align-items-center mb-24pt mb-md-0">
            <div class="mb-24pt mb-sm-0 mr-sm-24pt">
                <h2 class="mb-0">Category</h2>
                <ol class="breadcrumb p-0 m-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active">
                        Category create
                    </li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="container">
<div class="row mt-32pt py-32pt">
    <div class="col-lg-8 d-flex align-items-center">
        <div class="flex" style="max-width: 100%">
            <form action="{{ route('category.store') }}" method="post">
                @csrf
                    <div class="form-group">
                        <label class="form-label" for="exampleInputEmail1">Category Name:</label>
                        <input type="text" name="category_name" class="form-control" placeholder="Enter your email address ..">
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="exampleInputPassword1">Category slug:</label>
                        <input type="text" name="category_slug" class="form-control"  placeholder="Enter your password ..">
                    </div>
                    <button type="submit" class="btn btn-primary">Create </button>
            </form>
        </div>
    </div>
</div>
</div>
@endsection

