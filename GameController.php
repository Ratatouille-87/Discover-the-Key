<?php

namespace App\Controllers;

class GameController extends BaseController
{
    // Carrega a view 'nivel1'
    public function nivel1()
    {
        return view('nivel1');
    }

    // Carrega a view 'nivel2'
    public function nivel2()
    {
        return view('nivel2');
    }

    // Carrega a view 'vitoria'
    public function vitoria()
    {
        return view('vitoria');
    }

    // Carrega a view 'verificar' (se precisar de lógica de verificação, adicione aqui)
    public function verificar()
    {
        return view('verificar');
    }
}





