<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           All Brand <b></b>
           <b style="float: right">
                <span class="badge badge-danger">4</span>
            </b>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">



            <div class="container">


                <div class="row">

                    <div class="col-md-8">

                        @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{session('success')}}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @endif

                        <div class="card">
                            <div class="card-header">Update Brand</div>
                            <div class="card-body">
                                <form action="{{url('update/brand/'.$brand->id)}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="old_image" value="{{$brand->brand_image}}" class="form-control">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Brand Name</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" name="brand_name" aria-describedby="emailHelp" value="{{$brand->brand_name}}">

                                        @error('brand_name')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror

                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Brand Photo</label>
                                        <div>
                                            <img class="img-thumbnail" style="width: 200px" src="{{asset($brand->brand_image)}}" alt="">
                                        </div>
                                        <input type="file" id="exampleInputEmail1" name="brand_image" aria-describedby="emailHelp" value="{{$brand->brand_image}}">

                                        @error('brand_image')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror

                                    </div>

                                    <button type="submit" class="btn btn-primary">Brand Update</button>
                                    </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
</x-app-layout>
