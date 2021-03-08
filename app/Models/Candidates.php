<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Candidates extends Model
{
	const CREATED_AT = 'created_on';
	const UPDATED_AT = 'modified_on';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'email', 'contact_number', 'gender', 'specialization','work_ex_year','candidate_dob','address','resume',''
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

    public function searchCandidate($requestData) {
        $first_name = $requestData->has('first_name') ? $requestData->get('first_name') : '';
        $last_name = $requestData->has('last_name') ? $requestData->get('last_name') : '';
        $email = $requestData->has('email') ? $requestData->get('email') : '';
        $limit = $requestData->has('limit') ? $requestData->get('limit') : '';

        $result = self::where('first_name', '=', $first_name )
        ->Where('last_name', '=',$last_name)
        ->Where('email', '=',$email)
        ->paginate($limit);

        return $result;
    }

    public function getCandidateById($id) {
        if(empty($id)) {
            return [];
        }
        return self::find($id);
    }

    //validate rules here
    public static function validateRules() {
        $rules =  [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:candidates',
            'contact_number' => 'required|digits:10',
            'gender' => 'required|numeric',
            'work_ex_year' => 'required|numeric',
            'candidate_dob' => 'required|date_format:Y-m-d',
            'resume' => 'required|mimes:doc,pdf,docx|max:2048'
        ];
        return $rules;
    }

    //saving candidate data
    public function saveCandidate($request) {
        
        $candidates = [];
        if($request->file()) {
            $picName = $request->file('resume')->getClientOriginalName();
            $picName = uniqid() . '_' . $picName;
            $path = 'uploads' . DIRECTORY_SEPARATOR . 'user_files' . DIRECTORY_SEPARATOR;
            $destinationPath = $path; // upload path
            \Illuminate\Support\Facades\File::makeDirectory($destinationPath, 0777, true, true);           

            if($request->file('resume')->move($destinationPath, $picName)) {
                $request = $request->all();
                $request['resume'] =  $picName;
                $request['candidate_dob'] = Carbon::createFromDate($request['candidate_dob'])->timestamp;
                $candidates = Candidates::create($request);
            }            
        }
        return $candidates;
    }

    //getList of candidates
    public function getListOfAllCandidates($request) {
        $limit = $request->has('limit') ? $request->get('limit') : '';   
        return self::paginate($limit);
    }
}
