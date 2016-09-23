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
        if (!defined('__TWW_NUMUSU__') && $twwUsuario = getenv("TWW_USUARIO")) {
            define('__TWW_NUMUSU__', $twwUsuario);
        }

        if (!defined('__TWW_SENHA__') && $twwSenha = getenv("TWW_SENHA")) {
            define('__TWW_SENHA__', $twwSenha);
        }

        if (!defined('__TWW_URL__') && $twwUrl = getenv("TWW_URL")) {
            define('__TWW_URL__', $twwUrl);
        }

        if (!defined('__TWW_SOAP_ACTION__') && $twwSoapAction = getenv("TWW_SOAP_ACTION")) {
            define('__TWW_SOAP_ACTION__', $twwSoapAction);
        }

        if (!defined('__TWW_PORT__') && $twwPort = getenv("TWW_PORT")) {
            define('__TWW_PORT__', $twwPort);
        }

        if (!defined('__DEFAULT_TIMEOUT__') && $defaultTimeout = getenv("DEFAULT_TIMEOUT")) {
            define('__DEFAULT_TIMEOUT__', $defaultTimeout);
        }

        parent::__construct($config);
    }
}
