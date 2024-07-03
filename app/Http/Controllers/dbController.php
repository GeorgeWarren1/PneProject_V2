<?php

namespace App\Http\Controllers;

use App\Services\SupabaseService;
use Illuminate\Http\Request;
use Log;
class dbController extends Controller
{
    protected $supabase;

    public function __construct(SupabaseService $supabase)
    {
        $this->supabase = $supabase;
    }


     //refance in case of any بعرة
    /*public function queryId($value = null)
    {
        if ($value) {
            $data = $this->supabase->get('/positions', ['position_name' => 'eq.' . $value]);
        } else {
            $data = $this->supabase->get('/positions');
        }
        $ids = array_map(function($positions) {
            return $positions['id'];
        }, $data);
    
        return $ids;
    }
    
    public function getManagersByPosition($value = null)
    {
        $queryId = $this->queryId($value);
    
        if ($queryId) {
            
            $data = $this->supabase->get('/managers', ['position_id' => 'in.' . '('.implode(',', $queryId).')']);
        } else {
            $data = $this->supabase->get('/managers');
        }
    
        $response = ['Data' => $data];
    
        return response()->json($response);
    }*/

    public function queryId($value = null)
    {
        if ($value) {
            $data = $this->supabase->get('/positions', ['position_name' => 'eq.' . $value]);
        } else {
            $data = $this->supabase->get('/positions');
        }
        $ids = array_map(function($positions) {
            return $positions['id'];
        }, $data);
    
        return $ids;
    }
    
    public function getManagersByPosition($value = null)
    {
        $queryId = $this->queryId($value);
    
        if ($queryId) {
            $managerData = $this->supabase->get('/managers', ['position_id' => 'in.' . '('.implode(',', $queryId).')']);
        } else {
            $managerData = $this->supabase->get('/managers');
        }
    
        
        $positionsData = $this->supabase->get('/positions');
        $positionMapping = array_column($positionsData, 'position_name', 'id');
    
        
        $managers = array_map(function($manager) use ($positionMapping) {
            $manager['position_name'] = $positionMapping[$manager['position_id']] ?? null;
            unset($manager['position_id']);
            return $manager;
        }, $managerData);
    
        //$response = ['Data' => $managers];
          $response = $managers;
        return response()->json($response);
    }
    
    public function concatinatArray(){
        $array1 = $this->getManagersByPosition("all");
        $array2 =json_decode(asset('json/managers.json'));
            

            
             $mergedArray = array_merge($array1, $array2);
          return $mergedArray;

    }
    public function showConcatenatedArrays()
    {
        $mergedArray = $this->concatinatArray();

        return view('managerslist', compact('mergedArray'));
    }

    public function getStoreInfo($value = null)
    {
        $queryId = $this->queryId($value);
    
        if ($queryId) {
            
            $data = $this->supabase->get('/store_info', ['id' => 'in.' . '('.implode(',', $queryId).')']);
        } else {
            $data = $this->supabase->get('/store_info');
        }
    
        $response = ['Data' => $data];
    
        return response()->json($response);
    }


}
