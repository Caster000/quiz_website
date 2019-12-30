@extends('layouts.master')

@section('title', 'Accueil')

@section('ajoutHead')
    <meta name="csrf-token" id="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('content')
    {{--    PARTIE D'AJOUT THEME----------------------------------------------------------------------------------------------------------------------------------------------}}
    <div class="row justify-content-center">                                        {{--  Bouttons pour les admin, declenche des modals  --}}
        <button type="button" class="btn btn-primary m-2 col-2" data-toggle="modal" data-target="#ThemeModal" data-whatever="@ajouterTheme">Ajouter un Thème</button>
    </div>
    <div class="modal fade" id="ThemeModal" tabindex="-1" role="dialog" aria-labelledby="ThemeModalLabel" aria-hidden="true">            {{--  Formulaire pour ajouter une activite   --}}
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ThemeModalLabel">Nouveau Thème</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body mr-5 ml-5">
                    <form action="{{ URL::action('ThemeController@store')}}" method="post" enctype="multipart/form-data">
                    @csrf <!-- {{ csrf_field() }} -->
                        <div class="form">
                            <div class="form-group row">
                                <label >Nom du joueur</label>

                                    <select class="custom-select mr-sm-2" id="inlineFormCustomSelect"name="id_user">
                                        @foreach($users as $user)
                                            <option value="{{$user->id_user}}" >{{$user->nom}} {{$user->prenom}}</option>
                                        @endforeach
                                    </select>
                            </div>
                            <div class="form-group row">
                                <label>Thème </label>
                                <input type="text" class="form-control" name="theme" required></input>
                            </div>
                            <div class="modal-footer col mt-4">
                                <button type="submit" class="btn btn-primary">Ajouter</button>            {{--  submit   --}}
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
{{--    PARTIE AFFICHAGE DES DIFFERENTS THEME-------------------------------------------------------------------------------------------------}}
{{--    ----------------------------------------------------------------------------------------------------------------------------------------------}}
    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">Thème</th>
            <th scope="col">Nom</th>
            <th scope="col">Prenom</th>
            <th scope="col">Modifier</th>
        </tr>
        </thead>
        <tbody>
        @if($theme->isEmpty())

        @else
        @foreach($theme as $row)
            <tr>
                <td>{{$row->theme}}</td>
                <td>{{$row->nom}}</td>
                <td>{{$row->prenom}}</td>
                <td>
                    <div class="row justify-content-center">                                        {{--  Bouttons pour les admin, declenche des modals  --}}
                        <button id="{{$row->id_theme}}" type="button" class="btn btn-primary m-2 col-3 edit_data" data-toggle="modal" data-target="#ModificationModal" data-whatever="@Modifier">Modifier</button>
                        <a href="{{ URL::action('ThemeController@delete', $row->id_theme)}}" class="btn btn-danger m-2 col-3">Supprimer</a>
                    </div>
                </td>
            </tr>
        @endforeach
            @endif
        </tbody>
    </table>
{{--MODAL POUR MODIFIER LES QUESTIONS---------------------------------}}
    @if($theme->isEmpty())

    @else
    <div class="modal fade" id="ModificationModal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">            {{--  Formulaire pour ajouter une activite   --}}
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ModalLabel">{{$row->theme}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body mr-5 ml-5">


                    @foreach($theme as $row)
                    <form  action="{{ URL::action('QuestionController@update', $row->id_theme)}}" id="insert_form" method="post" enctype="multipart/form-data">
                        @csrf <!-- {{ csrf_field() }} -->
                            <div class="form">
                                @foreach($questions as $question)
                                    <div class="form-group ">
                                        <u><h6 >Question level {{$question->level}}</h6></u>
                                        <label >Question :</label><br>
                                            <textarea id="{{$question->level}}_question" name="{{$question->level}}.question"></textarea>
                                        <br><label >Reponse :</label><br>
                                            <textarea id="{{$question->level}}_reponse" name="{{$question->level}}.reponse"></textarea>
                                        <br><label >Carre 1 :</label><br>
                                            <textarea id="{{$question->level}}_carre1" name="{{$question->level}}.carre1"></textarea>
                                        <br><label >Carre 2 :</label><br>
                                            <textarea id="{{$question->level}}_carre2" name="{{$question->level}}.carre2"></textarea>
                                        <br><label >Carre 3 :</label><br>
                                            <textarea id="{{$question->level}}_carre3" name="{{$question->level}}.carre3"></textarea>
                                        <br><label >Carre 4 :</label><br>
                                            <textarea id="{{$question->level}}_carre4" name="{{$question->level}}.carre4"></textarea>
                                        <br><label >Duo 1 :</label><br>
                                            <textarea id="{{$question->level}}_duo1" name="{{$question->level}}.duo1"></textarea>
                                        <br><label >Duo 2 :</label><br>
                                            <textarea id="{{$question->level}}_duo2" name="{{$question->level}}.duo2"></textarea>
                                    </div>
                                @endforeach
                                <div class="modal-footer col mt-4">
                                    <button type="submit" class="btn btn-primary">Ajouter</button>            {{--  submit   --}}
                                </div>
                            </div>

                    </form>
                    @endforeach
                        @endif
                </div>
            </div>
        </div>
    </div>

@endsection

@section('addScripts')
    <script type="text/javascript" src="{!! asset('js/updateQuestion.js') !!}"></script>
@endsection
