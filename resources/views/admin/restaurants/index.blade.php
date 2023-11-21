@extends('layouts.app')

@section('content')
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Address</th>
                    <th scope="col">Phone Number</th>
                    <th scope="col">Vat</th>
                </tr>
            </thead>
            <tbody>

                
                {{-- @forelse ($restaurants as $restaurant) --}}
                    <tr>
                        <th scope="row">{{ $restaurant->id }}</th>
                        <td>{{ $restaurant->name }}</td>
                        <td>{{ $restaurant->address}}</td>
                        <td>{{ $restaurant->phone_number }}</td>
                        <td>{{ $restaurant->vat }}</td> 


                        {{-- <td>
                            <a href="{{ route('admin.projects.show', $project) }}" class="mx-2">
                                <i class="fa-solid fa-eye"></i>
                            </a>
                        </td>
                        <td>
                            <a href="{{ route('admin.projects.edit', $project) }}" class="mx-2">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a>
                        </td>
                        <td>
                            <a href="javascript:void(0)" class="mx-2 text-danger" data-bs-toggle="modal"
                                data-bs-target="#deleteModal-{{ $project->id }}">
                                <i class="fa-solid
                                fa-trash"></i>
                            </a>
                        </td>  --}}
                    </tr>

                 {{-- @empty
                    <td colspan="6"><i>Non ci sono risultati</i></td> --}}
               {{-- @endforelse --}}
            </tbody>
        </table>
    </div>
@endsection
