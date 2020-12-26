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
                <h2>Edit About Form</h2>
            </div>
            <div class="card-body">
                <form action="{{url('update/about/'.$editabout->id)}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Titel</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" name="title" value="{{$editabout->title}}">

                        @error('title')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Short Decription</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="short_dis">{{$editabout->short_dis}}</textarea>

                        @error('short_dis')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Long Decription</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="long_dis">{{$editabout->long_dis}}</textarea>

                        @error('long_dis')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="form-footer pt-4 pt-5 mt-4 border-top">
                        <button type="submit" class="btn btn-primary btn-default">Add About</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection

