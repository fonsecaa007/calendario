<?php
    //Configurando o fuso horário
    date_default_timezone_set('America/Sao_Paulo');

    //Obtendo os meses anteriores e posteriores
    if(isset($_GET['mes'])) {
        $mes = $_GET['mes'];
    }
    else {
        //Este mês
        $mes = date('Y-m');
    }

    // Checando o formato de hora
    $timestamp = strtotime($mes. '-01');
    if($timestamp === false) {
        $mes = date('Y-m-d');
    }

    //setando o dia atual
    $hoje = date('Y-m-j', time());

    // Setando o título da tag <h3>
    $titulo = date('Y / m', $timestamp);
    
    // Criando os links dos meses anteriores e posteriores
    // mktime(hour, minute, second, mounth, day, year)
    $anterior = date('Y-m', mktime(0, 0, 0, date('m', $timestamp)-1, 1, date('Y', $timestamp)));
    $proximo = date('Y-m', mktime(0, 0, 0, date('m', $timestamp)+1, 1, date('Y', $timestamp)));

    // Contagem dos dias dos mês
    $cont_dias = date('t', $timestamp);

    //Definido os dias da semana -> 0:Dom 1:Seg 2:Ter 3:Qua 4:Qui 5:Sex 6:Sab
    $dias = date ('w', mktime(0, 0, 0, date('m', $timestamp), 1, date('Y' , $timestamp)));
    
    // Criando Calendario
    $semana = [];
    $semana = '';

    // Adiciona as células vazias
    $semana .= str_repeat ('<td><td>', $dias); 

    for ($dia = 1, $dia <= $cont_dias, $dia++, $dias++) {
        $data = $mes . '-' . $dia;
    }
    else {
        $semana .= '<td>' . $dia;
    }
    $semana .= '<td>';

    // Verificando o final de semana
    if ($dias)
?>