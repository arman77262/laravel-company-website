<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Hi.... <b>{{Auth::user()->name}}</b>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">Sl</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Create At</th>
                      </tr>
                    </thead>
                    <tbody>
                        @php($i = 1)
                        @foreach ($user as $users)
                        <tr>
                            <th scope="row">{{$i++}}</th>
                            <td>{{$users->name}}</td>
                            <td>{{$users->email}}</td>
                            <td>{{Carbon\Carbon::parse($users->created_at)->diffForHumans()}}</td>
                          </tr>
                        @endforeach
                    </tbody>
                  </table>
            </div>
        </div>
    </div>
</x-app-layout>
