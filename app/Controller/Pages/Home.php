<?php

namespace App\Controller\Pages;

use App\Utils\View;
use App\Model\Entity\Organization;

class Home extends Page
{
    /**
     * Método responsável por retornar o conteúdo (view) da nossa home
     * @return string
     */
    public static function getHome()
    {
        //Cria a instancia da entidade Organization 
        $obOrganization = new Organization();
        
        //View da home
        $content = View::render('pages/home', [
            'name' => $obOrganization->nome,
            'description' => $obOrganization->descricao,
            'site' => $obOrganization->site
        ]);

        //Retorna a view da página
        return parent::getPage('Wdev - Canal - Home', $content);
    }
}