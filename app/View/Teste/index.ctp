<h1>Teste</h1>

Escolha uma estrutura: <br />
<ul>
	<?php 
	foreach($estruturas as $estrutura){
	?>		
	<li><input type="radio" name="estrutura" class="escolhaestrutura" value="<?php echo $estrutura['Estrutura']['id']?>" /><?php echo $estrutura['Estrutura']['titulo']?></li>
	<?php
	}
	?>
</ul>
<br /><br />
<hr />
<br /><br />

<div id="elemento1">
	Texto principal: <textarea rows="" cols=""></textarea>
	OUTRA COISA
</div>
<br />
<div id="elemento2">
	Texto lateral: <textarea rows="" cols=""></textarea>	
</div>
<br />
<div id="elemento3">
	E-mail destinatário do formulario de contato: <input type="text" />
</div>
<br />
<div id="elemento4">
	Link do google maps: <input type="text" />
</div>
<br />
<div id="elemento5">
	Redes Sociais:<br /> 
	Twitter: <input type="text" /><br />
	Facebook: <input type="text" /><br />
	Orkut: <input type="text" />
</div>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
<script type="text/javascript">
$('.escolhaestrutura').click(function(){
	var valor = $(this).val();

	switch(valor){
	case "1":
		$('#elemento3').show();
		$('#elemento1, #elemento2, #elemento4').hide();
		break;
	case "2":
		$('#elemento1, #elemento3').show();
		$('#elemento2, #elemento4').hide();
		break;
	case "3":
		$('#elemento1, #elemento3, #elemento2, #elemento4').show();
		break;
	}
});
</script>