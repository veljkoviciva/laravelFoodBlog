@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header" style="color: cornflowerblue; font-size: large;"><strong>{{ __('Moj nalog') }}</strong></div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{-- {{ __('You are logged in!') }} --}}
                        {{-- <a href="#"  class="btn btn-primary">Podaci o profilu</a> --}}
                        Ime: {{ auth()->user()->name }} <br>
                        Mail: {{ auth()->user()->email }} <br>
                        <?php
                        $joinDate = auth()->user()->created_at;
                        echo 'Datum pridruživanja: ' . date_format($joinDate, 'j.n.Y.'); ?>
                        <hr>
                        {{-- <a href="/Recipes/" class="btn btn-info">Moji recepti</a> --}}
                        <strong><span style="color: cornflowerblue; font-size: large;">Moji recepti</span></strong> <br>
                        @if (count($recipesByUser) != 0)
                            Ukupan broj objavljenih recepata: {{ @count($recipesByUser) }} <br>
                            <table id="tableRecipes" class="table table-bordered border-primary">
                                <tr>
                                    <th>Recept</th>
                                    <th>Update</th>
                                    <th>Delete</th>
                                </tr>
                                @foreach ($recipesByUser as $recipes)
                                    <tr>
                                        <td style="text-align: left">{{ $recipes->title }}</td>
                                        <td style="text-align: center"><a href="/recepti/{{ $recipes->id }}/edit" class="btn btn-warning">Edit</a></td>
                                        <td style="text-align: center">
                                            <form action="{{ route('recepti.destroy', $recipes->id) }}" method="POST"
                                                class="pull-right">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="btn btn-danger">Obriši <i
                                                        class='bi bi-trash'></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        @else
                            <p style="background: lightblue">Nemate objavljene recepte</p>
                        @endif

                        <?php //var_dump($Recipes);
                        ?>

                        <p align="right">
                            <a href="/recepti/create" class="btn btn-info"><i class="bi bi-file-earmark-plus"></i> Nov
                                recept</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>


        @if (auth()->user()->id == 3 || auth()->user()->id == 6)
            <br>
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">{{ __('Admin panel') }}</div>

                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif

                            <table id="usersTable" class="table table-striped table-hover">
                                <tbody>
                                    <th style="text-align:center">Ime i prezime</th>
                                    <th style="text-align:center">Email adresa</th>
                                    <th style="text-align:center">Datum pridruživanja</th>
                                    <th style="text-align:center">Broj objavljenih recepata</th>
                                    <th style="text-align:center">Brisanje korisnika</th>
                                    @foreach ($users as $user)
                                        {{-- @foreach ($countRecipe as $count) --}}
                                        <tr align="center">
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td><?php $date = $user->created_at;
                                            $newDate = date_format($date, 'j.n.Y.');
                                            echo $newDate; ?></td>
                                            @foreach ($countRecipe as $count)
                                                @if ($user->id == $count['userID'])
                                                    <td>{{ $useridpost = $count['recipe_count'] }}</td>
                                                @endif
                                            @endforeach
                                            @if($user->id !=3 && $user->id !=6)
                                                <td colspan="2" style="text-align: right">
                                                    <form action="{{ route('users.destroy', $user->id) }}" method="POST"
                                                        class="pull-right">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button type="submit" class="btn btn-danger">Obriši <i
                                                                class='bi bi-trash'></i></button>
                                                    </form>
                                                </td>
                                            @endif
                                        {{-- @endforeach --}}
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection

{{-- <script src="js/users.js"></script> --}}
{{-- <script>
    document.querySelectorAll('td:empty').forEach(td => {
        td.textContent = '0';
    });
</script> --}}
