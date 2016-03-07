<?

/* Medida preventiva para evitar que outros domínios sejam remetente da sua mensagem. */
if (preg_match('/tempsite.ws$|locaweb.com.br$|hospedagemdesites.ws$|websiteseguro.com$/i', $_SERVER[HTTP_HOST])) {
        $emailsender='contato@suellencampanhola.com'; // Substitua essa linha pelo seu e-mail@seudominio
} else {
        $emailsender = "contato@" . $_SERVER[HTTP_HOST];
        //    Na linha acima estamos forçando que o remetente seja 'webmaster@seudominio',
        // Você pode alterar para que o remetente seja, por exemplo, 'contato@seudominio'.
}
 
/* Verifica qual éo sistema operacional do servidor para ajustar o cabeçalho de forma correta.  */
if(PATH_SEPARATOR == ";") $demilitador = "\r\n"; //Se for Windows
else $demilitador = "\n"; //Se "nÃ£o for Windows"



// Passando os dados obtidos pelo formulário para as variáveis abaixo
$remetente = $_POST['Wremetente'];
$destinatario = $_POST['Wdestinatario'];
$assunto = $_POST['Wassunto'];
$saida = $_POST['Wsaida'];
$mensagem = $_POST['Mensagem'];
$nome = $_POST['nome'];
$telefone = $_POST['telefone'];

$msg = "Contato do Site". $demilitador;
while(list($campo, $valor) = each($_POST)) {
	
// Monta msg
if ($campo != "Submit" && $campo != "Wremetente" && $campo != "Wdestinatario" && $campo != "Wassunto" && $campo != "Wsaida" && !stristr($campo, 'image')) {
// Imprime o CAMPO : VALOR
$msg .= $campo . ": " . $valor . "" . $demilitador;	
}
}

/* Montando o cabeÃ§alho da mensagem */
$headers = "MIME-Version: 1.1" .$demilitador;
$headers .= "Content-type: text/plain; charset=utf-8".$demilitador;
$headers .= "From: " . $destinatario.$demilitador;
$headers .= "Reply-To: " . $remetente . $demilitador;



/* Enviando a mensagem */
//É obrigatório o uso do parâmetro -r (concatenação do "From na linha de envio"), aqui na Locaweb:
if(!mail($destinatario, $assunto, $msg, $headers,"-r".$emailsender)){ // Se for Postfix
    $headers .= "Return-Path: " . $emailsender . $demilitador; // Se "não for Postfix"
    mail($destinatario, $assunto, $msg, $headers );
}


/* Mostrando na tela as informações enviadas por e-mail */
Header("location: $saida"); 

?>
