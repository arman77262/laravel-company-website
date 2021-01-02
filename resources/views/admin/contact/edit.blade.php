@extends('admin.admin_master')
@section('admin')


<div class="row">
    <div class="col-md-12">
        <div class="card card-default">

            {{-- @if (session('success'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                {{session('success')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            @endif --}}

            <div class="card-header card-header-border-bottom">
                <h2>Add Contact Form</h2>
            </div>
            <div class="card-body">
                <form action="{{url('update/contact/'.$edit->id)}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Contact Email</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" name="email" value="{{$edit->email}}">

                        @error('email')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Contact Phone</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" name="phone" value="{{$edit->phone}}">

                        @error('phone')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Contact Address</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="address">{{$edit->address}}</textarea>

                        @error('address')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="form-footer pt-4 pt-5 mt-4 border-top">
                        <button type="submit" class="btn btn-primary btn-default">Update Contact</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection

