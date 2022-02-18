<html>
	<head>
		<title>.:: EJEMPLO PHP::.</title>
	</head>
	<body>
        <form method="post">
            Ingrese un número:&nbsp;<input type="text" name="valor">
            <br><br>
            <input type="submit" value="Calcular factorial">
        </form>
		<?php
            //print_r($_POST);
            if(array_key_exists('valor',$_POST)){
                $numero = $_POST['valor'];
                /*$numero = 6;

                echo "El valor de la variable es: ".$numero;

                if($numero % 2 == 0){
                    echo "El número es par"
                }else{
                    echo "El número es impar"
                } */

                $acumulador = 1;

                for($i = $numero;$i >= 1;$i--){
                    $acumulador = $acumulador * $i;
                }

                echo "	El factorial del número ".$numero." es: ".$acumulador;
            }            
		?>
	</body>
</html>