<?php

    //Retorla la url del proyecto
	function base_url()
	{
		return BASE_URL;
	}

    function media()
    {
        return BASE_URL."Assets";
    }

    //Muestra información formateada
	function dep($data)
    {
        $format  = print_r('<pre>');
        $format .= print_r($data);
        $format .= print_r('</pre>');
        return $format;
    }

    //Elimina exceso de espacios entre palabras
    function strClean($strCadena){
        $string = preg_replace(['/\s+/','/^\s|\s$/'],[' ',''], $strCadena);
        $string = trim($string); //Elimina espacios en blanco al inicio y al final
        $string = stripslashes($string); // Elimina las \ invertidas
        $string = str_ireplace("<script>","",$string);
        $string = str_ireplace("</script>","",$string);
        $string = str_ireplace("<script src>","",$string);
        $string = str_ireplace("<script type=>","",$string);
        $string = str_ireplace("SELECT * FROM","",$string);
        $string = str_ireplace("DELETE FROM","",$string);
        $string = str_ireplace("INSERT INTO","",$string);
        $string = str_ireplace("SELECT COUNT(*) FROM","",$string);
        $string = str_ireplace("DROP TABLE","",$string);
        $string = str_ireplace("OR '1'='1","",$string);
        $string = str_ireplace('OR "1"="1"',"",$string);
        $string = str_ireplace('OR ´1´=´1´',"",$string);
        $string = str_ireplace("is NULL; --","",$string);
        $string = str_ireplace("is NULL; --","",$string);
        $string = str_ireplace("LIKE '","",$string);
        $string = str_ireplace('LIKE "',"",$string);
        $string = str_ireplace("LIKE ´","",$string);
        $string = str_ireplace("OR 'a'='a","",$string);
        $string = str_ireplace('OR "a"="a',"",$string);
        $string = str_ireplace("OR ´a´=´a","",$string);
        $string = str_ireplace("OR ´a´=´a","",$string);
        $string = str_ireplace("--","",$string);
        $string = str_ireplace("^","",$string);
        $string = str_ireplace("[","",$string);
        $string = str_ireplace("]","",$string);
        $string = str_ireplace("==","",$string);
        return $string;
    }
    function JsonResponse(array $arryData, int $code){
        if (is_array($arryData)) {
            header("HTTP/1.1 $code");
            header("Content-Type: application/json");  
    
            echo json_encode($arryData, true);
    
            // Salir después de enviar la respuesta JSON
            exit;
        } else {
            // Manejo de errores si $arryData no es un array
            header("HTTP/1.1 500 Internal Server Error");
            header("Content-Type: application/json");
    
            echo json_encode(['error' => 'Datos no válidos'], true);
    
            // Salir después de enviar la respuesta JSON de error
            exit;
        }
    }
    
    function testString(string $date){
        $re='/[a-zA-ZÑñÁáÉéÍíÓóÚúÜü\s]+$/m';
        if (preg_match($re,$date)) {
            return true;
        }else{
            return false;
        }
    }
    function testNumber(string $numero){
        $re='/ [0-9]+$/m';
        if (preg_match($re,$numero)) {
            return true;
        }else{
            return false;
        }
    }
    function testEmail(string $email) {
        $re = '/^[a-zA-Z0-9-]+(\.[_a-zA-Z0-9-]+)*@[a-zA-Z0-9-]+(\.[a-zA-Z0-9-]+)*(\.[a-zA-Z]{2,3})$/';
        if (preg_match($re, $email)) {
            return true;
        } else {
            return false;
        }
    }
    

?>