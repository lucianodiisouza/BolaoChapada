<?php
session_start();
require('inc/conexao.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta name="author" content="Luciano dii Souza - Web Developer FullStack And MobileDev">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="O Bolão Chapada é uma iniciativa entre amigos para os amantes do Futebol! Entre, cadastre-se e se divirta! Usuários de Android poderão baixar nosso App na PlayStore!">

	<title>Preciso de Ajuda - Bolão Chapada</title>

	<!-- Arquivos de StyleSheet e ThirdParty Libraries -->
	<!-- css meu -->
	<!-- <link rel="stylesheet" type="text/css" href="css/dashboard.css"> -->
	<!-- css base do bootstrap -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<!-- css do datatables -->
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <!-- css terminam aqui -->
</head>
	<body>
        <div class="container">
            <div class="block_login">
                <br><br><br><br>
                <form method="post">
                    <?php
                        if(isset($_SESSION['nao_autenticado'])):
                    ?>
                        <div class="row">
                        <div class="col-md-4">
                        </div>
                            <div class="col-md-4">
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    Usuário ou senha incorretos.
                                </div>
                            </div>
                        <div class="col-md-4">
                        </div>
                     </div>
                    <?php
                        endif;
                        unset($_SESSION['nao_autenticado']);
                    ?>
                
                    <div class="row">
                        <div class="col-md-4">
                        </div>
                        <div class="col-md-4">
                            <div class="alert alert-success" role="alert">
                                <center>Enviar mensagem ao Administrador</center>
                            </div>
                        </div>
                        <div class="col-md-4">
                        </div>
                    </div>    
                    <div class="row">
                        <div class="col-md-4">
                        </div>
                        <div class="col-md-4">
                            <input type="text" name="usuario" placeholder="Digite o seu nome de usuário" class="form-control" required><br>
                        </div>
                        <div class="col-md-4">
                        </div>
                    </div>    
                    <div class="row">
                        <div class="col-md-4">
                        </div>
                        <div class="col-md-4">
                            <input type="mail" name="email" placeholder="Digite seu email" class="form-control" required><br>
                        </div>
                        <div class="col-md-4">
                        </div>
                    </div>    
                    <div class="row">
                        <div class="col-md-4">
                        </div>
                        <div class="col-md-4">
                            <textarea name="mensagem" rows="5" class="form-control" placeholder="Digite sua mensagem" required></textarea>
                        </div>
                        <div class="col-md-4">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                        </div>
                        <div class="col-md-4">
                        <center>
                            <br>
                            <button type="submit" value="Enviar" name="entrar" class=" btn btn-primary">Enviar</button>
                            <button type="reset" value="Limpar" name="limpar" class=" btn btn-danger">Limpar</button>
                            <input type="hidden" value="envia" name="envia" />
                        </center>
                        </div>
                        <div class="col-md-4">
                        </div>
                    </div>
                    <?php
                        if(isset($_POST['envia'])){
                            $to = "contato@bolaochapada.com.br";
                            $email = $_POST['email'];
                            $usuario = $_POST['usuario'];
                            $assunto = "Ajuda do Bolão";
                            $mensagem = $_POST['mensagem'];
                        
                            $headers = "From: $email";
                            $headers = "From: " . $email . "\r\n";
                            $headers .= "Reply-To: ". $email . "\r\n";
                            $headers .= "MIME-Version: 1.0\r\n";
                            $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
                                                                        
                            $body = "<!DOCTYPE html><html lang='pt'><head><meta charset='utf-8'><title>Contato</title></head><body>";
                            $body .= "<table style='width: 100%;'>";
                            $body .= "<thead style='text-align: center;'><tr><td style='border:none;' colspan='2'>";
                            $body .= "</td></tr></thead><tbody><tr>";
                            $body .= "<td style='border:none;'><strong>usuario:</strong> {$usuario}</td>";
                            $body .= "<td style='border:none;'><strong>Email:</strong> {$email}</td>";
                            $body .= "</tr>";
                            $body .= "<tr><td style='border:none;'><strong>Subject:</strong> {$assunto}</td></tr>";
                            $body .= "<tr><td></td></tr>";
                            $body .= "<tr><td colspan='2' style='border:none;'>{$mensagem}</td></tr>";
                            $body .= "</tbody></table>";
                            $body .= "</body></html>";
                        
                            $send = mail($to, $assunto, $body, $headers);
                            ?>  
                            <br>
                                <div class="alert alert-success" role="alert">
                                    Mensagem enviada com sucesso!
                                </div>
                            <?php
                            
                            if($send === TRUE){
                                header('Location: index.php');
                            }
                        }
                    ?>
                </form>
             </div>
        </div>
	</body>
</html>