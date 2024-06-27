<?php

namespace App\Http\Controllers;

use App\Services\SupabaseService;
use Illuminate\Http\Request;

class dbController extends Controller
{
    protected $supabase;

    public function __construct(SupabaseService $supabase)
    {
        $this->supabase = $supabase;
    }

    public function getManagersByPosition($value = null)
    {   
        if ($value){
        $data = $this->supabase->get('/managers', ['position' => 'eq.' . $value]);
        } else{
        $data = $this->supabase->get('/managers');
        }

        return response()->json($data);
    }
  
}
