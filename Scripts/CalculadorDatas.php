<?php
//Calculador de Datas
//Desenvolvido por Bruno Sajermann
//Versão 1.0
//Data: 04.04.2020

header('Content-Type: UTF-8');
setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
setlocale (LC_ALL, 'ptb');
date_default_timezone_set('America/Sao_Paulo');

$foradia = new ForaDia();
$datadodia = new DataDoDia();
$forasemana = new ForaSemana();
$foraquinzena = new ForaQuinzena();
$forames = new ForaMes();
$foradezena = new ForaDezena();

$config = json_decode($_POST['config'], true);

if($config['diasCondicao'] == 'D'){
    $retornoCalculado = $datadodia->calcular($config);
}else if ($config['diasCondicao'] == 'L'){
    $retornoCalculado = $foradia->calcular($config);
}else if ($config['diasCondicao'] == 'S'){
    $retornoCalculado = $forasemana->calcular($config);
}else if ($config['diasCondicao'] == 'Q'){
    $retornoCalculado = $foraquinzena->calcular($config);
}else if ($config['diasCondicao'] == 'F'){
    $retornoCalculado = $forames->calcular($config);
}else if ($config['diasCondicao'] == 'Z'){
    $retornoCalculado = $foradezena->calcular($config);
}else{}
echo $retornoCalculado;

class ForaDia{
   
    public function calcular($config){
        $contandoExploded = explode('/', $config['contando']);
        $makeTimeAPartirDe = mktime(0, 0, 0, $contandoExploded[1], $contandoExploded[0], $contandoExploded[2]);
        
        $diaMaisAjuste0 = is_numeric($config['condicao0']) ? $config['condicao0'] : null;
        $diaMaisAjuste1 = is_numeric($config['condicao1']) ? $config['condicao1'] : null;
        $diaMaisAjuste2 = is_numeric($config['condicao2']) ? $config['condicao2'] : null;
        $diaMaisAjuste3 = is_numeric($config['condicao3']) ? $config['condicao3'] : null;
        $diaMaisAjuste4 = is_numeric($config['condicao4']) ? $config['condicao4'] : null;
        $diaMaisAjuste5 = is_numeric($config['condicao5']) ? $config['condicao5'] : null;
        $diaMaisAjuste6 = is_numeric($config['condicao6']) ? $config['condicao6'] : null;
        $diaMaisAjuste7 = is_numeric($config['condicao7']) ? $config['condicao7'] : null;
        $diaMaisAjuste8 = is_numeric($config['condicao8']) ? $config['condicao8'] : null;
        
        $vencimento0 = utf8_encode(strftime('%A, %d de %B de %Y', strtotime("+{$diaMaisAjuste0} day", $makeTimeAPartirDe)));
        $vencimento1 = utf8_encode(strftime('%A, %d de %B de %Y', strtotime("+{$diaMaisAjuste1} day", $makeTimeAPartirDe)));
        $vencimento2 = utf8_encode(strftime('%A, %d de %B de %Y', strtotime("+{$diaMaisAjuste2} day", $makeTimeAPartirDe)));
        $vencimento3 = utf8_encode(strftime('%A, %d de %B de %Y', strtotime("+{$diaMaisAjuste3} day", $makeTimeAPartirDe)));
        $vencimento4 = utf8_encode(strftime('%A, %d de %B de %Y', strtotime("+{$diaMaisAjuste4} day", $makeTimeAPartirDe)));
        $vencimento5 = utf8_encode(strftime('%A, %d de %B de %Y', strtotime("+{$diaMaisAjuste5} day", $makeTimeAPartirDe)));
        $vencimento6 = utf8_encode(strftime('%A, %d de %B de %Y', strtotime("+{$diaMaisAjuste6} day", $makeTimeAPartirDe)));
        $vencimento7 = utf8_encode(strftime('%A, %d de %B de %Y', strtotime("+{$diaMaisAjuste7} day", $makeTimeAPartirDe)));
        $vencimento8 = utf8_encode(strftime('%A, %d de %B de %Y', strtotime("+{$diaMaisAjuste8} day", $makeTimeAPartirDe)));

        return json_encode((object) array(
            'diaMaisAjuste0' => $diaMaisAjuste0, 
            'diaMaisAjuste1' => $diaMaisAjuste1, 
            'diaMaisAjuste2' => $diaMaisAjuste2, 
            'diaMaisAjuste3' => $diaMaisAjuste3, 
            'diaMaisAjuste4' => $diaMaisAjuste4, 
            'diaMaisAjuste5' => $diaMaisAjuste5, 
            'diaMaisAjuste6' => $diaMaisAjuste6, 
            'diaMaisAjuste7' => $diaMaisAjuste7, 
            'diaMaisAjuste8' => $diaMaisAjuste8, 
            'vencimento0' => $vencimento0, 
            'vencimento1' => $vencimento1, 
            'vencimento2' => $vencimento2, 
            'vencimento3' => $vencimento3, 
            'vencimento4' => $vencimento4, 
            'vencimento5' => $vencimento5, 
            'vencimento6' => $vencimento6, 
            'vencimento7' => $vencimento7, 
            'vencimento8' => $vencimento8,
        ));
    }
}

