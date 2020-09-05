<?php 
 include("php/db.class.php");
 include("php/dbconnect.php");
 
$objDB = new db();
$objDB->dbConnect($strServer, $strUser, $strPass, $strDB);
    if(isset($_POST) && !empty($_POST)){
            $id = base64_decode($_POST['id']); 
            $strTable = "usuario";
            $SQL = "*";
            $where = "LEFT JOIN perfil on perfil.id_perfil = usuario.id_perfil WHERE id_usuario = '$id' ";
            $objDB->dbSelect($strTable, $SQL, $where);
            $numTotal = mysqli_num_rows($objDB->resultado);
            if ($numTotal > 0) {
                $name =  $objDB->mysqli_result($objDB->resultado, 0, "nome");
                $cpf = $objDB->mysqli_result($objDB->resultado, 0, "cpf_usuario");
                $username =  $objDB->mysqli_result($objDB->resultado, 0, "login");
                $password = $objDB->mysqli_result($objDB->resultado, 0, "senha");
                $cargo =  $objDB->mysqli_result($objDB->resultado, 0, "id_perfil");	
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
    <title>Cadastro Usuário | Sistema Controle de Estoque - SCE</title>
    <meta name="title" content="Cadastro Usuário | Sistema Controle de Estoque - SCE" />
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
</head>

<body>
    <!-- Menu Lateral -->
    <div class="ui vertical sidebar menu grey inverted">
        <div class="item">
            <div class="header">Estoque</div>
            <div class="menu">
                <a class="item" href="estoque_entrada.php">Entrada</a>
                <a class="item" href="estoque_saida.php">Saída</a>
                <a class="item" href="estoque_balanco.php">Balanço</a>
            </div>
        </div>
        <div class="item">
            <div class="header">Produtos</div>
            <div class="menu">
                <a class="item" href="cadastro_produto.php">Cadastro</a>
                <a class="item" href="produtos.php">Gerenciamento</a>
            </div>
        </div>
        <div class="item">
            <div class="header">Usuários</div>
            <div class="menu">
                <a class="item" href="cadastro_usuario.php">Cadastro</a>
                <a class="item" href="usuarios.php">Gerenciamento</a>
            </div>
        </div>
    </div>
    <!-- Conteudo da Página -->
    <div class="pusher">
        <!-- Menu Fixo -->
        <div class="ui container fluid">
            <div class="ui top fixed menu stackable grey inverted">
                <a class="item mobileMenu">
                    <i class="sidebar icon large"></i> Menu
                </a>
                <div class="item header">
                    <i class="dolly flatbed icon large"></i> Sistema Controle de Estoque
                </div>
                <div class="menu right">
                    <div class="item header">
                        <i class="user circle icon large"></i> Olá, Administrador
                    </div>
                    <a href="index.php" class="item">
                        <i class="sign-out icon large"></i> Sair
                    </a>
                </div>
            </div>
        </div>
        <!-- Painel de Navegação de Trilha -->
        <div class="ui grid container segment">
            <div class="row one column">
                <div class="column">
                    <div class="ui breadcrumb big">
                        <a class="section" href="dashboard.php">Sistema Controle de Estoque - SCE</a>
                        <i class="right chevron icon divider"></i>
                        <a class="section" href="usuarios.php">Usuários</a>
                        <i class="right arrow icon divider"></i>
                        <a class="section active">Cadastro Usuário</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Funcionalidades/Funções -->
        <div class="ui grid container segment">
            <div class="row one column stackable">
                <div class="column">
                    <form action="backend/cadastrar_usuario.php" method="POST" class="ui form">
                        <h2 class="ui dividing header"><?=(isset($id) && !empty($id))?'Atualização':'Cadastro'?> de Usuário</h2>
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <div class="fields">
                            <div class="twelve wide field required">
                                <label>Nome completo:</label>
                                <input type="text" name="nome" placeholder="John" value="<?=(isset($name))?$name:''?>">
                            </div>
                            <div class="four wide field required">
                                <label>CPF:</label>
                                <input type="text" name="cpf" placeholder="xxx.xxx.xxx-xx" value="<?=(isset($cpf))?$cpf:''?>">
                            </div>
                        </div>
                        <div class="equal width fields">
                            <div class="field required">
                                <label>Nome de usuário:</label>
                                <input type="text" name="username" placeholder="john" value="<?=(isset($username))?$username:''?>">
                            </div>
                            <div class="field required">
                                <label>Senha:</label>
                                <input type="text" name="password" placeholder="*********" value="<?=(isset($password))?$password:''?>">
                            </div>
                            <div class="field required">
                                <label>Cargo:</label>
                                <select class="ui search dropdown" name="cargo">
                                    <option value="" <?=(isset($cargo) == '')?'selected':''?>></option>
                                    <option value="1" <?=(isset($cargo)== '1')?'selected':''?>>Dono</option>
                                    <option value="2" <?=(isset($cargo) == '2')?'selected':''?>>Gerente</option>
                                    <option value="3" <?=(isset($cargo) == '3')?'selected':''?>>Atendente</option>
                                    <option value="4" <?=(isset($cargo) == '4')?'selected':''?>>Mecânico</option>
                                </select>
                            </div>
                        </div>
                        <div>
                            <button class="ui animated button grey right floated large" type="submit" tabindex="0">
                                <div class="hidden content">
                                    <i class="save icon"></i>
                                </div>
                                <div class="visible content">
                                    Salvar
                                </div>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>