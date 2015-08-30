<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Request;

//use Illuminate\Http\Request;
use Illuminate\Http\Response;

use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Illuminate\Support\Facades;
use Illuminate\Routing\Illuminate\Routing;
use Illuminate\Http\Illuminate\Http;

//use Symfony\Component\HttpFoundation\Request; 
use Symfony\Component\HttpFoundation\Symfony\Component\HttpFoundation;

//use Illuminate\Support\Facades\Request;

class ClientController extends Controller
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

    public function index()
    {

    	$subject = $_SERVER['REQUEST_URI'];
		$pattern = '/[a-z.]*$/';
		preg_match($pattern, $subject, $matches);
		list($verbo,$tipo) = explode(".",$matches[0]);
		
		$url = 'http://www.laravel-vagrant.com/server/rest';
		$url = 'http://www.symfony-vagrant.com/rest/server/get';

		
		// First we fetch the Request instance
		// $request = Request::instance();
		
		// $request->url($url);
		
		// Now we can get the content from it
		// $content = $request->getContent();
		
		// var_dump($content);
		
		// die;
		
		
		// echo '<pre>';
		print_r($this->consumir($url));
		// die;
		
		// Laravel example.
		
		$request = new Request();
		
		// Now we can get the content from it
		//$request->create($url, 'get');
		
		echo '<pre>';
		print_r( get_class_methods($request));		
		//var_dump($request->getContent());
		
		die;
		
		
		//$instance = json_decode(Route::dispatch($request)->getContent());
		//print_r($instance);
		
		
		die('asds');
		
		die;
    }
    
    
    public function consumir($url)
    {
    	// url a ser consumida está vazia, anula a requisição
    	if(is_null($url)) return null;
    
    	$curl = curl_init();
    
    	curl_setopt($curl, CURLOPT_URL, $url);
    	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    	curl_setopt($curl, CURLOPT_TIMEOUT,     15); //tempo de espera pela requisição em segundos
    	//curl_setopt($curl, CURLOPT_VERBOSE,     1);
    	//curl_setopt($curl, CURLOPT_HEADER,      0);
    
    	// coonteudo da requisicao com header
    	$conteudo = trim(curl_exec($curl));
    
    	// Then, after your curl_exec call:
    	$header_size = curl_getinfo($curl, CURLINFO_HEADER_SIZE);
    
    	//$header = substr($conteudo, 0, $header_size);
    	//$conteudo = substr($conteudo, $header_size);
    
    	// $statusRespostaHttp = curl_getinfo($curl, CURLINFO_HTTP_CODE);
    	$contentType        = curl_getinfo($curl, CURLINFO_CONTENT_TYPE);
    
    	// se retornou diferente de zero, ocorreu algum problema na requisição
    	// ver http://curl.haxx.se/libcurl/c/libcurl-errors.html
    	$erro = curl_errno ($curl);
    
    	curl_close($curl);
    
    	if($erro > 0) return null;
    
    	// se o tipo for diferente de json, anula a requisição
    	$json = strstr($contentType,'json');
    	if($json===0) return null;
    
    	// retorna a conversão do conteúdo retornado pela API de json em objeto
    	return json_decode($conteudo);
    }
    
}

