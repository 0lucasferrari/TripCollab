@extends('layouts.template', ['pagina' => 'comunidadesEviagens'])

@section('css')
<link rel="stylesheet" href="{{url('css/stylesGroupsAndTrips.css')}}">
@endsection

@section('titulo')
    Criar viagem
@endsection

@section('conteudo')
<img src="@if($user->photo == 'nophoto') {{asset('./img/default_cover.jpg')}}  @else {{asset("storage/usersBackgroundPhotos/$user->background_photo")}} @endif" class="img-fluid banner-img" alt="banner">
    <div class="containerDesktop">

        <!-- NAV ABA-->
        {{-- <div class="bg-light pt-4 pb-4 mb-3">
            <div class="d-flex ml-3 align-items-center">
                <a class="link" href="{{ URL::previous() }}"><i class="material-icons">arrow_back</i></a>
                <div class="container">
                    <h5>Criar nova viagem</h5>
                </div>
            </div>
        </div> --}}

        <div class="pt-4 pb-4 card bg-light menu-voltar mb-2 ">
            <a  href="{{route('user.listGroupsAndTrips')}}" class="d-flex ml-3 ml-md-0 align-items-center mr-3">
                <i class="material-icons mr-3 back stretched-link">arrow_back</i>
                <h5>Criar nova viagem</h5>
            </a>
        </div>

        <!-- CARD COM OS DETALHES DA VIAGEM SELECIONADA -->
        <main class="bg-light pt-2 pb-4">

                <form action="{{route('trip.store')}}" method="POST" class="col-12" enctype="multipart/form-data">
                @csrf
                        {{-- <img src="{{url('./img/add.png')}}" class="d-block" style="width: 200px; height: 200px; margin-left: auto; margin-right: auto;" alt="..."> --}}
                        <div class="form-group mt-4">
                            <label for="tituloDaViagem">Titulo da viagem:</label>
                            <input required name="name" type="text" class="form-control" id="tituloDaViagem" placeholder="Insira titulo da viagem" value="">
                        </div>
                        <div class="form-group mt-4">
                            <label for="departure">Embarque dia:</label>
                            <input required name="departure" type="date" class="form-control mb-2" placeholder="Insira a data de partida" value="">
                            <label for="departure">Retorno dia:</label>
                            <input required name="return_date" type="date" class="form-control" placeholder="Insira a data de retorno" value="">
                        </div>

                        <div class="form-group mt-4">
                            <label for="">Descrição da viagem:</label>
                            <textarea required name="description" type="text" class="form-control" id="" placeholder="Insira descrição da viagem"></textarea>
                        </div>

                        <label for="">Foto ilustrativa</label>
                        <input type="file" class="form-control-file" name="photo">

                        <!--
                        <div class="form-group mt-4">
                            <label for="vincularComunidade">Vincular à comunidade:</label>
                            <input type="text" class="form-control mb-2" id="vincularComunidade" placeholder="Insira o nome da comunidade">
                        </div>
                        -->
                        <div class="form-group mt-4">
                            <label for="investimentoPrevisto">Investimento previsto:</label>
                            <input required name="foreseen_budget" type="number" class="form-control mb-2" id="investimentoPrevisto" placeholder="Insira o investimento previsto" value="">
                        </div>

                        <div class="form-group mt-4">
                            <label for="palavrasChave">Palavras-chave:</label>
                            @foreach ($interests as $interest)
                            <div class="form-check @error('interests') is-invalid @enderror"  id="palavrasChave">
                                    <input class="form-check-input" name="interest[]" type="checkbox" value="{{$interest->id}}" id="{{$interest->id}}">
                                    <label class="form-check-label" for="{{$interest->id}}">
                                        {{$interest->name}}
                                    </label>
                                @error('interests')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                            @endforeach
                        </div>

                        <div class="form-group mt-4">
                            <label for="visibilidadeDoGrupo">Visivel ao público?</label>
                            <select name="visibility" class="form-control" id="visibilidadeDoGrupo">
                                <option value="1">Sim</option>
                                <option value="0">Não</option>
                            </select>
                        </div>
                        <input type="hidden" name="admin" value="{{auth()->user()->id}}">

                        <div class="d-flex justify-content-end mt-4">

                            <a href="{{route('user.listGroupsAndTrips')}}" class="btn btn-secondary mr-2">Cancelar</a>
                            <button type="submit" href="comunidadesEViagens" class="btn botao">Salvar</button>
                        </div>
                </form>
            </div>
        </main>

    </div>
@endsection
