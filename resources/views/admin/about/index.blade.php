@extends('admin.admin_master')
@section('admin')
{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           All Brand <b></b>
           <b style="float: right">
                <span class="badge badge-danger">4</span>
            </b>
        </h2>
    </x-slot> --}}

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">



            <div class="container">

                <div class="row">
                    <div class="col-md-12">
                        <div class="card">

                        @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{session('success')}}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @endif

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card-header">About</div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card-header d-flex flex-row-reverse">
                                        <a href="{{route('add.about')}}" class=""><button class="btn btn-sm btn-info">Add About</button></a>
                                    </div>
                                </div>
                            </div>





                            <table class="table">
                                <thead>
                                    <tr>
                                    <th scope="col">Sl</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Short Description</th>
                                    <th scope="col">Long Description</th>
                                    <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php($i=1)
                                    @foreach ($homeabout as $about)
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>{{$about->title}}</td>
                                        <td style="width: 250px; text-align:justify;">{{$about->short_dis}}</td>
                                        <td style="width: 300px; text-align:justify;">{{$about->long_dis}}</td>

                                        {{-- <td>{{$item->name}}</td> --}}
                                       {{--  <td>
                                            @if ($slider->created_at == NULL)
                                            <span class="text-danger">Date Not Set</span>
                                            @else
                                            {{Carbon\Carbon::Parse($slider->created_at)->diffForHumans()}}
                                            @endif

                                        </td> --}}
                                        <td>
                                            <a href="{{url('about/edit/'.$about->id)}}" class="btn btn-sm btn-info">Edit</a>
                                            <a href="{{url('about/delete/'.$about->id)}}" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure to delete')">Delete</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                </table>
                               {{--  {{$brand->links()}} --}}
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>

{{-- </x-app-layout> --}}

@endsection




