<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\JsonResponse;
use App\Models\Productos;
use App\Models\Like;
use DB;

class FrontController extends Controller
{
    public function index()
    {
        $productos = Productos::all();
        
        return view('dashboard', ['productos' => $productos]);
    }


}
