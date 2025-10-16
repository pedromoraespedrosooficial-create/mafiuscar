<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/concessionaria', function () {
    return view('concessionaria');
});
Route::get('/produtos', function () {
    return view('produtos');
});
Route::get('/produto', function () {
    return 'Rota incorreta';
});
Route::get('/mecanica', function () {
    return view('mecanica');
});

Route::fallback(function(){
    return redirect('/concessionaria')->with('msg','Vocêdigitou a rota incorretamente! Redirecionamos para /concessionaria');
});
Route::get('/calculo', function () {
    $carro1 = 2500;
    $carro2 = 1800;
    $total = $carro1 + $carro2;


    return "O valor total da compra de R$$carro1 + R$$carro2 = R$$total";
});
Route::get('/calculo_p', function () {
    $produto1 = 2500;
    $produto2 = 2500;
    $produto3 = 2500;
    $produto4 = 2500;
    $total_p =0.9*($produto1 + $produto2 + $produto3 + $produto4);


    return "O valor total dos produtos é r$$total_p, com 10% de desconto pois a compra foi a vista!";
});
use Illuminate\Http\Request;

Route::get('/promocao', function () {
    return view('promocao');
});

Route::post('/promocao', function (Request $request) {
    // Validação simples
    $request->validate([
        'nome' => 'required|max:255',
        'endereco' => 'required',
        'cpf' => 'required',
        'telefone' => 'required',
        'email' => 'required|email',
    ]);

    // Redireciona para /dados
    return redirect('/dados');
});

Route::get('/dados', function () {
    return view('dados');
});

// Rota para /promoção com acento carregando o mesmo formulário
Route::get('/promoção', function () {
    return view('promocao');
});
