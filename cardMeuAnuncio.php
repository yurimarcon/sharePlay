<?php

?>

<hr>

<div class="container">
	<div class="row">

		<?php
			do{


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

      				<!-- BOTÃO VER PROMOVER -->
      				<small><b>Destaque esse anúncio -></b></small><a href="https://pag.ae/7WssKhcNM" alt="Promova seu anúncio por R$5,99"><button class="btn btn-success m-1" style="width: 40px;"><i class="fa fa-dollar-sign" ></i></button></a>

					<!-- BOTÃO LÁPIS DE EDIÇÃO -->
      				<a href="#" class="view_data" data-toggle="modal" data-target="<?php echo '#exampleModalDelete'.$linha['_idAnuncio'] ?>"><button class="btn btn-primary m-1" style="width: 40px;"><i class="fa fa-edit" ></i></button></a>

				</div>
			  </div>
			</div>
		    <!-- Modal -->
			<div class="modal fade" id="<?php echo 'exampleModalDelete'.$linha['_idAnuncio'] ?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
			  <div class="modal-dialog">
			    <div class="modal-content">
			      <div class="modal-header">
			        <h5 class="modal-title" id="exampleModalLabel">Edição de item</h5>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
			      </div>
			      <div class="modal-footer">
					  	<div class="col-12">

					  		<!-- FORMULÁRIO DE ALTERAÇÃO DE ITENS -->
				      		<form method="POST" enctype="multipart/form-data" action="scripts/atualizaItemComFoto.php">
				      			<input name="id" type="text" class="form-control" id="" value="<?php if(!empty($linha['_idAnuncio']))echo $linha['_idAnuncio']; ?>" hidden='true'>
				      			<center>
				      				<img class="mx-auto" style="margin-bottom: 5px; height: 100px; width: auto; border-radius: 2px; border: 1px solid grey" src="<?php echo 'images/imgAnuncios/'.$img ?> ?>" id="<?php echo 'img'.$linha['_idAnuncio']; ?>">
				      			</center>
								<div class="form-group">
								    <!-- <label for="exampleFormControlFile1">Example file input</label> -->
								    <input name="imagem" type="file" class="form-control-file" id="<?php echo 'foto'.$linha['_idAnuncio']; ?>">

								    <script type="text/javascript">
								    	//CARREGA A IMAGEM DO PRATO NA TELA APÓS O UPLOAD;
								    	$(function(){
								    		
											$('<?php echo '#foto'.$linha['_idAnuncio']; ?>').change(function(){
												var file = $(this)[0].files[0];
												console.log(file);
												var fileReader = new FileReader();
												fileReader.onloadend = function(){
													
													$('<?php echo '#img'.$linha['_idAnuncio']; ?>').attr('src', fileReader.result);
												}
												fileReader.readAsDataURL(file);	 
											})
										})

								    </script>


								</div>
								<div class="form-group">
									<!-- <label for="nomeItem">Nome do item</label> -->
									<small id="emailHelp" class="form-text text-muted">Título:</small>
								    <input name="nome" type="text" class="form-control" id="" value="<?php if(!empty($linha['tituloanuncio']))echo $linha['tituloanuncio']; ?>" aria-describedby="emailHelp">
								</div>
								<div class="form-group">
								    <!-- <label for="exampleFormControlTextarea1">Ingredientes ou modo de preparo</label> -->
								    <small id="emailHelp" class="form-text text-muted">Descreva o produto:</small>
								    <textarea name="descricao" class="form-control" type='text' id="exampleFormControlTextarea1" rows="2" ><?php if(!empty($linha['descricaoAnuncio']))echo $linha['descricaoAnuncio']; ?></textarea>
								</div>
								<div class="form-group">
									<label for="valor">Valor / dia</label>
								    <input name="valor" class="form-control" type="text" value="<?php if(!empty($linha['valorAnuncio']))echo $linha['valorAnuncio']; ?>" placeholder="">
								</div>
								<div class="form-group">
									<center>
										<button type="submit" class="btn btn-success m-1">Salvar</button>
					        			<button type="button" class="btn btn-secondary m-1" data-dismiss="modal">Cancelar</button>
					        			<a href="scripts/deletaItem.php?id=<?php if(!empty($linha['_idAnuncio']))echo $linha['_idAnuncio']; ?>"><button type="button" class="btn btn-primary m-1">Deletar</button></a>
									</center>
								</div>
							</form>
							<!-- -->

					  	</div>
			      </div>
			    </div>
			  </div>
			</div>
		</div>

		<?php
			}while($linha = $sql_query->fetch_assoc());
		?>

		    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

    <!-- <script src="scripts/jquery-3.5.1.min.js"></script> -->
    <script type="text/javascript">
    	
    	// function abrirModal(){

    	// 	$(document).on('click','.view_data', function(){
    	// 		let idModal = "#exampleModal"+$(this).attr('id');

    	// 		console.log('oi');

    	// 		$(idModal).modal('show');
    	// 		umModalPorVez = false;

    	// 	});

    	// }

  //   	//CARREGA A IMAGEM DO PRATO NA TELA APÓS O UPLOAD;
  //   	$(function(){
		// 	$('#fotoPrato').change(function(){
		// 		const file = $(this)[0].files[0]
		// 		const fileReader = new FileReader()
		// 		fileReader.onloadend = function(){
		// 			$('#img').attr('src', fileReader.result)
		// 		}
		// 		fileReader.readAsDataURL(file)
		// 	})
		// })

    </script>
	</div>
</div>
