<h1>Index Blog</h1>

@forelse($artigos as $artigo)
    <a href="/artigos/detalhe/{{$artigo->id}}">
        <h3>{{$artigo->nome}}</h3>
    </a>
    <p>{{$artigo->artigo}}</p>
@empty
    <p>Nenhum artigo!</>
@endforelse
