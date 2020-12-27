@extends('admin.admin_master')
@section('admin')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">



        <div class="container">

            <div class="row">

                <div class="col-md-8">

                    <div class="table">

                        @php
                            $singleimg = DB::table('multipics')->first();
                        @endphp

                        <input type="hidden" name="old_image" value="{{$singleimg->image}}" class="form-control">

                        <table>
                            <tr>
                                <th>Sl</th>
                                <th style="width: 300px">Images</th>
                                <th>Action</th>
                            </tr>
                            @php
                                $i = 1
                            @endphp
                            @foreach ($images as $multi)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>
                                    <img style="width: 200px" src="{{asset($multi->image)}}" alt="">
                                </td>
                                <td>
                                    <a href="{{url('multipic/delete/'.$multi->id)}}" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure to delete')">Delete</a>
                                </td>
                            </tr>
                            @endforeach

                        </table>
                    </div>

                    {{-- <div class="card-group">
                        @foreach ($images as $multi)
                            <div class="col-md-4 mt-5">
                                <div class="card">
                                    <img src="{{asset($multi->image)}}" alt="">
                                </div>
                            </div>
                        @endforeach
                    </div> --}}
                </div>

                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">Multi Images</div>
                        <div class="card-body">
                            <form action="{{route('store.images')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Multi Photo</label>
                                    <input type="file" id="exampleInputEmail1" name="images[]" aria-describedby="emailHelp" multiple="">

                                    @error('images')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror

                                </div>

                                <button type="submit" class="btn btn-primary">Add Images</button>
                                </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>
@endsection



