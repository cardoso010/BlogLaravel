@extends('layouts.master')

@section('content')

<div>
        <div class="row">
          <div class="col-lg-12">
            <div class="page-header">
              <h2 id="forms">Formulario de Artigo</h2>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-6">
            <div class="well bs-component">
              <form method="post" action="/artigos/save" class="form-horizontal">
                  {!! csrf_field() !!}
                <fieldset>
                  <legend>Artigo</legend>
                  <div class="form-group">
                    <label for="inputNome" class="col-lg-2 control-label">Nome</label>
                    <div class="col-lg-10">
                      <input type="text" class="form-control" id="inputNome" name="nome" placeholder="Nome">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="Descricao" class="col-lg-2 control-label">Descrição</label>
                    <div class="col-lg-10">
                      <textarea class="form-control" rows="3" id="descricao" name="descricao"></textarea>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-lg-10 col-lg-offset-2">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <button type="reset" class="btn btn-default">Cancel</button>
                    </div>
                  </div>
                </fieldset>
              </form>
            </div>
          </div>

        </div>
      </div>

@endsection
