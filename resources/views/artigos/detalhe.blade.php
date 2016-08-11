@extends('layouts.master')

@section('content')

<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading"><h3>{{$artigo->nome}}</h3></div>
            <div class="panel-body">
                <p>{{$artigo->descricao}}</p>
            </div>
        </div>
          <div class="bs-component">
            <div class="modal">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title">Comente aqui!</h4>
                  </div>
                  <form method="post" action="{{ url('/comentarios/save') }}">
                      {!! csrf_field() !!}
                      <input type="hidden" name="artigo_id" value="{{ $artigo->id }}" />
                      <div class="modal-body">
                        <textarea class="form-control" rows="3" id="comentario" name="comentario"></textarea>
                      </div>
                      <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Salvar</button>
                      </div>
                  </form>
                </div>
              </div>
            </div>
        </div>
    </div>
</div>


@endsection
