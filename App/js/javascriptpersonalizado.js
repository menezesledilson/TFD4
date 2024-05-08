$(function(){
	//Ler sempre que o usuario digitar algo
	$("#pesquisa").keyup(function(){
		var pesquisa = $(this).val();
		//Verificar se a variavel pesquisa possui algo
		if(pesquisa != ''){
			var dados = {
				palavra : pesquisa
			}
			$.post('administrativo/pesquisar/adm_busca_usuario.php', dados, function(retorna){
				//Mostrar os dados obtidos
				$(".resultado").html(retorna);
			});
		}else{
			$(".resultado").html('');
		}
	});
});