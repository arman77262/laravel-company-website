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
                                    <div class="card-header">All Contact Message </div>
                                </div>
                            </div>


                            <table class="table">
                                <thead>
                                    <tr>
                                    <th scope="col">Sl</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Subject</th>
                                    <th scope="col">message</th>
                                    <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php($i=1)
                                    @foreach ($messages as $message)
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>{{$message->name}}</td>
                                        <td>{{$message->email}}</td>
                                        <td>{{$message->subject}}</td>
                                        <td>{{$message->message}}</td>

                                        {{-- <td>{{$item->name}}</td> --}}
                                       {{--  <td>
                                            @if ($slider->created_at == NULL)
                                            <span class="text-danger">Date Not Set</span>
                                            @else
                                            {{Carbon\Carbon::Parse($slider->created_at)->diffForHumans()}}
                                            @endif

                                        </td> --}}
                                        <td>
                                            <a href="{{url('message/delete/'.$message->id)}}" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure to delete')">Delete</a>
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




