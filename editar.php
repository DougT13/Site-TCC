<?php 

    if (!empty($_GET['IDProduto'])) 
    {

        include_once ('config.php');

        $IDProduto = $_GET['IDProduto'];

        $sqlSelect = "SELECT * FROM Produtos WHERE IDProduto=$IDProduto";

        $result = $conexao->query($sqlSelect);

        if($result->num_rows > 0){

            while($user_data = mysqli_fetch_assoc($result)){

                $nome_produto = $user_data['nome_produto'];
                $IDEstabelecimento = "1";
                $valor = $user_data['valor'];
                $quant = $user_data['quant'];
                $descricao = $user_data['descricao'];
            }

        }else 
        {
            header('location: Gerenciamento.php');
        }
    }
 ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário | GN</title>
    <style>
        body{
            font-family: Arial, Helverica, sans-serif;
            background-image: linear-gradient(to right, rgb(225, 147, 220), rgb(218, 165, 32));
        }
        .box{
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: rgba(255, 255, 255, 0.8);
            padding: 15px;
            border-radius: 15px;
            width: 20%;
        }
        fieldset{
            border: 3px solid #ffd700;
        }
        legend{
            border: 1px solid #ffd700;
            padding: 10px;
            text-align: center;
            background-color: #ffd700;
            border-radius: 5px;
            color: black;
        }
        .inputBox{
            position: relative;
        } 
        .inputUser{
            background: none;
            border: none;
            border-bottom: 1px solid black;
            outline: none;
            color: black;
            font-size: 15px;
            width: 100%;
            letter-spacing: 2px;
        }
        .labelInput{
            position: absolute;
            top: 0px;
            left: 0px;
            pointer-events: none;
            transition: .5s;
        }
        .inputUser:focus ~ .labelInput, 
        .inputUser:valid ~ .labelInput{
            top: -20px;
            font-size: 12px;
            color: rgb(225, 147, 220);
        }
        .update{
            background-color: #ffd700;
            width: 100%;
            border: none;
            padding: 15px;
            color: black;
            font-size: 15px;
            cursor: pointer;
            border-radius: 10px;
            font-weight: bold;
        }
        .update:hover{
            background-color: #ffb515;
        }
    </style>
</head>
<body>
    <div class="box">
        <form action="saveEdit.php" method="POST">
            <fieldset>
                <legend><b>Fórmulário de Clientes</b></legend>
                <br>
                <div class="inputBox">
                    <input type="text" name="nome_produto" id="nome_produto" class="inputUser" value="<?php echo $nome_produto ?>" required>
                    <label for="nome_produto" class="labelInput">Produto</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="number" name="valor" id="valor" class="inputUser" value="<?php echo $valor ?>" required>
                    <label for="valor" class="labelInput">Valor</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="number" name="quant" id="quant" class="inputUser" value="<?php echo $quant ?>" required>
                    <label for="quant" class="labelInput">Quantidade</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="descricao" id="descricao" class="inputUser" value="<?php echo $descricao ?>" required>
                    <label for="descricao" class="labelInput">Descrição do Produto</label>
                </div>
                
                <br><br>
                <input type="hidden" name="IDProduto" value="<?php echo $IDProduto ?>">


                <input type="submit" class="update" name="update" id="update" value="Alterar">
                <br><br>
                <button onclick="window.location.href='Gerenciamento.php'" style="text-decoration:none;" class="update">Voltar</button>
            </fieldset>
        </form>
    </div>
</body>
</html>