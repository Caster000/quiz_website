
@extends('layouts.master')

@section('title', 'Admin')

@section('content')

    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">Id_user</th>
            <th scope="col">Nom</th>
            <th scope="col">Prenom</th>
            <th scope="col">Email</th>
            <th scope="col">Id_role</th>
            <th scope="col">Date</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <td>{{$user->id_user}}</td>
                <td>{{$user->nom}}</td>
                <td>{{$user->prenom}}</td>
                <td>{{$user->email}}</td>
                <td>
                    <form name="myform" method="get" action="{{ URL::action('AdminController@changeRole', [$user->id_user]) }}">            Modification du role
                        <select onchange='this.form.submit()' class="custom-select mr-sm-2" id="inlineFormCustomSelect"name="id_role">
                            <option value="1" autofocus>{{$user->role}}</option>
                            <option value="1">Membre non vérifié</option>
                            <option value="2">Admin</option>
                            <option value="3">Présentateur</option>
                            <option value="4">Membre Coloc</option>
                        </select>
                    </form>
{{--                    {{$user->id_role}}--}}
                </td>
                <td>{{$user->date_creation}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>


@endsection
