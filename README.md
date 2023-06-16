# VIACEP
Componente PHP para uso dos recursos da API ViaCEP. Projeto criado também para estudos de criação de componentes PHP e compartilhamento no Packgist.

## Utilização
Segue abaixo alguns exemplos de utilização, se preferir, consulte a pasta **app/test**.

### Consultar um CEP
Todo CEP informado é validado automaticamente, **null** será retornado em caso de CEP inválido.

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

### Obter um CEP
Todos os valores(UF, Cidade, Logradouro) são validados automaticamente, **null** será retornado caso qualquer um deles sejam inválidos.
    UF: deve possuir 2 caracteres apenas;
    Cidade: deve possuir no mínimo 3 caracteres e
    Logradouro: deve possuir no mínimo 3 caracteres

```php
<?php

use ErnandesRS\ViaCEP\ViaCEP;

require __DIR__ . "/../../vendor/autoload.php";

/**
 * Obtendo um CEP
 */
echo "Obtendo um CEP com endereço\n";
$cep = ViaCEP::obterCep("MS", "Dourados", "Weimar Torres");
print_r($cep);

```

## Requisitos
    PHP 8 ou superior.