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
                        <div class="card">

                        @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{session('success')}}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @endif

                            <div class="card-header">All Brand</div>
                            <table class="table">
                                <thead>
                                    <tr>
                                    <th scope="col">Sl</th>
                                    <th scope="col">Brand Name</th>
                                    <th scope="col">Brand Photo</th>
                                    <th scope="col">Create At</th>
                                    <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- @php($i=1) --}}
                                    @foreach ($brand as $item)
                                    <tr>
                                        <td>{{$brand->firstItem()+$loop->index}}</td>
                                        <td>{{$item->brand_name}}</td>
                                        <td><img style="width: 50px" src="{{asset($item->brand_image)}}" alt=""></td>
                                        {{-- <td>{{$item->name}}</td> --}}
                                        <td>
                                            @if ($item->created_at == NULL)
                                            <span class="text-danger">Date Not Set</span>
                                            @else
                                            {{Carbon\Carbon::Parse($item->created_at)->diffForHumans()}}
                                            @endif

                                        </td>
                                        <td>
                                            <a href="{{url('brand/edit/'.$item->id)}}" class="btn btn-sm btn-info">Edit</a>
                                            <a href="{{url('brand/delete/'.$item->id)}}" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure to delete')">Delete</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                </table>
                                {{$brand->links()}}
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">Add Brand</div>
                            <div class="card-body">
                                <form action="{{route('store.brand')}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Brand Name</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" name="brand_name" aria-describedby="emailHelp">

                                        @error('brand_name')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror

                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Brand Photo</label>
                                        <input type="file" id="exampleInputEmail1" name="brand_image" aria-describedby="emailHelp">

                                        @error('brand_image')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror

                                    </div>

                                    <button type="submit" class="btn btn-primary">Add Brand</button>
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
