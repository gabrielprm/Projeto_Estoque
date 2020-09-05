<?php 
include("menu.php");
include("php/db.class.php");
include("php/dbconnect.php");

    $objDB = new db();
    $objDB->dbConnect($strServer, $strUser, $strPass, $strDB);

    $strTable = "produto";
    $SQL = "*";
	$objDB->dbSelectNo($strTable, $SQL);
	$numTotal = mysqli_num_rows($objDB->resultado);
	if ($numTotal > 0) {
        $table = "";
		for ($i = 0; $i < $numTotal; $i++) {
            $id = $objDB->mysqli_result($objDB->resultado, $i, "id_produto");
			$nome =  $objDB->mysqli_result($objDB->resultado, $i, "nome_produto");
			$qtd =  $objDB->mysqli_result($objDB->resultado, $i, "qtd_produto");	
            $marca =  $objDB->mysqli_result($objDB->resultado, $i, "marca_produto");	
            $cond =  $objDB->mysqli_result($objDB->resultado, $i, "condicao_produto");	
            $cat =  $objDB->mysqli_result($objDB->resultado, $i, "categoria_produto");	
            $hdID = base64_encode($id);
            
            $table .= 
            "<tr>
                <td>$nome</td>
                <td>$marca</td>
                <td>$cond</td>
                <td>$cat</td>
                <td>$qtd</td>
                <td class=\"center aligned\">
                    <div class=\"ui buttons\">
                        <form action=\"cadastro_produto.php\" method=\"POST\" id=\"editUser\">
                            <input type=\"hidden\" name=\"id\" value=\"$hdID\">
                            <button class=\"ui button yellow submit\">Editar</button>
                        </form>       
                        <div class=\"or\" data-text=\"OU\"></div>
                        <a class=\"ui button negative\" href=\"cadastro_produto.php\">Deletar</a>
                    </div>
                </td>
            </tr>";		
        }
    }

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <!-- Metas Padrões -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    <meta name="language" content="pt-br" />
    <!-- Metas Descritivos -->
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="company" content="">
    <meta name="author" content="Phytoline & Gabriel_PRM" />
    <!-- Titulo & Favicon -->
    <title>Produtos | Sistema Controle de Estoque - SCE</title>
    <meta name="title" content="Produtos | Sistema Controle de Estoque - SCE" />
    <link rel="shortcut icon" href="" type="image/x-icon">
    <link rel="icon" href="" type="image/x-icon">
    <!-- Framework Semantic UI -->
    <link rel="stylesheet" href="assets/theme/semantic.min.css">
    <!-- Style Custom -->
    <link rel="stylesheet" href="assets/css/style_custom_dashboard.css">
    <!-- Dependecias JS -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/theme/semantic.min.js"></script>
    <!-- Script Custom -->
    <script src="assets/js/script_custom_dashboard.js"></script>
    <!--Scripts DataTable-->
    <script src="assets/plugins/DataTables/DataTables-1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="assets/plugins/DataTables/DataTables-1.10.21/js/dataTables.semanticui.min.js"></script>
    <script src="assets/plugins/DataTables/Responsive-2.2.5/js/dataTables.responsive.min.js"></script>
    <script src="assets/plugins/DataTables/Responsive-2.2.5/js/responsive.semanticui.min.js"></script>
    <script src="assets/plugins/DataTables/datatables.min.js"></script>
    <script src="assets/plugins/DataTables/Buttons-1.6.2/js/buttons.semanticui.min.js"></script>
    <script src="assets/plugins/DataTables/JSZip-2.5.0/jszip.min.js"></script>
    <script src="assets/plugins/DataTables/pdfmake-0.1.36/pdfmake.min.js"></script>
    <script src="assets/plugins/DataTables/pdfmake-0.1.36/vfs_fonts.js"></script>
    <!--Styles DataTable-->
    <link rel="stylesheet" href="assets/plugins/DataTables/DataTables-1.10.21/css/dataTables.semanticui.min.css">
    <link rel="stylesheet" href="assets/plugins/DataTables/Responsive-2.2.5/css/responsive.semanticui.min.css">
    <link rel="stylesheet" href="assets/plugins/DataTables/Buttons-1.6.2/css/buttons.semanticui.min.css">
</head>

<body>
    <div class="ui grid container segment">
        <div class="row one column">
            <div class="column">
                <table class="ui striped celled table display responsive nowrap unstackable grey-table" style="width:100%">
                    <thead>
                        <tr>
                            <th>PRODUTO</th>
                            <th>MARCA</th>
                            <th>CONDIÇÃO</th>
                            <th>CATEGORIA</th>
                            <th>QUANTIDADE</th>
                            <th>AÇÃO</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?= $table ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>
</body>

</html>