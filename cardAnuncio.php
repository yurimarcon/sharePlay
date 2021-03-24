<?php

?>

<hr>

<div class="container">
	<div class="row">

		<?php
			do{

				$idProduto;
				$img = "no-image.png";
				$titulo = '';
				$descricao = '';
				$valor = '0';

				if(!empty($linha['imgAnuncio'])){
					$img = $linha['imgAnuncio'];
				}
				if(!empty($linha['descricaoAnuncio'])){
					$descricao = $linha['descricaoAnuncio'];
				}
				if(!empty($linha['tituloanuncio'])){
					$titulo = $linha['tituloanuncio'];
				}
				if(!empty($linha['valorAnuncio'])){
					$valor = $linha['valorAnuncio'];
				}
				if(!empty($linha['_idAnuncio'])){
					$idProduto = $linha['_idAnuncio'];
				}
				// print_r($linha);
				// exit;



		?>

  		<div class="col-sm-3">
			<div class="card ">
				<!-- FOTO DO ITEM -->
			  	<img src="<?php echo 'images/imgAnuncios/'.$img ?>" class="card-img-top" alt="<?php echo 'images/imgAnuncios/'.$img ?>" class="card-img-top" alt="imagem do produto" style='height: 170px;'>
			  <div class="card-body">
			  	<!-- TÍTULO DO ITEM -->
			    <h5 class="card-title"><?php echo $titulo ?></h5>
			    <div  >
					<?php echo $descricao?><br>
				</div>
			    <div>
					<b><small>Valor / dia</small> R$<?php echo $valor ?>,00</b><br>
				</div>

				<div class="text-right mt-3">

					<!-- BOTÃO LÁPIS DE EDIÇÃO -->
      				<!-- <a href="#" class="view_data" data-toggle="modal" data-target="<?php echo '#exampleModalDelete'.$linha['_idAnuncio'] ?>"><button class="btn btn-primary m-1" style="width: 40px;"><i class="fa fa-edit mr-2" ></i></button></a> -->

      				<!-- BOTÃO VER DETALHES -->
			    	<a href="produto.php?i=<?php echo $idProduto ?>" class="btn btn-primary ">Ver detalhes</a>

				</div>
			  </div>
			</div>
		</div>

		<?php
			}while($linha = $sql_query->fetch_assoc());
		?>

	</div>
</div>