class DataDoDia{
    
     public function calcular($config){
         $contandoExploded = explode('/', $config['contando']);
         
         $makeTimeAPartirDe = mktime(0, 0, 0, $contandoExploded[1], $contandoExploded[0], $contandoExploded[2]);
         
         $diaMaisAjuste0 = is_numeric($config['condicao0']) ? $config['condicao0'] - 1 : null;
         $diaMaisAjuste1 = is_numeric($config['condicao1']) ? $config['condicao1'] - 1 : null;
         $diaMaisAjuste2 = is_numeric($config['condicao2']) ? $config['condicao2'] - 1 : null;
         $diaMaisAjuste3 = is_numeric($config['condicao3']) ? $config['condicao3'] - 1 : null;
         $diaMaisAjuste4 = is_numeric($config['condicao4']) ? $config['condicao4'] - 1 : null;
         $diaMaisAjuste5 = is_numeric($config['condicao5']) ? $config['condicao5'] - 1 : null;
         $diaMaisAjuste6 = is_numeric($config['condicao6']) ? $config['condicao6'] - 1 : null;
         $diaMaisAjuste7 = is_numeric($config['condicao7']) ? $config['condicao7'] - 1 : null;
         $diaMaisAjuste8 = is_numeric($config['condicao8']) ? $config['condicao8'] - 1 : null;
         
         $vencimento0 = utf8_encode(strftime('%A, %d de %B de %Y', strtotime("+{$diaMaisAjuste0} day", $makeTimeAPartirDe)));
         $vencimento1 = utf8_encode(strftime('%A, %d de %B de %Y', strtotime("+{$diaMaisAjuste1} day", $makeTimeAPartirDe)));
         $vencimento2 = utf8_encode(strftime('%A, %d de %B de %Y', strtotime("+{$diaMaisAjuste2} day", $makeTimeAPartirDe)));
         $vencimento3 = utf8_encode(strftime('%A, %d de %B de %Y', strtotime("+{$diaMaisAjuste3} day", $makeTimeAPartirDe)));
         $vencimento4 = utf8_encode(strftime('%A, %d de %B de %Y', strtotime("+{$diaMaisAjuste4} day", $makeTimeAPartirDe)));
         $vencimento5 = utf8_encode(strftime('%A, %d de %B de %Y', strtotime("+{$diaMaisAjuste5} day", $makeTimeAPartirDe)));
         $vencimento6 = utf8_encode(strftime('%A, %d de %B de %Y', strtotime("+{$diaMaisAjuste6} day", $makeTimeAPartirDe)));
         $vencimento7 = utf8_encode(strftime('%A, %d de %B de %Y', strtotime("+{$diaMaisAjuste7} day", $makeTimeAPartirDe)));
         $vencimento8 = utf8_encode(strftime('%A, %d de %B de %Y', strtotime("+{$diaMaisAjuste8} day", $makeTimeAPartirDe)));
 
         return json_encode((object) array(
             'diaMaisAjuste0' => $diaMaisAjuste0 + 1, 
             'diaMaisAjuste1' => $diaMaisAjuste1 + 1, 
             'diaMaisAjuste2' => $diaMaisAjuste2 + 1, 
             'diaMaisAjuste3' => $diaMaisAjuste3 + 1, 
             'diaMaisAjuste4' => $diaMaisAjuste4 + 1, 
             'diaMaisAjuste5' => $diaMaisAjuste5 + 1, 
             'diaMaisAjuste6' => $diaMaisAjuste6 + 1, 
             'diaMaisAjuste7' => $diaMaisAjuste7 + 1, 
             'diaMaisAjuste8' => $diaMaisAjuste8 + 1, 
             'vencimento0' => $vencimento0, 
             'vencimento1' => $vencimento1, 
             'vencimento2' => $vencimento2, 
             'vencimento3' => $vencimento3, 
             'vencimento4' => $vencimento4, 
             'vencimento5' => $vencimento5, 
             'vencimento6' => $vencimento6, 
             'vencimento7' => $vencimento7, 
             'vencimento8' => $vencimento8,
         ));
     }
 }

 class ForaSemana{
    
    public function calcular($config){
        $contandoExploded = explode('/', $config['contando']);
        $makeTimeAPartirDe = mktime(0, 0, 0, $contandoExploded[1], $contandoExploded[0], $contandoExploded[2]);
        $proximaSemana = new DateTime($contandoExploded[2]."-".$contandoExploded[1]."-".$contandoExploded[0]);//New DateTime tem o padrão Y-m-d
        $proximaSemana->modify('next week');
        $proximaSemana->modify('-1 day');
        $makeTimeProximaSemana = mktime(0, 0, 0,  $proximaSemana->format('m'), $proximaSemana->format('d'), $proximaSemana->format('Y'));//Mktime tem o padrão minutos, segundos, horas, mês, dia, ano;
        
        $dataAPartirDe = new DateTime(date('Y-m-d', $makeTimeAPartirDe));
        $dataProximaSemana = new DateTime(date('Y-m-d', $makeTimeProximaSemana));
        $interval = $dataAPartirDe->diff($dataProximaSemana);
        $interval = $interval->format('%a');


        $diaMaisAjuste0 = is_numeric($config['condicao0']) ? $config['condicao0'] + $interval : null;
        $diaMaisAjuste1 = is_numeric($config['condicao1']) ? $config['condicao1'] + $interval : null;
        $diaMaisAjuste2 = is_numeric($config['condicao2']) ? $config['condicao2'] + $interval : null;
        $diaMaisAjuste3 = is_numeric($config['condicao3']) ? $config['condicao3'] + $interval : null;
        $diaMaisAjuste4 = is_numeric($config['condicao4']) ? $config['condicao4'] + $interval : null;
        $diaMaisAjuste5 = is_numeric($config['condicao5']) ? $config['condicao5'] + $interval : null;
        $diaMaisAjuste6 = is_numeric($config['condicao6']) ? $config['condicao6'] + $interval : null;
        $diaMaisAjuste7 = is_numeric($config['condicao7']) ? $config['condicao7'] + $interval : null;
        $diaMaisAjuste8 = is_numeric($config['condicao8']) ? $config['condicao8'] + $interval : null;
        
        $vencimento0 = utf8_encode(strftime('%A, %d de %B de %Y', strtotime("+{$diaMaisAjuste0} day", $makeTimeAPartirDe)));
        $vencimento1 = utf8_encode(strftime('%A, %d de %B de %Y', strtotime("+{$diaMaisAjuste1} day", $makeTimeAPartirDe)));
        $vencimento2 = utf8_encode(strftime('%A, %d de %B de %Y', strtotime("+{$diaMaisAjuste2} day", $makeTimeAPartirDe)));
        $vencimento3 = utf8_encode(strftime('%A, %d de %B de %Y', strtotime("+{$diaMaisAjuste3} day", $makeTimeAPartirDe)));
        $vencimento4 = utf8_encode(strftime('%A, %d de %B de %Y', strtotime("+{$diaMaisAjuste4} day", $makeTimeAPartirDe)));
        $vencimento5 = utf8_encode(strftime('%A, %d de %B de %Y', strtotime("+{$diaMaisAjuste5} day", $makeTimeAPartirDe)));
        $vencimento6 = utf8_encode(strftime('%A, %d de %B de %Y', strtotime("+{$diaMaisAjuste6} day", $makeTimeAPartirDe)));
        $vencimento7 = utf8_encode(strftime('%A, %d de %B de %Y', strtotime("+{$diaMaisAjuste7} day", $makeTimeAPartirDe)));
        $vencimento8 = utf8_encode(strftime('%A, %d de %B de %Y', strtotime("+{$diaMaisAjuste8} day", $makeTimeAPartirDe)));
 
        return json_encode((object) array(
             'diaMaisAjuste0' => $diaMaisAjuste0 - $interval, 
             'diaMaisAjuste1' => $diaMaisAjuste1 - $interval, 
             'diaMaisAjuste2' => $diaMaisAjuste2 - $interval, 
             'diaMaisAjuste3' => $diaMaisAjuste3 - $interval, 
             'diaMaisAjuste4' => $diaMaisAjuste4 - $interval, 
             'diaMaisAjuste5' => $diaMaisAjuste5 - $interval, 
             'diaMaisAjuste6' => $diaMaisAjuste6 - $interval, 
             'diaMaisAjuste7' => $diaMaisAjuste7 - $interval, 
             'diaMaisAjuste8' => $diaMaisAjuste8 - $interval, 
             'vencimento0' => $vencimento0, 
             'vencimento1' => $vencimento1, 
             'vencimento2' => $vencimento2, 
             'vencimento3' => $vencimento3, 
             'vencimento4' => $vencimento4, 
             'vencimento5' => $vencimento5, 
             'vencimento6' => $vencimento6, 
             'vencimento7' => $vencimento7, 
             'vencimento8' => $vencimento8,
         ));
     }
 }
 class ForaQuinzena{
    public function calcular($config){
        $contandoExploded = explode('/', $config['contando']);
        $mkTimeAPartirDe = mktime(0, 0, 0, $contandoExploded[1], $contandoExploded[0], $contandoExploded[2]);//Mktime tem o padrão minutos, segundos, horas, mês, dia, ano;
         
        if($contandoExploded[0] < 15){
            $dataProximaQuinzena = new DateTime($contandoExploded[2]."-".$contandoExploded[1]."-15");//New DateTime tem o padrão Y-m-d

        }else{
            $dataProximaQuinzena = new DateTime($contandoExploded[2]."-".$contandoExploded[1]."-".$contandoExploded[0]);//New DateTime tem o padrão Y-m-d
            $dataProximaQuinzena->modify('first day of next month'); // Proximo mês
        }

        $mktimeProximaQuinzena = mktime(0, 0, 0,  $dataProximaQuinzena->format('m'), $dataProximaQuinzena->format('d'), $dataProximaQuinzena->format('Y'));//Mktime tem o padrão minutos, segundos, horas, mês, dia, ano;
         
        $dataAPartirDe = new DateTime(date('Y-m-d', $mkTimeAPartirDe));
        $dataProximaQuinzena = new DateTime(date('Y-m-d', $mktimeProximaQuinzena));
        $interval = $dataAPartirDe->diff($dataProximaQuinzena);
        $interval = $interval->format('%a');

        $diaMaisAjuste0 = is_numeric($config['condicao0']) ? $config['condicao0'] + $interval : null;
        $diaMaisAjuste1 = is_numeric($config['condicao1']) ? $config['condicao1'] + $interval : null;
        $diaMaisAjuste2 = is_numeric($config['condicao2']) ? $config['condicao2'] + $interval : null;
        $diaMaisAjuste3 = is_numeric($config['condicao3']) ? $config['condicao3'] + $interval : null;
        $diaMaisAjuste4 = is_numeric($config['condicao4']) ? $config['condicao4'] + $interval : null;
        $diaMaisAjuste5 = is_numeric($config['condicao5']) ? $config['condicao5'] + $interval : null;
        $diaMaisAjuste6 = is_numeric($config['condicao6']) ? $config['condicao6'] + $interval : null;
        $diaMaisAjuste7 = is_numeric($config['condicao7']) ? $config['condicao7'] + $interval : null;
        $diaMaisAjuste8 = is_numeric($config['condicao8']) ? $config['condicao8'] + $interval : null;
        
        $vencimento0 = utf8_encode(strftime('%A, %d de %B de %Y', strtotime("+{$diaMaisAjuste0} day", $mkTimeAPartirDe)));
        $vencimento1 = utf8_encode(strftime('%A, %d de %B de %Y', strtotime("+{$diaMaisAjuste1} day", $mkTimeAPartirDe)));
        $vencimento2 = utf8_encode(strftime('%A, %d de %B de %Y', strtotime("+{$diaMaisAjuste2} day", $mkTimeAPartirDe)));
        $vencimento3 = utf8_encode(strftime('%A, %d de %B de %Y', strtotime("+{$diaMaisAjuste3} day", $mkTimeAPartirDe)));
        $vencimento4 = utf8_encode(strftime('%A, %d de %B de %Y', strtotime("+{$diaMaisAjuste4} day", $mkTimeAPartirDe)));
        $vencimento5 = utf8_encode(strftime('%A, %d de %B de %Y', strtotime("+{$diaMaisAjuste5} day", $mkTimeAPartirDe)));
        $vencimento6 = utf8_encode(strftime('%A, %d de %B de %Y', strtotime("+{$diaMaisAjuste6} day", $mkTimeAPartirDe)));
        $vencimento7 = utf8_encode(strftime('%A, %d de %B de %Y', strtotime("+{$diaMaisAjuste7} day", $mkTimeAPartirDe)));
        $vencimento8 = utf8_encode(strftime('%A, %d de %B de %Y', strtotime("+{$diaMaisAjuste8} day", $mkTimeAPartirDe)));
 
        return json_encode((object) array(
             'diaMaisAjuste0' => $diaMaisAjuste0 - $interval, 
             'diaMaisAjuste1' => $diaMaisAjuste1 - $interval, 
             'diaMaisAjuste2' => $diaMaisAjuste2 - $interval, 
             'diaMaisAjuste3' => $diaMaisAjuste3 - $interval, 
             'diaMaisAjuste4' => $diaMaisAjuste4 - $interval, 
             'diaMaisAjuste5' => $diaMaisAjuste5 - $interval, 
             'diaMaisAjuste6' => $diaMaisAjuste6 - $interval, 
             'diaMaisAjuste7' => $diaMaisAjuste7 - $interval, 
             'diaMaisAjuste8' => $diaMaisAjuste8 - $interval, 
             'vencimento0' => $vencimento0, 
             'vencimento1' => $vencimento1, 
             'vencimento2' => $vencimento2, 
             'vencimento3' => $vencimento3, 
             'vencimento4' => $vencimento4, 
             'vencimento5' => $vencimento5, 
             'vencimento6' => $vencimento6, 
             'vencimento7' => $vencimento7, 
             'vencimento8' => $vencimento8,
         ));
     }
 }
 class ForaMes{
    public function calcular($config){
        $contandoExploded = explode('/', $config['contando']);
        $mkTimeAPartirDe = mktime(0, 0, 0, $contandoExploded[1], $contandoExploded[0], $contandoExploded[2]);//Mktime tem o padrão minutos, segundos, horas, mês, dia, ano;
         
        $dataProximoMes = new DateTime($contandoExploded[2]."-".$contandoExploded[1]."-".$contandoExploded[0]);//New DateTime tem o padrão Y-m-d
        $dataProximoMes->modify('first day of next month'); // Proximo mês


        $mktimeProximoMes = mktime(0, 0, 0,  $dataProximoMes->format('m'), $dataProximoMes->format('d'), $dataProximoMes->format('Y'));//Mktime tem o padrão minutos, segundos, horas, mês, dia, ano;
         
        $dataAPartirDe = new DateTime(date('Y-m-d', $mkTimeAPartirDe));
        $dataProximoMes = new DateTime(date('Y-m-d', $mktimeProximoMes));
        $interval = $dataAPartirDe->diff($dataProximoMes);
        $interval = $interval->format('%a');

        $diaMaisAjuste0 = is_numeric($config['condicao0']) ? $config['condicao0'] + $interval : null;
        $diaMaisAjuste1 = is_numeric($config['condicao1']) ? $config['condicao1'] + $interval : null;
        $diaMaisAjuste2 = is_numeric($config['condicao2']) ? $config['condicao2'] + $interval : null;
        $diaMaisAjuste3 = is_numeric($config['condicao3']) ? $config['condicao3'] + $interval : null;
        $diaMaisAjuste4 = is_numeric($config['condicao4']) ? $config['condicao4'] + $interval : null;
        $diaMaisAjuste5 = is_numeric($config['condicao5']) ? $config['condicao5'] + $interval : null;
        $diaMaisAjuste6 = is_numeric($config['condicao6']) ? $config['condicao6'] + $interval : null;
        $diaMaisAjuste7 = is_numeric($config['condicao7']) ? $config['condicao7'] + $interval : null;
        $diaMaisAjuste8 = is_numeric($config['condicao8']) ? $config['condicao8'] + $interval : null;
        
        $vencimento0 = utf8_encode(strftime('%A, %d de %B de %Y', strtotime("+{$diaMaisAjuste0} day", $mkTimeAPartirDe)));
        $vencimento1 = utf8_encode(strftime('%A, %d de %B de %Y', strtotime("+{$diaMaisAjuste1} day", $mkTimeAPartirDe)));
        $vencimento2 = utf8_encode(strftime('%A, %d de %B de %Y', strtotime("+{$diaMaisAjuste2} day", $mkTimeAPartirDe)));
        $vencimento3 = utf8_encode(strftime('%A, %d de %B de %Y', strtotime("+{$diaMaisAjuste3} day", $mkTimeAPartirDe)));
        $vencimento4 = utf8_encode(strftime('%A, %d de %B de %Y', strtotime("+{$diaMaisAjuste4} day", $mkTimeAPartirDe)));
        $vencimento5 = utf8_encode(strftime('%A, %d de %B de %Y', strtotime("+{$diaMaisAjuste5} day", $mkTimeAPartirDe)));
        $vencimento6 = utf8_encode(strftime('%A, %d de %B de %Y', strtotime("+{$diaMaisAjuste6} day", $mkTimeAPartirDe)));
        $vencimento7 = utf8_encode(strftime('%A, %d de %B de %Y', strtotime("+{$diaMaisAjuste7} day", $mkTimeAPartirDe)));
        $vencimento8 = utf8_encode(strftime('%A, %d de %B de %Y', strtotime("+{$diaMaisAjuste8} day", $mkTimeAPartirDe)));
 
        return json_encode((object) array(
             'diaMaisAjuste0' => $diaMaisAjuste0 - $interval, 
             'diaMaisAjuste1' => $diaMaisAjuste1 - $interval, 
             'diaMaisAjuste2' => $diaMaisAjuste2 - $interval, 
             'diaMaisAjuste3' => $diaMaisAjuste3 - $interval, 
             'diaMaisAjuste4' => $diaMaisAjuste4 - $interval, 
             'diaMaisAjuste5' => $diaMaisAjuste5 - $interval, 
             'diaMaisAjuste6' => $diaMaisAjuste6 - $interval, 
             'diaMaisAjuste7' => $diaMaisAjuste7 - $interval, 
             'diaMaisAjuste8' => $diaMaisAjuste8 - $interval, 
             'vencimento0' => $vencimento0, 
             'vencimento1' => $vencimento1, 
             'vencimento2' => $vencimento2, 
             'vencimento3' => $vencimento3, 
             'vencimento4' => $vencimento4, 
             'vencimento5' => $vencimento5, 
             'vencimento6' => $vencimento6, 
             'vencimento7' => $vencimento7, 
             'vencimento8' => $vencimento8,
         ));
     }
 }
 class ForaDezena{
    public function calcular($config){
        $contandoExploded = explode('/', $config['contando']);
        $mkTimeAPartirDe = mktime(0, 0, 0, $contandoExploded[1], $contandoExploded[0], $contandoExploded[2]);//Mktime tem o padrão minutos, segundos, horas, mês, dia, ano;
         
        if($contandoExploded[0] < 10){
            $dataProximaDezena = new DateTime($contandoExploded[2]."-".$contandoExploded[1]."-10");//New DateTime tem o padrão Y-m-d

        }else if($contandoExploded[0] < 20){
            $dataProximaDezena = new DateTime($contandoExploded[2]."-".$contandoExploded[1]."-20");//New DateTime tem o padrão Y-m-d

        }else{
            $dataProximaDezena = new DateTime($contandoExploded[2]."-".$contandoExploded[1]."-".$contandoExploded[0]);//New DateTime tem o padrão Y-m-d
            $dataProximaDezena->modify('first day of next month'); // Proximo mês
        }

        $mktimeProximaDezena = mktime(0, 0, 0,  $dataProximaDezena->format('m'), $dataProximaDezena->format('d'), $dataProximaDezena->format('Y'));//Mktime tem o padrão minutos, segundos, horas, mês, dia, ano;
         
        $dataAPartirDe = new DateTime(date('Y-m-d', $mkTimeAPartirDe));
        $dataProximaDezena = new DateTime(date('Y-m-d', $mktimeProximaDezena));
        $interval = $dataAPartirDe->diff($dataProximaDezena);
        $interval = $interval->format('%a');

        $diaMaisAjuste0 = is_numeric($config['condicao0']) ? $config['condicao0'] + $interval : null;
        $diaMaisAjuste1 = is_numeric($config['condicao1']) ? $config['condicao1'] + $interval : null;
        $diaMaisAjuste2 = is_numeric($config['condicao2']) ? $config['condicao2'] + $interval : null;
        $diaMaisAjuste3 = is_numeric($config['condicao3']) ? $config['condicao3'] + $interval : null;
        $diaMaisAjuste4 = is_numeric($config['condicao4']) ? $config['condicao4'] + $interval : null;
        $diaMaisAjuste5 = is_numeric($config['condicao5']) ? $config['condicao5'] + $interval : null;
        $diaMaisAjuste6 = is_numeric($config['condicao6']) ? $config['condicao6'] + $interval : null;
        $diaMaisAjuste7 = is_numeric($config['condicao7']) ? $config['condicao7'] + $interval : null;
        $diaMaisAjuste8 = is_numeric($config['condicao8']) ? $config['condicao8'] + $interval : null;
        
        $vencimento0 = utf8_encode(strftime('%A, %d de %B de %Y', strtotime("+{$diaMaisAjuste0} day", $mkTimeAPartirDe)));
        $vencimento1 = utf8_encode(strftime('%A, %d de %B de %Y', strtotime("+{$diaMaisAjuste1} day", $mkTimeAPartirDe)));
        $vencimento2 = utf8_encode(strftime('%A, %d de %B de %Y', strtotime("+{$diaMaisAjuste2} day", $mkTimeAPartirDe)));
        $vencimento3 = utf8_encode(strftime('%A, %d de %B de %Y', strtotime("+{$diaMaisAjuste3} day", $mkTimeAPartirDe)));
        $vencimento4 = utf8_encode(strftime('%A, %d de %B de %Y', strtotime("+{$diaMaisAjuste4} day", $mkTimeAPartirDe)));
        $vencimento5 = utf8_encode(strftime('%A, %d de %B de %Y', strtotime("+{$diaMaisAjuste5} day", $mkTimeAPartirDe)));
        $vencimento6 = utf8_encode(strftime('%A, %d de %B de %Y', strtotime("+{$diaMaisAjuste6} day", $mkTimeAPartirDe)));
        $vencimento7 = utf8_encode(strftime('%A, %d de %B de %Y', strtotime("+{$diaMaisAjuste7} day", $mkTimeAPartirDe)));
        $vencimento8 = utf8_encode(strftime('%A, %d de %B de %Y', strtotime("+{$diaMaisAjuste8} day", $mkTimeAPartirDe)));
 
        return json_encode((object) array(
             'diaMaisAjuste0' => $diaMaisAjuste0 - $interval, 
             'diaMaisAjuste1' => $diaMaisAjuste1 - $interval, 
             'diaMaisAjuste2' => $diaMaisAjuste2 - $interval, 
             'diaMaisAjuste3' => $diaMaisAjuste3 - $interval, 
             'diaMaisAjuste4' => $diaMaisAjuste4 - $interval, 
             'diaMaisAjuste5' => $diaMaisAjuste5 - $interval, 
             'diaMaisAjuste6' => $diaMaisAjuste6 - $interval, 
             'diaMaisAjuste7' => $diaMaisAjuste7 - $interval, 
             'diaMaisAjuste8' => $diaMaisAjuste8 - $interval, 
             'vencimento0' => $vencimento0, 
             'vencimento1' => $vencimento1, 
             'vencimento2' => $vencimento2, 
             'vencimento3' => $vencimento3, 
             'vencimento4' => $vencimento4, 
             'vencimento5' => $vencimento5, 
             'vencimento6' => $vencimento6, 
             'vencimento7' => $vencimento7, 
             'vencimento8' => $vencimento8,
         ));
     }
 }