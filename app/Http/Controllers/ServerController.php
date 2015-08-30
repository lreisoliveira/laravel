<?php

namespace App\Http\Controllers;

//use Illuminate\Support\Facades\Request;
//use Illuminate\Http\Request as RequestApi;
use Illuminate\Http\Response;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Request;

class ServerController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Exemplo de repositório, pode ser um array como este
     * ou de algum banco de dados
     * 
     * @param unknown $id
     */
    public function repositorio($id)
    {
        $equipes[1] = ['cidade' => 'Rio de Janeiro', 'nome' => 'Flamengo'];
        $equipes[2] = ['cidade' => 'Salvador', 'nome' => 'Bahia'];
        return json_encode($equipes[$id]);
    }

    /**
     * Configura a resposta
     * 
     * @param unknown $conteudo
     * @param unknown $verbo
     * @return \Illuminate\Http\Response
     */
    public function resposta($conteudo,$verbo)
    {
        $conteudo = json_decode($conteudo,true);
        $conteudo['metodo'] = str_replace('::','',strstr($verbo, '::'));
        $response = new Response();
        $response->setStatusCode(201);
        $response->setContent($conteudo);
        $response->header('Content-type','application/json');
        return $response;
    }

    public function get($id=1)
    {
        $equipe = $this->repositorio($id);
        return $this->resposta($equipe,__METHOD__);
    }

    public function create($id=1)
    {
        $equipe = $this->repositorio($id);
        return $this->resposta($equipe,__METHOD__);
    }

    public function update($id=1)
    {
        $equipe = $this->repositorio($id);
        return $this->resposta($equipe,__METHOD__);
    }

    public function delete($id=1)
    {
        $equipe = $this->repositorio($id=1);
        return $this->resposta($equipe,__METHOD__);
    }

    public function client()
    {

        $url = 'http://laravel.git/api/equipes/1';

        /*$opts = array(
            'http'=>array(
                'method'=>"GET",
                'header'=>"Accept-language: en\r\n" .
                    "Cookie: foo=bar\r\n"
            )
        );
        $context = stream_context_create($opts);
        $fp = fopen($url, 'r', false, $context);
        fpassthru($fp);
        fclose($fp);*/



        /*
        public function __construct(array $query = array(), array $request = array(), array $attributes = array(), array $cookies = array(), array $files = array(), array $server = array(), $content = null)
    {
        $this->initialize($query, $request, $attributes, $cookies, $files, $server, $content);
    }
        */

     //   $x = new \Symfony\Component\HttpFoundation\Request(array('http://www.uol.com.br'), array(), array(), array(), array(), array());
     //   var_dump( $x->getContent() );
     //    die('stop');


        /*$x = RequestApi::create($url);
        var_dump($x->getContent());*/

         //$request = new RequestApi();
         //$request->create('http://laravel.git/api/equipes/1', 'GET');



        //$request = Request::instance();
        //$content = $request->getContent();

  //      $rawPostData = file_get_contents("php://input");
//        var_dump($rawPostData);
        //die;

        //var_dump( $r->getContent() );


        //var_dump($r->getQueryString());
    }
}

