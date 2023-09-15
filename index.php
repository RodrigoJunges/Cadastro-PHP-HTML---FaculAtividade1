<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@200;300;400;500;600&family=Open+Sans&family=Oswald:wght@200;300;400;500;600;700&family=Poppins:wght@200;300;400;500;600;700;800&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap');
    .error {
      color: #FF0000;
    }
    
    *{
      margin: 0; 
      padding: 0; 
      box-sizing: 
      border-box; 
      font-family: 'Roboto', sans-serif;
    }

    h2{
      font-size: 30px;
    }

    .form{
      font-size: 22px;
    }
  </style>
  <title>Cadastro de Música</title>
</head>

<body>  

  <?php
    
    // define variables and set to empty values
    $nomeInterpreteErr = $nomeAlbumErr = $tipoArquivoErr = $dataCompraErr = $valorCompraErr = "";
    $nomeInterprete = $nomeAlbum = $tipoArquivo = $comment = $dataCompra = $valorCompra = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {
      if (empty($_POST["nomeInterprete"])) {
        $nomeInterpreteErr = "nome é obrigatório.";
      } else {
        $nomeInterprete = test_input($_POST["nomeInterprete"]);
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z-' ]*$/",$nomeInterprete)) {
          $nomeInterpreteErr = "Only letters and white space allowed";
        }
      }

      if (empty($_POST["nomeAlbum"])) {
        $nomeAlbumErr = "nome é obrigatório.";
      } else {
        $nomeAlbum = test_input($_POST["nomeAlbum"]);
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z-' ]*$/",$nomeAlbum)) {
          $nomeAlbumErr = "Only letters and white space allowed";
        }
      }
        
      if (empty($_POST["dataCompra"])) {
        $dataCompraErr = "nome é obrigatório.";
      } else {
        $dataCompra = test_input($_POST["dataCompra"]);
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z-' ]*$/",$dataCompra)) {
          $dataCompraErr = "Deve ser dia, mês e ano (dois dígitos) - separados por barra. Ex.: xx/xx/xx";
        }
      }

      if (empty($_POST["valorCompra"])) {
        $valorCompraErr = "nome é obrigatório.";
      } else {
        $valorCompra = test_input($_POST["valorCompra"]);
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z-' ]*$/",$valorCompra)) {
          $valorCompraErr = "Deve ser dia, mês e ano (dois dígitos) - separados por barra. Ex.: xx/xx/xx";
        }
      }
          
      

      if (empty($_POST["comment"])) 
      {
        $comment = "";
      } else 
        {
          $comment = test_input($_POST["comment"]);
        }

      if (empty($_POST["tipoArquivo"])) {
        $tipoArquivoErr = "O tipo de arquivo é obrigatório.";
      } else 
        {
          $tipoArquivo = test_input($_POST["tipoArquivo"]);
        }
    }

    function test_input($data) 
    {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }
  ?>

  
      <h2>Cadastro de Músicas</h2>
      <br>
        <p><span class="error">* Campos Obrigatórios</span></p>
        <br>
        <form class="form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
        <br>           
            Nome do Intérprete: <input type="text" name="nomeInterprete" value="<?php echo $nomeInterprete;?>">
            <span class="error">* <?php echo $nomeInterpreteErr;?></span>

            <br>
            <br>

            Name do Álbum: <input type="text" name="nomeAlbum" value="<?php echo $nomeAlbum;?>">
            <span class="error">* <?php echo $nomeAlbumErr;?></span>

            <br>
            <br>

            Data da Compra: <input type="date" name="dataCompra" value="<?php echo $dataCompra;?>">
            
            <br>
            <br>

            Valor da Compra: <input type="value" name="valorCompra" placeholder="R$--,--" value="<?php echo $valorCompra;?>">
            
            <br>
            <br>
                       
            Observação: <textarea name="comment"><?php echo $comment;?></textarea>
          
            <br>
            <br>
            
          Tpo de arquivo: <input type="radio" name="tipoArquivo" <?php if (isset($tipoArquivo) && $tipoArquivo=="CD") echo "checked";?> value="CD">
            
          CD <input type="radio" name="tipoArquivo" <?php if (isset($tipoArquivo) && $tipoArquivo=="DVD") echo "checked";?> value="DVD">

          DVD   <input type="radio" name="tipoArquivo" <?php if (isset($tipoArquivo) && $tipoArquivo=="Vinil") echo "checked";?> value="Vinil">

          Vinil <input type="radio" name="tipoArquivo" <?php if (isset($tipoArquivo) && $tipoArquivo=="K7") echo "checked";?> value="K7">

          K7   <input type="radio" name="tipoArquivo" <?php if (isset($tipoArquivo) && $tipoArquivo=="Outros") echo "checked";?> value="Outros">
          
          Outros  <span class="error">* <?php echo $tipoArquivoErr;?></span>
          

          <br>
          <br>

          <input type="submit" name="submit" value="Cadastrar">  
        </form>

        <br>

    <?php
      echo "<h2>Seu cadastro realizado foi:</h2>";
      echo "<br>";
      echo "<h3>O nome do intérprete é:</h3>";
      echo $nomeInterprete;
      echo "<br>";
      echo "<h3>O nome do álbum é:</h3>";
      echo $nomeAlbum;
      echo "<br>";
      echo "<h3>A data da compra é:</h3>";
      echo $dataCompra;
      echo "<br>";
      echo "<h3>O valor da compra é:</h3>";
      echo $valorCompra;
      echo "<br>";
      echo "<h3>Observação:</h3>";
      echo $comment;
      echo "<br>";
      echo "<h3>O tipo de arquivo é:</h3>";
      echo $tipoArquivo;
    ?>

  </body>
</html>