@extends('layouts.master')

@section('content')

<h1>Artigos</h1>
<div>
<p>
    <a href="/artigos/create/" class="btn btn-default">Criar artigo</a>
</p>
</div>
<div class="bs-docs-section">
    @forelse($artigos as $artigo)
        <div class="row">
            <div class="col-lg-12">
                <h2 id="type-blockquotes">
                    <a href="/artigos/detalhe/{{$artigo->id}}">
                        <h3>{{$artigo->nome}}</h3>
                    </a>
                </h2>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="bs-component">
                    <blockquote>
                        <p>
                            {{$artigo->artigo}}
                        </p>
                        <small>
                            <cite>
                                Autor
                            </cite>
                        </small>
                    </blockquote>
                </div>
            </div>
        </div>
    @empty
        <p>Nenhum artigo!</>
    @endforelse
</div>
@endsection
