<?php

$diretorioModelos ="../../../cadastro-contatos-privado/modelos/";

// função com diversos testes para verificar se a data de nascimento foi informada no formato aaaa-mm-dd
function formatoData($dataNascimento){
    $dataOk = true;
    if(strlen($dataNascimento)!==10 || substr_count($dataNascimento, '-')!==2){
        $dataOk=false;
    }
    if($dataOk){
        $dataArray=explode("-",$dataNascimento);
        if(
            !(is_numeric($dataArray[0]) && strlen($dataArray[0])==4) ||
            !(is_numeric($dataArray[1]) && strlen($dataArray[1])==2) ||
            !(is_numeric($dataArray[2]) && strlen($dataArray[2])==2)
        ){
            $dataOk=false;
        }
        if(!dataCorreta($dataArray)){
            $dataOk = false;
        }
    }
    
    return $dataOk;
}

//verificar se ano informado é bissexto (fevereiro com 29 dias)
function bissexto($ano){
    if(fmod($ano,4)==0){
        if(fmod($ano,100)==0){
            if(fmod($ano,400)==0){
                return true;
            }else{
                return false;
            }
        }else{
            return true;
        }
    } else {
        return false;
    }
}

//verificar se mês tem 31 dias
function mesLongo($mes){
    $mesesLongos=array(1,3,5,7,8,10,12);
    if(in_array($mes,$mesesLongos)){
        return true;
    }else{
        return false;
    }
}

//verificar se data está correta
//Isso é importante para evitar datas como 31 de fevereiro
function dataCorreta($dataAvaliar){
    $avaliar=true;
    if($dataAvaliar[1]>12){
        $avaliar=false;
    }else{
        if(mesLongo($dataAvaliar[1])){
            if($dataAvaliar[2]>31){
                $avaliar=false;
            }
        }else{
            if($dataAvaliar[1]=="02"){
                if(
                    (bissexto($dataAvaliar[0]) && $dataAvaliar[2]>29) ||
                    (!bissexto($dataAvaliar[0]) && $dataAvaliar[2]>28)
                ){
                    $avaliar=false;
                }
            }else{
                if($dataAvaliar[2]>30){
                    $avaliar=false;
                }
            }
        }
    }
    return $avaliar;
}