<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use App\UserContent;
use App\UserContentRequest;
use Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    private function postPatient(Request $request)
    {
        $this->validate($request, ['title'=>'required', 'body'=>'required', 'type'=>'required']);
        UserContent::create(array_merge($request->all(), ['user_id'=>$request->user()->id]));
        return redirect()->route('home')->with('message', 'Record Added!');
    }
    private function showPatient(Request $request)
    {
        $params= $request->all();
        $tab= isset($params['tab']) ? $params['tab'] : 'add';
        $contents= array();
        $requests= array();
        $alert= '';
        $requests= $request->user()->getRequestforApproval();
        $requests= !is_null($requests) && !empty($requests) ? $requests : [];
        if($requests->count() > 0){
            $alert= 'You have new Request please approve Them';
        };
        if($tab == 'past') {
            $contents= $request->user()->contents;
        }
        return view('patient.main', compact('tab','contents', 'requests', 'alert'));
    }
    private function showPhaDoc(Request $request, $role)
    {
        $params= $request->all();
        $tab= isset($params['tab']) ? $params['tab'] : 'pat';
        $patients= array();
        $contents= array();
        $proContents= array();
        if($tab == 'pat') {
            $patients= User::whereHas('roles', function($q){
                $q->where('name', 'patient');
            })->get();
        }
        elseif($tab == 'req') {
            $this->validate($request, ['patient_id'=>'required'],['patient_id.required'=>'Click on View Requests from Patients Tabs!']);
            $patient_id= isset($params['patient_id']) ? $params['patient_id'] : '';
            $contents= User::find($patient_id)->contents;
            foreach ($contents as $content){
                /**
                 * @var $content UserContent
                 */
                $tmp= array();
                $tmp['id']= $content->id;
                $tmp['patient_id']= $content->user_id;
                $tmp['user_id']= $request->user()->id;
                $tmp['title']= $content->title;
                $tmp['type']= $content->type;
                $tmp['created_at']= $content->created_at;
                $ucr= $content->getUserRequest($request->user()->id);
                $tmp['status']= !is_null($ucr) && !empty($ucr) ? $ucr->status : 'Request';
                $tmp['request_id']= !is_null($ucr) && !empty($ucr) ? $ucr->id : '';
                if($role == 'pharmacist'){
                    if($tmp['type'] == 'prescription')
                        $proContents[]= $tmp;
                } else{
                    $proContents[]= $tmp;
                }
            }
            $contents= $proContents;
        } elseif($tab == 'rec') {
            $this->validate($request, ['request_id'=>'required'],['request_id.required'=>'Click on View Record from Request Tabs!']);
            $request_id= isset($params['request_id']) ? $params['request_id'] : '';
            $ucr= UserContentRequest::find($request_id);
            if($ucr && $ucr->isApproved($request->user()->id)) {
                    $contents= $ucr->user_content;
                }
            else
                abort(401);

        }
        return view('phadoc.main', compact('tab','patients', 'contents'));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $request->user()->authorizeRoles(['patient', 'doctor', 'pharmacist']);
        $role= $request->user()->getRole();
        switch ($role){
            case 'patient':
                return $this->showPatient($request);
                break;
            case 'pharmacist':
            case 'doctor':
                return $this->showPhaDoc($request, $role);
                break;
            default:
                abort(401);
        }
    }
    public function postReq(Request $request)
    {
        $request->user()->authorizeRoles(['patient', 'doctor', 'pharmacist']);
        $role= $request->user()->getRole();
        switch ($role){
            case 'patient':
                return $this->postPatient($request);
                break;
            case 'pharmacist':
                return $this->postPharmacist($request);
                break;
            case 'doctor':
                return $this->postDoctor($request);
                break;
            default:
                abort(401);
        }
    }
    public function ucr(UserContentRequest $id){
        return $id;
    }
    public function addRequest(Request $request){
        $cnt= UserContentRequest::where([
            ['user_content_id', '=', $request->get('content_id')],
            ['patient_id', '=', $request->get('patient_id')],
            ['user_id', '=', $request->get('user_id')]
        ])->count();
        if($cnt == 0){
            UserContentRequest::create(array_merge($request->all(), array('status'=>'Pending')));
            return 'Requested';
        }
        else
            return 'Already Requested';

    }
    public function approveRequest(Request $request){
        $ucr= UserContentRequest::find($request->get('request_id'));
        if($ucr){
            $ucr->status= 'Approved';
            $ucr->save();
            return 'Request Approved!';
        }
        return 'No Such Request';
    }
}
