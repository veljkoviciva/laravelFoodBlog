@extends('layouts.mainLayout')

@section('content')
    {{-- <h1>Strana jednog recepta:</h1> --}}
    <h1>{{$oneRecipe->title}}</h1>
    <div class="d-flex justify-content-between">
        <small>Autor: {{$oneRecipe->findUserBasedOnRecipes->name}}</small>
        <?php 
            $date = $oneRecipe->created_at;
            $newDate = date_format($date, "j.n.Y.");
            echo "<small>Datum objave: " . $newDate . "</small>";
        ?>
    </div>
    
    <h3>{{$oneRecipe->shortDescription}}</h3> 

    <h6>{{$oneRecipe->type}} | {{$oneRecipe->subtype}} | 
        @if($oneRecipe->numberOfPeople == 1) 
            Za 1 osobu
        @elseif ($oneRecipe->numberOfPeople <= 4)
            Za {{$oneRecipe->numberOfPeople}} osobe
        @else
            Za {{$oneRecipe->numberOfPeople}} osoba
        @endif
    </h6>

    <div class="row">
        <div class="col">
            <p style="background-color: black">
                Sastojci: {{$oneRecipe->ingredients}} 
            </p>
        
            <p style="background-color: black">
                Priprema: <br> {{$oneRecipe->preparation}}
            </p>
        </div>
        <div class="col" align="center">
            @if ($oneRecipe->recipePicture != null)
                <img src="/storage/recipeImages/{{$oneRecipe->recipePicture}}"> <!-- u public folderu -->
            @else
                <p style="background-color: red">Nema slike recepta</p>
            @endif
          
        </div>

        {{-- UserID: {{$oneRecipe->userID}} --}}
      </div>

    @if(!Auth::guest())
        @if(Auth::user()->id == $oneRecipe->userID)
            <hr>
                <div class="d-flex justify-content-between">
                    <a href="/recepti/{{$oneRecipe->id}}/edit" class="btn btn-warning">
                        Izmeni <i class="bi bi-arrow-clockwise"></i></a>

                    <form action="{{route('recepti.destroy', $oneRecipe->id)}}" method="POST" class="pull-right">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger">Obriši <i class='bi bi-trash'></i></button>
                        {{-- <input type="submit" value="<i class='bi bi-trash'></i>Obriši" class="btn btn-danger"> --}}
                    </form>
                </div>
        @endif
    @endif
@endsection
