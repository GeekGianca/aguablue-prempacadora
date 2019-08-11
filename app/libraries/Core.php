<?php

/**
 * Class Core
 * Mapea la url ingresada en el navegador
 * 1-Controlador
 * 2-Metodo
 * 3-Parametro
 */
class Core
{
    protected $actualController = 'pages';
    protected $actualMethod = 'index';
    protected $param = [];

    /**
     * Core constructor.
     */
    public function __construct()
    {
        $url = $this->getUrl();
        //Busca en controladores si el archivo solicitado existe
        if (file_exists('../app/controllers/' . ucwords($url['0']) . '.php')) {
            $this->actualController = ucwords($url[0]);
            //unset index
            unset($url[0]);
        }
        //Solicita el controlador
        require_once '../app/controllers/' . $this->actualController . '.php';
        $this->actualController = new $this->actualController;
        //Obtener el metodo de la url
        if (isset($url[1])) {
            if (method_exists($this->actualController, $url[1])) {
                //Se chequea el metodo
                $this->actualMethod = $url[1];
                unset($url[1]);
            }
        }
        //Obtiene los parametros
        $this->param = $url ? array_values($url) : [];
        //Se llama callback con parametros array
        call_user_func_array([$this->actualController, $this->actualMethod], $this->param);
    }

    public function getUrl()
    {
        //echo $_GET['url'];
        if (isset($_GET['url'])) {
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            return $url;
        }
    }
}