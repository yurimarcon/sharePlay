<div class="container mb-3">
	<hr class="bg-light d-none d-md-block mt-5">
	<!-- <h2 class="text-light">Incluir itens:</h2> -->

	<!-- Button trigger modal -->
	<center>
		<button type="button" class="btn btn-dark col-6 mt-3 mt-md-0 " data-toggle="modal" data-target="#exampleModal">
		  Anunciar
		</button>
		
	</center>

	<!-- Modal -->
		<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLabel">Incluindo item</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-footer">
				<!-- FORMULÁRIO DE CRIAÇÃO DE ITENS -->
				<div class="col-12">
			  		<form method="POST" enctype="multipart/form-data" action="scripts/incluiAnuncio.php">
			  			<input name="id" type="text" class="form-control" id="" value="<?php echo $_SESSION['_idUsuario']; ?>" hidden='true'>
			  			<center>
			  				<img class="mx-auto" style="margin-bottom: 5px; height: 100px; width: auto; border-radius: 2px; border: 1px solid grey" src="<?php echo 'images/imgAnuncios/no-image.png' ?>" id="imgPrato">
			  			</center>
						<div class="form-group">
						    <!-- <label for="exampleFormControlFile1">Example file input</label> -->
						    <input name="imagem" type="file" class="form-control-file" id="fotoItem">
						</div>
						<div class="form-group">
							<!-- <label for="nomeItem">Nome do item</label> -->
							<small id="emailHelp" class="form-text text-muted">Título:</small>
						    <input name="nome" type="text" class="form-control" id="" value="<?php if(!empty($linha['nome']))echo $linha['nome']; ?>" aria-describedby="emailHelp" placeholder="Nome do aparelho ou jogo">
						</div>
						<div class="form-group">
						    <!-- <label for="exampleFormControlTextarea1">Ingredientes ou modo de preparo</label> -->
						    <small id="emailHelp" class="form-text text-muted">Descreva seu produto:</small>
						    <textarea name="descricao" class="form-control" type='text' id="exampleFormControlTextarea1" rows="2" ><?php if(!empty($linha['descricao']))echo $linha['descricao']; ?></textarea>
						</div>
						<div class="form-group">
							<label for="valor">Valor do aluguel por dia:</label>
						    <input name="valor" class="form-control" type="text" value="<?php if(!empty($linha['valor']))echo $linha['valor']; ?>" placeholder="">
						</div>
						<div class="form-group">
							<center>
								<button type="submit" class="btn btn-success m-2">Anunciar</button>
			        			<button type="button" class="btn btn-secondary m-2" data-dismiss="modal">Cancelar</button>
							</center>
						</div>
					</form>
			      </div>
			    </div>
			  </div>
			</div>
		</div>
	<hr class="bg-light">

		<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
		<script type="text/javascript">
    	
    	//CARREGA A IMAGEM DO PRODUTO NA TELA APÓS O UPLOAD;
    	$(function(){
			$('#fotoItem').change(function(){
				const file = $(this)[0].files[0]
				const fileReader = new FileReader()
				fileReader.onloadend = function(){
					$('#imgPrato').attr('src', fileReader.result)
				}
				fileReader.readAsDataURL(file)
			})


		})

    </script>

</div>




<button onclick="mandaEmail()">oi</button>
<script type="text/javascript">

	function mandaEmail(){

		const sgMail = require('@sendgrid/mail')
		SENDGRID_API_KEY = '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';
		content = "Olá Mundo";

		sgMail.setApiKey(SENDGRID_API_KEY)

		const msg = {
		  from: 'dgttestes2019@gmail.com', // Change to your verified sender
		  to: 'yuri.erik.oliveira@gmail.com', // Change to your recipient
		  subject: 'Sending with SendGrid is Fun',
		  text: 'and easy to do anywhere, even with Node.js',
		  // html: '<strong>and easy to do anywhere, even with Node.js</strong>',
		  html: content,
		}

		sgMail
		  .send(msg)
		  .then(() => {
		    console.log('Email sent')
		  })
		  .catch((error) => {
		    console.error(error)
		  })

		return

	}
	

</script>