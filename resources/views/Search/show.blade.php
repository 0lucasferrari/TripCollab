@extends('layouts.template', ['pagina' => 'busca'])

@section('css')
<link rel="stylesheet" href="{{url('css/stylesGroupsAndTrips.css')}}">
@endsection

@section('titulo')
    Busca
@endsection

@section('conteudo')

<main>
    <img src="{{asset('./img\background.jpg')}}" class="img-fluid banner-img" alt="banner">
</main>

<div class="containerDesktop">

<div class="pt-4 pb-4 pb-md-0 card bg-light menu-voltar mb-2 ">
        <h5  class="d-flex ml-4 ml-md-0 align-items-center mr-3">Minha busca</h5>
</div>

<main class="bg-light" style="height:100vh">
    <div class="row  ml-3 mr-3 m-md-0">
        <div class="col-12">

            <div class="d-flex pt-4"> <!-- Barra de busca de usuários -->
                <form action="" class="send-query w-100 d-flex" method="GET">
                    <div class="input-group">
                        @csrf
                        <input name="search" type="text" class="form-control border-0" placeholder="Buscar">

                        <div class="input-group-append">
                            <a href="#" onclick="document.querySelector('.send-query').submit();">
                                <span class="input-group-text border-0">
                                    <i type="submit" class="material-icons">search</i>
                                </span>
                            </a>
                        </div>

                    </div>
                </form>
            </div>


        <div class="mb-3 mt-2">
            <div class="btn-group mt-2 filtro" role="group" aria-label="">
                <a href="" class="btn btn-outline-primary border-top-0 border-left-0 border-bottom-0 filtro @if(request()->is('search/users*')) active @endif">Pessoas</a>
                <a href="" class="btn btn-outline-primary border-top-0 border-bottom-0 filtro @if(request()->is('search/groups*')) active @endif">Comunidades</a>
                <a href="" class="btn btn-outline-primary border-top-0 border-bottom-0 border-right-0 filtro @if(request()->is('search/trips*')) active @endif">Viagens</a>
            </div>
        </div>

        @if(!empty($_GET))
            <div>
                @if(isset($users))

                    <div class="py-2">

                        @if($users->count() == 0)

                            Nenhum resultado encontrado

                        @elseif($users->count() == 1)


                            {{$users->total()}} resultado encontrado

                        @else

                            {{$users->total()}} resultados encontrados

                        @endif

                    </div>

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Foto</th>
                                <th>Nome</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>

                                    <a href="{{route('user.show', ['id' => $user->id])}}">
                                        <img
                                        class="foto-perfil rounded-circle"
                                        src="@if($user->photo == 'nophoto') {{asset('./img/icone_user.svg')}} @else {{asset("storage/userPhotos/$user->photo")}} @endif"
                                        alt="{{$user->name}}">
                                    </a>

                                    </td>
                                    <td>
                                        <a href="{{route('user.show', ['id' => $user->id])}}">
                                            {{$user->name}}
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {{$users->onEachSide(1)->links()}}

                @endif

                @if(isset($groups))


                    <div class="py-2">

                        @if($groups->count() == 0)

                            Nenhum resultado encontrado

                        @elseif($groups->count() == 1)


                            {{$groups->total()}} resultado encontrado

                        @else

                            {{$groups->total()}} resultados encontrados

                        @endif

                    </div>

                    <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Foto</th>
                                    <th>Grupo</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($groups as $group)
                                    <tr>
                                        <td>

                                        <a href="{{route('group.show', ['id' => $group->id])}}">
                                            <img
                                            class="foto-perfil rounded-circle"
                                            src="@if($group->photo == 'nophoto') {{asset('./img/add.png')}} @else {{asset("storage/$group->photo")}} @endif"
                                            alt="{{$group->name}}">
                                        </a>

                                        </td>
                                        <td><a href="{{route('group.show', ['id' => $group->id])}}">{{$group->name}}</a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                    </table>

                    {{$groups->onEachSide(1)->links()}}

                @endif

                @if(isset($trips))

                    <div class="py-2">

                        @if($trips->count() == 0)

                            Nenhum resultado encontrado

                        @elseif($trips->count() == 1)


                            {{$trips->total()}} resultado encontrado

                        @else

                            {{$trips->total()}} resultados encontrados

                        @endif

                    </div>

                    <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Foto</th>
                                    <th>Viagem</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($trips as $trip)
                                    <tr>
                                        <td>

                                        <a href="{{route('trip.show', ['id' => $trip->id])}}">
                                            <img
                                            class="foto-perfil rounded-circle"
                                            src="@if($trip->photo == 'nophoto') {{asset('./img/add.png')}} @else {{asset("storage/$trip->photo")}} @endif"
                                            alt="{{$trip->name}}">
                                        </a>

                                        </td>
                                        <td><a href="{{route('trip.show', ['id' => $trip->id])}}">{{$trip->name}}</a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                    </table>

                    {{$trips->onEachSide(1)->links()}}

                @endif

            </div>
        </div>
        @endif
    </div>
</main>
</div>

@endsection
