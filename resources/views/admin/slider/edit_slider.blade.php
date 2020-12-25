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
                <h2>Edit Slider Form</h2>
            </div>
            <div class="card-body">
                <form action="{{url('update/slider/'.$slider->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">

                        <input type="hidden" name="old_image" value="{{$slider->image}}" class="form-control">

                        <label for="exampleFormControlInput1">Titel</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" name="title" value="{{$slider->title}}">

                        @error('title')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Decription</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description">{{$slider->description}}</textarea>

                        @error('description')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlFile1">Slider Image</label>
                        <input type="file" class="form-control-file" id="exampleFormControlFile1" name="image">

                        <div>
                            <img src="{{asset($slider->image)}}" class="img-thumbnail" style="width: 200px" alt="">
                        </div>

                        @error('image')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-footer pt-4 pt-5 mt-4 border-top">
                        <button type="submit" class="btn btn-primary btn-default">Update Slider</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection

