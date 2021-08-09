<?php

namespace App\Utils;

class View
{

    /**
     * Método responsável por retornar o conteúdo de view
     * @param string $view
     * @return string
     */
    private static function getContentView($view)
    {
        $file = __DIR__.'/../../resources/view/'.$view.'.html';
        return file_exists($file) ? file_get_contents($file) : '';
    }


    /**
     * Método responsável por retornar o conteúdo de uma view
     * @param string $view (pagina a ser renderizada)
     * @param array $vars (string/numeric - variaveis dinâmicas para a página)
     * @return string
     */
    public static function render($view, $vars = [])
    {
        #CONTEÚDO DA VIEW
        $contentView = self::getContentView($view);

        #CHAVES DO ARRAY VARS
        $keys = array_keys($vars);
        $keys = array_map(function($item) {
            return '{{'.$item.'}}';
        }, $keys);

        //Retorna o conteúdo renderizado
        return str_replace($keys, array_values($vars), $contentView);
    }
}
