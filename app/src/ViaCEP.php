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
}
