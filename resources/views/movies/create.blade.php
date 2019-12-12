@extends('layouts.template') 

@section('content')
    <form id="form" method="POST" action="/storeMovie">
        @csrf

        <div class="form-group">

            <label for="name">Titre</label>
            <input type="text" class="form-control" id="exampleFormControlTextarea1" name="name" rows="3" required>

            <label for="director">Réalisateur</label>
            <input type="text" class="form-control" id="exampleFormControlTextarea1" name="director" rows="3" required>

            <label for="duration">Durée</label>
            <input type="number" class="form-control" id="exampleFormControlTextarea1" name="duration" rows="3" required>

            <label for="Year">Année</label>
            <input type="number" class="form-control" id="exampleFormControlTextarea1" name="year" rows="3" required>


            <label for="genre_id">Genre</label>
            <select name="genre_id">
                @foreach ($genres as $genre)
                    <option value="{{ $genre->id }}">{{ $genre->name }}</option>
                @endforeach               
            </select>


        </div>
        <button type="submit" class="btn btn-primary">Envoyer</button>
    </form>
@endsection