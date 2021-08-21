<?php
use App\Http\Controllers\AutenticacaoController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\TamanhoController;
use App\Http\Controllers\CategoriaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

    // Rotas de autenticação

    Route::post('/cadastrar', [AutenticacaoController::class, 'cadastrar']);

    Route::post('/login', [AutenticacaoController::class, 'login']);

    Route::post('/logout', [AutenticacaoController::class, 'logout']);

    //Rotas protegidas

Route::group(['middleware'=>['auth:sanctum']], function(){

    //Rotas de produtos CRUD

    Route::get("/produtos", [ProdutoController::class, 'index']);

    Route::post('/produto', [ProdutoController::class, 'store']);

    Route::get("/produtos/{id}", [ProdutoController::class, 'show']);

    Route::put("/produtos/{id}", [ProdutoController::class, 'update']);

    Route::delete("/produtos/{id}", [ProdutoController::class, 'destroy']);

    //Rotas para tamanhos do produto

    Route::post('/cadastrarTamanho', [TamanhoController::class, 'store']);

    Route::get("/tamanhos", [TamanhoController::class, 'index']);

    //Rotas para categorias do produto

    Route::post('/cadastrarCategoria', [CategoriaController::class, 'store']);

    Route::get("/categorias", [CategoriaController::class, 'index']);

});



// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
