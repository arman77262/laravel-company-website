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
                <h2>Add Services Form</h2>
            </div>
            <div class="card-body">
                <form action="{{route('store.service')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Under Service</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" name="under_service" placeholder="Add Under Serives Text">

                        @error('under_service')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Icon Class</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" name="icon_class" placeholder="Add Icon Class">

                        @error('icon_class')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Titel</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" name="title" placeholder="Enter Services Title">

                        @error('title')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Short Decription</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="short_dis"></textarea>

                        @error('short_dis')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>


                    <div class="form-footer pt-4 pt-5 mt-4 border-top">
                        <button type="submit" class="btn btn-primary btn-default">Add Services</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection

