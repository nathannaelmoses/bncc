<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
Route::post('/register', [AuthController::class, 'register'])->name('register');

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

Route::get('/', function () {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "laravel_db";
    try{
        $conn = new mysqli($servername, $username, $password, $dbname);
    }catch(Exception $e){

        return view("minigame");
    }
    

    $database = env('DB_DATABASE'); // Get the database name from .env
    $exists = DB::select("SHOW DATABASES LIKE '{$database}'");
    return view('welcome');
});

Route::delete("/delete",function(Request $req){
    if (!$req->has(['name'])) {
        return response()->json(['message' => 'Missing required fields'], 422);
    }
    $affected = DB::table('MsKaryawan')
    ->where('KaryawanName', (string)$req->input("name"))
    ->delete();
    if ($affected) {
        return response()->json(['message' => 'mantap'], 200);
    } else {
        return response()->json(['message' => 'No records updated'], 400);
    }
    
})->name("delete");

Route::post("/update",function(Request $req){
    if (!$req->has(['name', 'age', 'address', 'telp'])) {
        return response()->json(['message' => 'Missing required fields'], 422);
    }
    $affected = DB::table('MsKaryawan')
    ->where('KaryawanName', (string)$req->input("name"))
    ->update([
        'KaryawanAge' => (int)$req->input("age"),
        'KaryawanAddress' =>  (string)$req->input("address"),
        'KaryawanTelp' =>  (string)$req->input("telp")
    ]);
    if ($affected) {
        return response()->json(['message' => 'mantap'], 200);
    } else {
        return response()->json(['message' => 'No records updated'], 400);
    }
    
})->name("update");

Route::post("/insert",function(Request $req){
    if (!$req->has(['name', 'age', 'address', 'telp'])) {
        return response()->json(['message' => 'Missing required fields'], 422);
    }
    $affected = DB::table('MsKaryawan')->insert(
        [
            'KaryawanName'=> (string)$req->input("name"),
            'KaryawanAge' => (int)$req->input("age"),
            'KaryawanAddress' =>  (string)$req->input("address"),
            'KaryawanTelp' =>  (string)$req->input("telp")
        ]
        );

    if ($affected) {
        return response()->json(['message' => 'mantap'], 200);
    } else {
        return response()->json(['message' => 'No records updated'], 400);
    }
    
})->name("insert");

Route::post("/view", function(Request $req){
    $karyawan = DB::select("SELECT * FROM MsKaryawan");
    return response()->json(['data' => $karyawan], 201);
})->name('view');

Route::post('/home', function(Request $req){
    $users = DB::select("SELECT * FROM Users WHERE Username LIKE ? && Password LIKE ?",[$req->input("email"),$req->input("password")]);
    if(empty($users)){
        
        return redirect("/toLoginPage");
    }
    // session(['user' => $users->Username]);
    return view('home');
})->name('home');

Route::get('/toLoginPage', function(){
    
    return view('welcome');
})->name('toLoginPage');

    Route::post('/toRegisterPage', function(){
        
        return view('register');
    })->name('toRegisterPage');

Route::get('/toRegisterPage', function(){
    
    return view('register');
})->name('toRegisterPage');
