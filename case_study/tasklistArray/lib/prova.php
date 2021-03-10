<?php

$lista = ['zio', 'nonno', 'cane'];

function saluta($nome){
    echo "ciao $nome";
};

//$saluta('roberto');

function cercaValore($valoreDaCercare){         //do il numero da cercare

    return function($itemDellArray) use ($valoreDaCercare){     //lavoro su l'item dell'array   usando il calore da cercare preso dalla funzione superiore

        return $itemDellArray === $valoreDaCercare;              //restituisco un valore true o false 
    };
}

$risultato = array_filter([1,2,3,4,5],cercaValore(3));        //array filter scorre tutti gli item dell'array, e applica la funzione superiore cercaValore


