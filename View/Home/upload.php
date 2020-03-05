<?php
if(isset($_REQUEST['Enviar'])){
    
$destino = 'uploads/';

if(!$_FILES){
	echo 'Nenhum arquivo enviado!';
}else{
	$file_name = $_FILES['file']['name'];
	$file_type = $_FILES['file']['type'];
	$file_size = $_FILES['file']['size'];
	$file_tmp_name = $_FILES['file']['tmp_name'];
	$error = $_FILES['file']['error'];
}

switch ($error){
	case 0:
		break;
	case 1:
		echo 'O tamanho do arquivo é maior que o definido nas configurações do PHP!';
		break;
	case 2:
		echo 'O tamanho do arquivo é maior do que o permitido!';
		break;
	case 3:
		echo 'O upload não foi concluído!';
		break;
	case 4:
		echo 'O upload não foi feito!';
		break;
}

if($error == 0){
	if(!is_uploaded_file($file_tmp_name)){
		echo 'Erro ao processar arquivo!';
	}else{
		if(!move_uploaded_file($file_tmp_name,$destino."\\".$file_name)){
			echo 'Não foi possível salvar o arquivo!';
		}else{
			echo 'Processo concluído com sucesso!<br>';
			echo "Nome do arquivo: $file_name<br>";
			echo "Tipo de arquivo: $file_type<br>";
			echo "Tamanho em byte: $file_size<br>";
		}
	}
}
}
?>
<html>
<head>
    <title>Upload de Arquivos com PHP</title>
</head>
<body>
 
<form enctype="multipart/form-data" method="post">
	<!--<input type="hidden" name="MAX_FILE_SIZE" value="1048576" />-->
	<label for="file">Arquivo a ser enviado:</label>
    <input id="file" name="file" type="file" />
    <input id="file" name="Enviar" type="hidden" />
	<input type="submit" value="Enviar" />
</form>


</body>
</html>
