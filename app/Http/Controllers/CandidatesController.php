<?php

namespace App\Http\Controllers;

use App\Models\Candidates;
use Illuminate\Http\Request;

class CandidatesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth:api', ['except' => []]);
        $this->candidateModel = new Candidates();
    }

    //create candidate
    public function create(Request $request)
    {   
        $this->validate($request,Candidates::validateRules());
        $result = $this->candidateModel->saveCandidate($request);  

        return response()->json($result, 201);
    }

    //show candidate by id
    public function showCandidate($id) {
        $candidate = $this->candidateModel->getCandidateById($id);
        return response()->json($candidate);
    }

    //list candidate with pagination
    public function listCandidate(Request $request) {    
        $Candidates = $this->candidateModel->getListOfAllCandidates($request);
        return response()->json($Candidates,200);
    }

    //search candidate with pagination
    public function searchCandidate(Request $request) {     
        $Candidates = $this->candidateModel->searchCandidate($request);        
        return response()->json($Candidates,200);
    }
}
