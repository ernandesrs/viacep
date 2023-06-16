<?php

namespace ErnandesRS\ViaCEP;

trait TraitValidator
{
    /**
     * Validar CEP
     *
     * @param string $cep
     * @return null|string retorna null em caso de CEP inválido
     */
    private static function validate(string $cep)
    {
        $cleanCep = str_replace(["-", " "], "", $cep);

        return (!is_numeric($cleanCep) || strlen($cleanCep) !== 8) ? null : $cleanCep;
    }

    /**
     * Validar UF
     *
     * @param string $uf
     * @return null|string
     */
    private static function validateUf(string $uf)
    {
        return strlen($uf) == 2 ? strtoupper($uf) : null;
    }

    /**
     * Validar Cidade
     *
     * @param string $cidade
     * @return null|string
     */
    private static function validateCidade(string $cidade)
    {
        return strlen($cidade) >= 3 ? str_replace([" "], "%20", $cidade) : null;
    }

    /**
     * Validar Logradouro
     *
     * @param string $logradouro
     * @return null|string
     */
    private static function validateLogradouro(string $logradouro)
    {
        return strlen($logradouro) >= 3 ? str_replace([" "], "+", $logradouro) : null;
    }
}
