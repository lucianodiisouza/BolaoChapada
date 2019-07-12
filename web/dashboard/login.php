<?php
    // Inicia a sessão
    session_start();
    require('_header.php');
?>
<!doctype html>
<html>
	<head>
		<meta charset="UTF-8">		
		<title>Login Administrativo - Bolão Chapada</title>
	</head>
	<body>
        <div class="container">
            <div class="block_login">
                <br><br><br><br>
                 <center>
                     <img src="img/bg.png" alt="Bolão Chapada" title="Bolão Chapada" style="width: 128px; height: 128px;">
                 </center>
                 <form action="index.php" method="post">
                     <div class="row">
                         <div class="col-md-4">
                         </div>
                         <div class="col-md-4">
                             <input type="text" name="usuario" placeholder="usuário" class="form-control" required><br>
                         </div>
                         <div class="col-md-4">
                         </div>
                     </div>    
                     <div class="row">
                         <div class="col-md-4">
                         </div>
                         <div class="col-md-4">
                             <input type="password" name="senha" placeholder="senha" class="form-control" required><br>
                         </div>
                         <div class="col-md-4">
                         </div>
                     </div>
                     <?php if ( ! empty( $_SESSION['login_erro'] ) ) :?>					
                     <?php echo $_SESSION['login_erro'];?>
                     <?php $_SESSION['login_erro'] = ''; ?>
                     <?php endif; ?>
                     <div class="row">
                         <div class="col-md-4">
                         </div>
                         <div class="col-md-4">
                            <center>
                                <button type="submit" value="Entrar" name="entrar" class=" btn btn-primary">Entrar</button>
                                <button type="reset" value="Limpar" name="limpar" class=" btn btn-danger">Limpar</button
                            </center>
                         </div>
                         <div class="col-md-4">
                         </div>
                     </div>
                 </form>
             </div>
        </div>
	</body>
</html>