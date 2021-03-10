<?php

/**
 * @var string $searchText testo da cercare nella chiave taskName
 * @var array $taskList elenco delle task dove cercare
 * @return array $result un nuovo array con le task che rispettano il criterio
 */
function _searchText($searchText)
{
    //$searchText = variabile locale 
    //con 'use' diciamo alla funzioni interna di prendersi $searchText e usarla come variabile locale sua
    //programmazione funzionale - dichiarativo
    return function($taskItem) use ($searchText){

        $result = strpos($taskItem['taskName'],$searchText) !== false; 
        return $result; //il risultato e' un booleano
    };
}

//arry filter (la callback passa 1 valore e deve restituire un booleano)
// imperativo
/**
 * @var string $searchText testo da cercare nella chiave taskName
 * @var array $taskList elenco delle task dove cercare
 * @return array $result un nuovo array con le task che rispettano il criterio
 */
function searchText(string $searchText,array $taskList){

    $result=[];
    foreach ($taskList as $taskitem) {
        if(strpos($taskitem['taskName'],$searchText)!== false){
            $result[]=$taskitem; //se si mette []= si indica automaticamente un push nell'array
        }
    }
}