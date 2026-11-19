<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Exceptions\PageNotFoundException;
use App\Models\ConteudoModel;

class ConteudoController extends BaseController
{
    public function index(): string
    {
        $conteudoModel = new ConteudoModel();

        $dados['conteudo'] = $conteudoModel->find(1);
    

        return view('home', $dados); 
    }  
    public function contato(): string
    {
        $conteudoModel = new ConteudoModel();

        $dados['conteudo'] = $conteudoModel->find(5);
    

        return view('contato', $dados); 
    }
    public function minhahab(): string
    {
        $conteudoModel = new ConteudoModel();

        $dados['conteudo'] = $conteudoModel->find(2);
    

        return view('minhahab', $dados); 
    }
    public function minhahis(): string
    {
        $conteudoModel = new ConteudoModel();

        $dados['conteudo'] = $conteudoModel->find(3);
    

        return view('minhahis', $dados); 
    }
    public function planofuturo(): string
    {
        $conteudoModel = new ConteudoModel();

        $dados['conteudo'] = $conteudoModel->find(4);
    

        return view('planofuturo', $dados); 
    }
}