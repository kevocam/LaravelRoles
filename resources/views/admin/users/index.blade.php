@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                     
                
                    <table class="table table-hover">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Correo</th>
                            <th scope="col">Acciones</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                              
                            <tr>
                              <th scope="row">{{$user->id }}</th>
                              <td>{{$user->name }}</td>
                              <td>{{$user->email}}</td>
                            <td>{{implode (',', $user->roles()->get()->pluck('name')->toArray())}}</td>
                             @can('admin-users')
                              <td>
                                
                                <a href="{{route('admin.users.edit', $user->id)}}" class="btn btn-sm btn-info">Editar</a>
                                @can('delete-users')
                              <form action="{{route('admin.users.destroy',$user)}}" class="float-left" method="POST">
                                @csrf
                                {{ method_field('delete')}}
                                    <button type="submit" class="btn btn-sm btn-warning">Borrar</button>
                                </form>
                                @endcan
                                

                              </td>
                              @endcan
                            </tr>
                        @endforeach  
                          
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
