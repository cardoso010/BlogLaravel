<h3>Formulario Artigos</h3>

<form method="post" action="/artigos/save">
    {!! csrf_field() !!}
    <table>
        <tr>
            <td>Nome</<td>
            <td><input type="text" name="nome" value="" /></td>
        </tr>
        <tr>
            <td>Artigo</<td>
            <td><textarea name="artigo"></textarea></td>
        </tr>
        <tr>
            <td><input type="submit" value="Salvar" /></<td>
            <td><input type="reset" value="Limpar" /></td>
        </tr>
    </table>
</form>
