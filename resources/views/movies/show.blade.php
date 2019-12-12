@extends('layouts.template') 

@section('content')
    <table class="table table-sm table-dark">
        <th scope="col">ID</th>
        <th scope="col">Titre</th>
        <th scope="col">Réalisateur</th>
        <th scope="col">Durée</th>
        <th scope="col">Année</th>
        <th scope="col">Genre</th>
        @if (Auth::check()) 
            @if (Auth::user()->role == 'administrator') 
                <div class="top-right links">
                        <th scope="col">Modifier</th>
                        <th scope="col">Supprimer</th>
                </div>
            @endif
        @endif
        
        @foreach($movies as $movie)
            <tr>
                <td>{{ $movie->id }}</td>
                <td>{{ $movie->name }}</td>
                <td>{{ $movie->director }}</td>
                <td>{{ $movie->duration }}</td>
                <td>{{ $movie->year }}</td>
                <td>{{ $movie->genre->name}}</td>
                @if (Auth::check())
                    @if (Auth::user()->role == 'administrator')                  
                        <div class="top-right links">
                            <td>
                                <form action="{{ route ('editMovie',$movie->id) }}" method="POST">
                                @csrf
                                    <button type="submit">Modifier</button>
                            </form>
                            </td>
                            <td>
                                <form action="{{ route ('deleteMovie',$movie->id) }}" method="POST">
                                @csrf
                                    <button type="submit">Supprimer</button>
                                </form>
                            </td>
                        </div>
                    @endif
                @endif                       
            </tr>
        @endforeach
    </table>
@endsection
