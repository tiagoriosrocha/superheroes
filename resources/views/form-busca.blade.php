<h1>Busca de Funcionário</h1>
<hr>
<p>Procure pelo nome:</p>
<form method="POST" action="buscar-nome-post" name="form-consulta">
	{{ csrf_field() }}
	<input type="text" name="campodebusca" onchange="ajaxprod()">
	<input type="submit" value="Buscar"> 
</form>

<table id="tableitem" class="table table-striped table-bordered table-hover" style="font-size:12px;">
  <thead>
    <tr>
      <th>Nome</th>
      <th>E-mail</th>
    </tr>
  </thead>
  <tbody>
</tbody>
</table>

<script type="text/javascript">
	function ajaxprod(){
      $.ajax({
        'processing': true, 
        'serverSide': false,
          type: "GET",
          data: {campodebusca: $("#campodebusca").val()},
          url: "/busca-nome-async",
          success: function(s) {
            var s = $(s);
            var table = $('#tableitem').DataTable();
            table.clear();
              for(var i = 0; i < s.length; i++) {
                   table.row.add([
                    s[i]['nome'],
                    s[i]['email']
                ]);
              }
            table.draw();
          }
      });
    }
</script>