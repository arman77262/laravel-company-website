<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           Multi Images <b></b>
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
                        <div class="card-group">
                            @foreach ($images as $multi)
                                <div class="col-md-4 mt-5">
                                    <div class="card">
                                        <img src="{{asset($multi->image)}}" alt="">
                                    </div>
                                </div>
                            @endforeach
                        </div>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
</x-app-layout>
