# VIACEP
Componente PHP para uso dos recursos da API ViaCEP. Projeto criado também para estudos de criação de componentes PHP e compartilhamento no Packgist.

## Utilização
Segue abaixo alguns exemplos de utilização, se preferir, consulte a pasta **app/test**
```php
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
```
Todo CEP informado é validado automaticamente, **null** será retornado em caso de CEP inválido.

## Requisitos
    PHP 8 ou superior.