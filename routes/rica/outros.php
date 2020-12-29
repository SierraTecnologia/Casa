<?php



Route::resource('/spents', 'SpentController')->parameters([
    'spents' => 'id'
]);
Route::resource('/propostas', 'PropostaController')->parameters([
    'propostas' => 'id'
]);
Route::resource('/saldos', 'SaldoController')->parameters([
    'saldos' => 'id'
]);
