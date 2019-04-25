
<?php
use Illuminate\Support\Facades\Input;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('calculator');
// });

// Route::post('/hitung',function(){
//     $num1 = input::get('num1');
//     $opr = input::get('opr');
//     $num2 = input::get('num2');

//     if($opr == "+"){
//       $hasil = $num1 + $num2;
//       echo 'Hasil: ' . $hasil;
//     }

//     if($opr == "-"){
//       $hasil = $num1 - $num2;
//       echo 'Hasil: ' . $hasil;
//     }

//     if($opr == "*"){
//       $hasil = $num1 * $num2;
//       echo 'Hasil: ' . $hasil;
//     }

//     if($opr == "/"){
//       $hasil = $num1 /$num2;
//       echo 'Hasil: ' . $hasil;
//     }



// });

Route::get('/', function () {
  return view('home');
});
Route::get('/mengajar', function () {
  return view('mengajar.create');
});
Route::get('/admin', 'AdminController@admin')
  ->middleware('is_admin')
  ->name('admin');
  Route::middleware(['is_admin'])->group(function () {
    Route::resource('dosen','DosenController');
  Route::resource('matkul','MatkulController');
  Route::resource('mengajar','MengajarController');
  Route::resource('mengambil','MengambilController');
  Route::post('/input/nilai','FrsController@InputNilai');

  });
Route::resource('mhs','MhsController');
// Route::resource('dosen','DosenController');
// Route::resource('matkul','MatkulController');
// Route::resource('mengajar','MengajarController');
// Route::resource('mengambil','MengambilController');
// Route::post('/input/nilai','FrsController@InputNilai');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');



Route::get('/frs','FrsController@index');

Route::post('/frs/submit','FrsController@store');