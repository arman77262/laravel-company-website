<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           Update Category <b></b>
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
                                <div class="card-header">Update Category</div>
                                <div class="card-body">
                                    <form action="{{url('category/update/'.$categories->id)}}" method="POST">
                                        @csrf
                                        <div class="form-group">
                                          <label for="exampleInputEmail1">Category Name</label>
                                          <input type="text" class="form-control" id="exampleInputEmail1" name="category_name" aria-describedby="emailHelp" value="{{$categories->category_name}}">

                                          @error('category_name')
                                            <span class="text-danger">{{$message}}</span>
                                          @enderror

                                        </div>

                                        <button type="submit" class="btn btn-primary">Update Category</button>
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
