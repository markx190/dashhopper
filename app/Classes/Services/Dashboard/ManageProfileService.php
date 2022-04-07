<?php

namespace App\Classes\Services\Dashboard;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\User;
use App\Models\RdDocuments;
use Auth;
use DB;
use Validator;
use Image;
use Exception;

class ManageProfileService
{
    public function viewProfile()
    {
        try {
            date_default_timezone_set('Asia/Manila');
		    $dTime = date('F j, Y');
		    $users = Auth::user();
                return view('app_back_end.admin_dashboard.view_profile',[
                    'users' => $users,
                    'dateTime' => $dTime
                ]);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function updateProfilePage()
    {
        try {
            date_default_timezone_set('Asia/Manila');
		    $dTime = date('F j, Y');
		    $users = Auth::user();
                return view('app_back_end.admin_dashboard.update_profile_page', [
                    'users' => $users,
                    'dateTime' => $dTime
                ]);
        } catch (Exception $e){
            return $e->getMessage();
        }
    }

    public function saveUpdatedProfile(Request $request)
    { 
        DB::beginTransaction();
        try {
        $validation = Validator::make($request->all(), [
            'u_hic_name' => 'required|string|max:255',
            'u_user_firstname' => 'required|string|max:255',
            'u_user_lastname' => 'required|string|max:255',
        ]);
       
        $userProfile = User::where('hic_id_no', $request->u_hic_id_no)->first();
        if (!empty($userProfile)) {
           
        $userProfile->hic_name = $request->u_hic_name;
        $userProfile->user_firstname = $request->u_user_firstname;
        $userProfile->user_middlename = $request->u_user_middlename;
        $userProfile->user_lastname = $request->u_user_lastname;
        $userProfile->user_suffix = $request->u_user_suffix;
        $userProfile->user_civil_status = $request->u_civil_status;
        $userProfile->user_religion = $request->u_religion;
        $userProfile->user_age = $request->u_user_age;
        $userProfile->user_birth_month = $request->u_birth_month;
        $userProfile->user_birth_day = $request->u_birth_day;
        $userProfile->user_birth_year = $request->u_birth_year;
        $userProfile->user_place_of_birth = $request->u_birthplace;
        $userProfile->user_gender = $request->gender;
        $userProfile->hic_position = $request->u_position;
        $userProfile->user_account_type = $request->u_user_account_type;
        $userProfile->hic_contact_no = $request->u_get_hic_contact_no;

        if ($validation->passes()){
            
            $userProfile->save();
            DB::commit();            
            return response()->json(['errorStatus' => 0]);
        } else {
            return response()->json(['errorStatus' => 1]);
            } 
        }

        } catch(Exception $e){
            return $e->getMessage();
        }
    }

    public function editAvatar($request)
    {
        DB::beginTransaction();
        try {
            $validation = Validator::make($request->all(), [
                'avatar' => 'image|mimes:jpeg,png,jpg|max:3048'
            ]);
    
            $profileAvatar = User::where('hic_id_no', $request->hic_id_no)->first();
            if (!empty($profileAvatar)) {
            if ($validation->passes()){
                if ($request->hasFile('avatar')) {
                    $avatar = $request->file('avatar');
                    
                    $filename = time() . '.' . $avatar->getClientOriginalExtension();
                    $location = public_path('uploads/avatars/'. $filename);
                    Image::make($avatar)->resize(360, 360)->save($location);
                    $profileAvatar->avatar = $filename;                
                }
                $profileAvatar->save();
                DB::commit();
                return response()->json(['errorStatus' => 0]);
    
            } else {
                return response()->json(['errorStatus' => 1]);
                }
            }       
        } catch (Exception $e) {
            return $e->getMessage();
        }
    } 

    public function listOfDocuments($request)
    {
        try {
            $hicUsers = User::all();
            return view('reddrop_back.admin_dashboard.list_of_documents', [
                'hicUsers' => $hicUsers
            ]);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function docsDataTable($request)
    {
        try {
            $hicDocuments = DB::table('rd_documents')
                ->select('id', 
                          'hic_id_no', 
                          'docs_id_no', 
                          'hic_docs_name', 
                          'position', 
                          'contents', 
                          'content_source',
                          'content_type',
                          'created_by',
                          'content_status',
                          'photo_signatory', 
                          'hic_documents')
                ->where('hic_id_no', Auth::user()->hic_id_no)
                ->get();
            $query = datatables()->of($hicDocuments);
            return $query
                ->addColumn('action', function ($data) {
                    $editDocs = $data->id;
                    $deleteDocs = $data->id;
                    $viewDocs = $data->id;
                    $action = '
                    <button class="btn btn-warning btn-xs" type="button" 
                        data-hic-id-no="'. $data->hic_id_no .'"
                        data-docs-id-no="'. $data->docs_id_no .'"
                        data-docs-name="'. $data->hic_docs_name .'"
                        data-position="'. $data->position .'"
                        data-contents="'. $data->contents .'"
                        data-content-source="'. $data->content_source .'"
                        data-content-type="'. $data->content_type .'"
                        data-photo-signatory="'. $data->photo_signatory .'"
                        data-content-status="'. $data->content_status .'"
                        data-photo="'. $data->hic_documents .'"
                        data-view="ViewContent"
                        onclick="viewDocument('. $data->id .', '. $viewDocs .', this)">
                        <i class="fa fa-link"></i> View
                    </button>
                    
                    <button class="btn btn-primary btn-xs" type="button"
                        data-hic-id-no="'. $data->hic_id_no .'"
                        data-docs-id-no="'. $data->docs_id_no .'"
                        data-docs-name="'. $data->hic_docs_name .'"
                        data-position="'. $data->position .'"
                        data-contents="'. $data->contents .'"
                        data-content-source="'. $data->content_source .'"
                        data-content-type="'. $data->content_type .'"
                        data-photo-signatory="'. $data->photo_signatory .'"
                        data-content-status="'. $data->content_status .'"
                        data-edit="EditContent"
                        onclick="editDocuments('. $data->id .', '. $editDocs .', this)">
                        <i class="fa fa-edit"></i> Edit
                    </button>
                    <button class="btn btn-danger btn-xs" type="button"
                        data-docs-id="'. $data->id .'"
                        data-hic-id-no="'. $data->hic_id_no .'"
                        data-docs-id-no="'. $data->docs_id_no .'"
                        data-docs-name="'. $data->hic_docs_name .'"
                        data-position="'. $data->position .'"
                        data-contents="'. $data->contents .'"
                        data-content-source="'. $data->content_source .'"
                        data-content-type="'. $data->content_type .'"
                        data-photo-signatory="'. $data->photo_signatory .'"
                        data-content-status="'. $data->content_status .'"
                        data-photo="'. $data->hic_documents .'"
                        data-delete="DeleteContent"
                        onclick="deleteDocuments('. $data->id .', '. $deleteDocs .', this)">
                        <i class="fa fa-trash"></i> Delete
                    </button>';
                    return $action;
        })->make();
        } catch(Exception $e) {
            return $e->getMessage();
        }
    }
    
    public function addDocuments($request)
    {   
        DB::beginTransaction();
        try {
        $validation = Validator::make($request->all(), [
            'hic_documents' => 'required|mimes:jpeg,png,jpg,pdf|max:14048'
        ]);

        $hicDocuments = new RdDocuments;
        $hicDocuments->docs_id_no = mt_rand(100000, 999999);
        $hicDocuments->hic_id_no = $request->hic_id_no;
        $hicDocuments->hic_docs_name = $request->hic_docs_name;
        $hicDocuments->content_type = $request->content_type;
        $hicDocuments->content_status = $request->content_status;
        $hicDocuments->created_by = Auth::user()->user_firstname .' '. Auth::user()->user_lastname;
        
        if ($validation->passes()){
            if ($request->hasFile('hic_documents')) {
                $document = $request->file('hic_documents');
                
                $filename = time() . '.' . $document->getClientOriginalExtension();
                $location = public_path('/uploads/documents/'. $filename);
                Image::make($document)->save($location);
                $hicDocuments->hic_documents = $filename;           
               
            }
            $hicDocuments->save();
            
            DB::commit();
            return response()->json(['errorStatus' => 0]);

        } else {
            return response()->json(['errorStatus' => 1]);
        }

        } catch (Exception $e){
            return $e->getMessage();
        }
    }

    public function editDocuments($request)
    {
        DB::beginTransaction();
        try {
        $validation = Validator::make($request->all(), [
            'hic_documents' => 'image|mimes:jpeg,png,jpg,pdf|max:14048'
        ]);

        $hicDocuments = RdDocuments::where('docs_id_no', $request->docs_id_no)->first();
        if (!empty($hicDocuments)) {
        $hicDocuments->docs_id_no = $request->docs_id_no;
        $hicDocuments->hic_id_no = $request->hic_id_no;
        if (Auth::user()->user_account_type == 'Applicant'){
            $hicDocuments->hic_docs_name = $request->hic_docs_name .' of '. Auth::user()->user_firstname .' '. Auth::user()->user_lastname;
            $hicDocuments->content_type = $request->content_type;
        }

        if (Auth::user()->user_account_type == 'Administrator'){
            $hicDocuments->content_status = $request->content_status;
        }

        if ($validation->passes()){
            if ($request->hasFile('hic_documents')) {
                $document = $request->file('hic_documents');
                
                $filename = time() . '.' . $document->getClientOriginalExtension();
                $location = public_path('uploads/documents/'. $filename);
                Image::make($document)->save($location);
                $hicDocuments->hic_documents = $filename;                
            }
            $hicDocuments->save();
            DB::commit();
            return response()->json(['errorStatus' => 0]);

        } else {
            return response()->json(['errorStatus' => 1]);
            }
        }

        } catch (Exception $e){
            return $e->getMessage();
        }
    }

    public function deleteDocuments($request)
    { 
        if ($request->id){
            $hicDocuments = RdDocuments::find($request->id)->delete();
            return response()->json(['error' => 1]);
        } else {
            return response()->json(['error' => 0]);
        }    
    }

}
