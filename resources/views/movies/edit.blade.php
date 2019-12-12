@extends('layouts.template') 

@section('content')
    <form id="form" method="POST" action="{{route('updateMovie', $movie->id)}}">
        @csrf

        <div class="form-group">

            <label for="name">Titre</label>
            <input type="text" class="form-control" id="exampleFormControlTextarea1" name="name" rows="3" required value="{{$movie->name}}" placeholder="Titre">

            <label for="director">Réalisateur</label>
            <input type="text" class="form-control" id="exampleFormControlTextarea1" name="director" rows="3" required value="{{$movie->director}}" placeholder="Réalisateur">

            <label for="duration">Durée</label>
            <input type="number" class="form-control" id="exampleFormControlTextarea1" name="duration" rows="3" required value="{{$movie->duration}}" placeholder="Durée">

            <label for="Year">Année</label>
            <input type="number" class="form-control" id="exampleFormControlTextarea1" name="year" rows="3" required value="{{$movie->year}}" placeholder="Année>


            <label for="genre_id">Genre</label>
            <select name="genre_id">
                @foreach ($genres as $genre)
                    @if ($genre->name ==$movie->genre->name)
                        <option selected value="{{ $genre->id }}">{{ $genre->name }}</option>
                    @else
                        <option value="{{ $genre->id }}">{{ $genre->name }}</option>
                    @endif                  
                @endforeach               
            </select>


        </div>
        <button type="submit" class="btn btn-primary">Modifier</button>
    </form>
@endsection