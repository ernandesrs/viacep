<?php

use ErnandesRS\ViaCEP\ViaCEP;

require __DIR__ . "/../../vendor/autoload.php";

/**
 * Consultando um CEP válido
 */
echo "Consultando CEP válido\n";
$cep = ViaCEP::consultarCep("01001000");
print_r($cep);

/**
 * Consultando um CEP válido
 */
echo "Consultando CEP válido\n";
$cep = ViaCEP::consultarCep("01001-000");
print_r($cep);

