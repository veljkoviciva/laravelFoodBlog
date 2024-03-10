@extends('layouts.mainLayout')

@section('content')
    {{-- <h1>{{$primer}}</h1> --}}
    {{-- <h1>Index strana recepata</h1> --}}
    <br>
    
    @if (count($allRecipes) > 0)
        @foreach ($allRecipes as $recipe)
            <div class="well">
                <div class="row">
                    <div class="col">
                        <img width="15%" src="/storage/recipeImages/{{$recipe->recipePicture}}"><br>
                        <small>Autor: {{$recipe->findUserBasedOnRecipes->name}}</small>
                    </div>
                    <div class="col">
                        <h3><a href="/recepti/{{$recipe->id}}">{{$recipe->title}}</a></h3>
                    </div>
                </div>
            </div>
            <hr>
        @endforeach
        {{$allRecipes->links()}}
    @else
        <p style="background-color: red">Nema recepata u bazi!</p>
    @endif
@endsection
