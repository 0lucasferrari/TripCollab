@extends('layouts.template', ['pagina' => 'perfil'])
@section('titulo')
    Perfil
@endsection

@section('conteudo')
<!-- Formulário -->
<div class="container-fluid p-0">
    <!-- Formulário de Cadastro do Usuário -->
    <form action="{{route('profile.update', ['user' => $user->id])}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method("PUT")

        <section class="usuario bg-light mb-2 px-3 py-4">
            <h5 class="nome ml-3 py-1">Cadastro do Usuário</h5>
                <div class="form-row mx-3">
                    <div class="col-sm-6 mb-3">
                        <label for="nome">Nome</label>
                        <input name="name" type="text" class="form-control is-valid" id="nome" placeholder="Digite o seu nome" value="{{$user->name}}" required>
                        <div class="valid-feedback">
                            Ok!
                        </div>
                    </div>
                    <div class="col-sm-6 mb-3">
                        <label for="email">E-mail</label>
                        <input name="email" type="email" class="form-control is-valid" id="email" placeholder="Digite o seu e-mail" value="{{$user->email}}" required>
                        <div class="valid-feedback">
                            Ok!
                        </div>
                    </div>
                </div>
                <div class="form-row mx-3">
                <button type="">Alterar Senha</button>
                </div>
        </section>

        <!-- Formulário de Cadastro do Usuário -->

        <!-- Formulário de Perfil do Usuário -->
        <section class="usuario bg-light mb-2 px-3 py-4">
            <h5 class="nome ml-3 pb-3">Perfil do Usuário</h5>

            <!-- Foto da Capa -->
            <h7 class="capa ml-3">Foto da capa</h7>
            <div class="col-xs-12 capa p-0 mx-3 my-3 border">
                <img class="rounded" src="{{asset('storage/' . $user->background_photo)}}">
            </div>
            <div class="form-group col-12 m-3 pb-3">
                <label for="foto">Selecione um arquivo</label>
                <input class="form-control-file is-invalid" name="background_photo[]" type="file" id="foto" required>
            </div>
            <!-- Foto da Capa -->

            <!-- Foto do Usuário -->
            <h7 class="foto ml-3">Foto do usuário</h7>
            <div class="col-xs-12 foto p-0 mx-4 my-3">
                <img src="{{asset('storage/' . $user->photo)}}" class="rounded-circle border" style="width:100px; height: 100px">
            </div>
            <div class="form-group col-12 m-3 pb-3">
                <label for="foto">Selecione um arquivo</label>
                <input class="form-control-file is-invalid" name="photo[]" type="file" id="foto" required>
            </div>
            <!-- Foto do Usuário -->

            <!-- Dados do Usuário -->
            <h7 class="foto ml-3 my-3">Dados do usuário</h7>
                <div class="form-row mx-3 my-3">
                    <div class="col-md-4 mb-3">
                        <label for="cidade">Cidade</label>
                        <input name="city" type="text" class="form-control is-valid" id="cidade" placeholder="Digite a sua cidade" value="{{$user->city}}" required>
                        <div class="valid-feedback">
                            Ok!
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="estado">Estado</label>
                        <input type="text" class="form-control is-valid" name="state" id="estado" placeholder="Digite o seu estado" value="{{$user->state}}" required>
                        <div class="valid-feedback">
                            Ok!
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="pais">País</label>
                        <input type="text" class="form-control is-valid" name="country" id="pais" placeholder="Digite o seu país" value="{{$user->country}}" required>
                        <div class="valid-feedback">
                            Ok!
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="dataDeNascimento">Data de Nascimento</label>
                        <input type="date" class="form-control is-valid" name="birthday" id="dataDeNascimento" value="{{$user->birthday}}">
                        <div class="valid-feedback">
                            Ok!
                        </div>
                    </div>
                </div>

                <div class="col-12 my-3">
                    <label for="descricao">Descrição do usuário</label>
                    <textarea name="descricao" id="descricao" cols="30" rows="5" class="form-control">{{$user->public}}</textarea>
                </div>

                <div class="col-12 my-3">
                    <label for="descricao">Visibilidade do perfil</label>
                    <select name="public" id="descricao" cols="30" rows="5" class="form-control" value="{{$user->public}}">
                        <option selected>Público</option>
                        <option>Privado</option>
                    </select>
                </div>
            <!-- Dados do Usuário -->
        </section>
        <!-- Formulário de Perfil do Usuário -->

        <!-- Interesses -->
        <section class="usuario bg-light mb-2 px-3 pb-4">
            <h5 class="nome mx-3 pt-4">Interesses</h5>
            <div class="col-xs-12">
                <div class="row interesses text-justify mx-3 py-2">
                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nesciunt, ducimus. Quibusdam dignissimos
                    reprehenderit placeat quas modi, ipsa temporibus omnis labore aspernatur, fugit officia delectus
                    iure. Eveniet deleniti odio explicabo ipsum!
                </div>
            </div>
        </section>
        <!-- Interesses -->

        <section class="usuario bg-light mb-2 px-3 py-2">
            <div class="form-group mx-4">
                <div class="form-check my-3">
                    <input class="form-check-input is-invalid" type="checkbox" value="" id="invalidCheck3" required>
                    <label class="form-check-label" for="invalidCheck3">
                        Concordo com Termos e Condições
                    </label>
                    <div class="invalid-feedback">
                        Por favor, selecione antes de enviar.
                    </div>
                </div>
                <div class="col d-flex justify-content-center">
                    <a href="aba_perfil.html" class="btn btn-secondary mt-2" style="width: 100px">Enviar</a>
                </div>
            </div>
        </section>
    </form>
</div>
<!-- Formulário -->
@endsection