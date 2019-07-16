<!-- Arquivo de índice da aplicação  -->
<?php require('../_header_sub.php'); ?>
<link rel="stylesheet" type="text/css" href="../css/dashboard.css">
<?php require('../_navegar_sub.php'); ?>
<div class="container-fluid" style="width: 98% !important;">
<br>
<br>
<br>
	<div class="header_coluna">
		<h4>Palpites</h4>
	</div>
        <hr>
        <!-- collapse do palpite -->
        <div class="accordion" id="accordionPalpite">
            <div class="card">
                <!-- parte de fora -->
                <div class="card-header" id="headingPalpite">
                    <h2 class="mb-0">
                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapsePalpite" aria-expanded="true" aria-controls="collapsePalpite">
                        Palpite de Fulano
                        </button>
                    </h2>
                </div>
                <!-- parte de fora -->
                <!-- parte de dentro -->
                <div id="collapsePalpite" class="collapse show" aria-labelledby="headingPalpite" data-parent="#accordionPalpite">
                    <div class="card-body">
                        Informações do palpite do fulano
                    </div>
                </div>
                <!-- parte de dentro -->
            </div>
            <!--  -->
</div>
<?php require('../_footer.php') ?>


