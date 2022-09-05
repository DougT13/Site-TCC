<?php 

    if (isset($_POST['submit'])) 
    {
        //print_r($_POST['nome_produto']);
        //print_r($_POST['valor']);
        //print_r($_POST['quant']);
        //print_r($_POST['descricao']);

        include_once ('config.php');

        $nome_produto = $_POST['nome_produto'];
        $IDEstabelecimento = "1";
        $valor = $_POST['valor'];
        $quant = $_POST['quant'];
        $descricao = $_POST['descricao'];

        $conexao = mysqli_query($conexao, "
            INSERT INTO Produtos(IDProduto, IDEstabelecimento, nome_produto,valor,quant,descricao) 
            VALUES('null','$IDEstabelecimento','$nome_produto', '$valor', '$quant', '$descricao')");
    }
    //($_POST['null'],$_POST['1'],$_POST['nome_produto'], '$_POST['valor']', '$_POST['quant']', '$_POST['descricao']')
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Itens</title>
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
        .submit{
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
        .submit:hover{
            background-color: #ffb515;
        }
    </style>
</head>
<body>
    <div class="box">
        <form action="formulario.php" method="POST">
            <fieldset>
                <legend><b>Adicionar Produto</b></legend>
                <br>
                <div class="inputBox">
                    <input type="text" name="nome_produto" id="nome_produto" class="inputUser" required>
                    <label for="nome_produto" class="labelInput">Produto</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="number" name="valor" id="valor" class="inputUser" required>
                    <label for="valor" class="labelInput">Valor</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="number" name="quant" id="quant" class="inputUser" required>
                    <label for="quant" class="labelInput">Quantidade</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="descricao" id="descricao" class="inputUser" required>
                    <label for="descricao" class="labelInput">Descrição do Produto</label>
                </div>
                
                <br><br>
                <input type="submit" class="submit" value="Registrar" name="submit" id="submit">
                <br><br>
                <button onclick="window.location.href='Gerenciamento.php'" style="text-decoration: none;" class="submit">Voltar</button>
            </fieldset>
        </form>
    </div>
</body>
</html>