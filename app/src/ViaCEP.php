<?php

namespace ErnandesRS\ViaCEP;

use ErnandesRS\Requester\Requester;

class ViaCEP
{
    /**
     * Consultar CEP
     *
     * @param string $cep
     * @return null|stdClass null é retornado em caso de CEP inválido.
     */
    public static function consultarCep(string $cep)
    {
        $validatedCep = self::validate($cep);

        if (!$validatedCep) {
            return null;
        }

        $response = Requester::get("https://viacep.com.br/ws/" . $validatedCep . "/json/");

        if (!$response["success"]) {
            return null;
        }

        return json_decode($response["data"]);
    }

    /**
     * Obter CEP
     *
     * @param string $uf unidade federativa
     * @param string $cidade cidade
     * @param string $logradouro logradouro
     * @return null|array
     */
    public static function obterCep(string $uf, string $cidade, string $logradouro)
    {
        $validatedData = [
            self::validateUf($uf),
            self::validateCidade($cidade),
            self::validateLogradouro($logradouro)
        ];

        if (count(array_filter($validatedData, function ($item) {
            return is_null($item);
        })) > 0) {
            return null;
        }

        $response = Requester::get("https://viacep.com.br/ws/{$validatedData[0]}/{$validatedData[1]}/{$validatedData[2]}/json/");
        if (!$response["success"]) {
            return null;
        }

        return json_decode($response["data"]);
    }

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
