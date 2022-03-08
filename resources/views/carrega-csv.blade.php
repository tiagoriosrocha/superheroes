<h1>Listagem de Funcionários</h1>

<hr>

<ul>
@foreach($funcionarios as $f)
    <li>Nome: {{$f->nome}} Idade: {{$f->idade}} E-mail: {{$f->email}}</li>
@endforeach
</ul>