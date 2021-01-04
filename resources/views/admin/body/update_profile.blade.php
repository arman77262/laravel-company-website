@extends('admin.admin_master')
@section('admin')

<div class="card card-default">

    @if (session('error'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        {{session('error')}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if (session('success'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        {{session('success')}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card-header card-header-border-bottom">
        <h2>Update Profile</h2>
    </div>
    <div class="card-body">
        <form method="POST" action="{{route('update.user.profile')}}" class="form-pill">
            @csrf
            <div class="form-group">
                <label for="exampleFormControlInput3">User name</label>
                <input type="text" name="name" class="form-control" value="{{$user['name']}}">

            </div>
            <div class="form-group">
                <label for="exampleFormControlInput3">Email</label>
                <input type="email" name="email" class="form-control" value="{{$user['email']}}">

            </div>

            <button type="submit" class="btn btn-success btn-default">Update Profile</button>
        </form>
    </div>
</div>


@endsection
