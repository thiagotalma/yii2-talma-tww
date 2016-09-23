<?php

namespace talma\tww;

use talma\tww\lib\TWWLibrary;

/**
 * Class Tww
 */
class Tww extends TWWLibrary
{
    /**
     * @inheritDoc
     */
    public function __construct($config = [])
    {
        $twwUsuario = getenv("TWW_USUARIO");
        $twwSenha = getenv("TWW_SENHA");
        $twwUrl = getenv("TWW_URL");
        $twwSoapAction = getenv("TWW_SOAP_ACTION");
        $twwPort = getenv("TWW_PORT");
        $defaultTimeout = getenv("DEFAULT_TIMEOUT");

        if ($twwUsuario) {
            define('__TWW_NUMUSU__', $twwUsuario);
        }

        if ($twwSenha) {
            define('__TWW_SENHA__', $twwSenha);
        }

        if ($twwUrl) {
            define('__TWW_URL__', $twwUrl);
        }

        if ($twwSoapAction) {
            define('__TWW_SOAP_ACTION__', $twwSoapAction);
        }

        if ($twwPort) {
            define('__TWW_PORT__', $twwPort);
        }

        if ($defaultTimeout) {
            define('__DEFAULT_TIMEOUT__', $defaultTimeout);
        }

        parent::__construct($config);
    }
}
