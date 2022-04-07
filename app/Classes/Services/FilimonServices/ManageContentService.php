<?php

namespace App\Classes\Services\FilimonServices;
use Illuminate\Http\Request;
use App\Classes\Constants\Constants;
use Carbon\Carbon;
use Datatables;
use App\User;
use App\Models\Navbars;
use DB;
use Auth;
use Exception;

class ManageContentService
{
    public function indexView()
    {
        try {
            $hicUsers = User::all();
            return view('fil_views.manage_contents', [
                'hicUsers' => $hicUsers
            ]);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function contentsDataTable($request)
    {
        try {
            if (Auth::user()->user_account_type == 'Administrator'){
                $newsContents = DB::table('rd_documents')
                ->select('id', 
                          'hic_id_no', 
                          'docs_id_no', 
                          'hic_docs_name', 
                          'content_type',
                          'content_status',
                          'created_by',
                          'hic_documents')->get();
            } else {
            $newsContents = DB::table('rd_documents')
                ->select('id', 
                          'hic_id_no', 
                          'docs_id_no', 
                          'hic_docs_name', 
                          'content_type',
                          'content_status',
                          'created_by',
                          'hic_documents')->where('hic_id_no', Auth::user()->hic_id_no)->get();
            }
            $query = datatables()->of($newsContents);
            return $query
                ->addColumn('action', function ($data) {
                    $editDocs = $data->id;
                    $deleteDocs = $data->id;
                    $viewDocs = $data->id;
                if (Auth::user()->user_account_type == 'Applicant'){
                    $action = '
                <a target="_blank" style="text-decoration:none;" href="/uploads/documents/'. $data->hic_documents .'">
                    <button class="btn btn-warning btn-xs" type="button">
                        <i class="fa fa-link"></i> View
                    </button>
                </a>
                    <button class="btn btn-primary btn-xs" type="button"
                        data-docs-id="'. $data->id .'"
                        data-hic-id-no="'. $data->hic_id_no .'"
                        data-docs-id-no="'. $data->docs_id_no .'"
                        data-docs-name="'. $data->hic_docs_name .'"
                        data-content-type="'. $data->content_type .'"
                        data-content-status="'. $data->content_status .'"
                        data-account-type="'. Auth::user()->user_account_type .'"

                        data-edit="EditContent"
                        onclick="editDocuments('. $data->id .', '. $editDocs .', this)">
                        <i class="fa fa-edit"></i> Edit
                    </button>';
                        return $action;
                    }

                    if (Auth::user()->user_account_type == 'Administrator'){
                        $action = '
                    <a target="_blank" style="text-decoration:none;" href="/uploads/documents/'. $data->hic_documents .'">
                        <button class="btn btn-warning btn-xs" type="button">
                            <i class="fa fa-link"></i> View
                        </button>
                    </a>
                        <button class="btn btn-primary btn-xs" type="button"
                            data-docs-id="'. $data->id .'"
                            data-hic-id-no="'. $data->hic_id_no .'"
                            data-docs-id-no="'. $data->docs_id_no .'"
                            data-docs-name="'. $data->hic_docs_name .'"
                            data-content-type="'. $data->content_type .'"
                            data-content-status="'. $data->content_status .'"
                            data-account-type="'. Auth::user()->user_account_type .'"
    
                            data-edit="EditContent"
                            onclick="editDocuments('. $data->id .', '. $editDocs .', this)">
                            <i class="fa fa-edit"></i> Edit
                        </button>
                        <button class="btn btn-danger btn-xs" type="button"
                            data-docs-id="'. $data->id .'"
                            data-hic-id-no="'. $data->hic_id_no .'"
                            data-docs-id-no="'. $data->docs_id_no .'"
                            data-docs-name="'. $data->hic_docs_name .'"
                            data-content-type="'. $data->content_type .'"
                            data-content-status="'. $data->content_status .'"
                            data-account-type="'. Auth::user()->user_account_type .'"
    
                            data-delete="DeleteContent"
                            onclick="deleteDocuments('. $data->id .', '. $deleteDocs .', this)">
                            <i class="fa fa-trash"></i> Delete
                        </button>';
                            return $action;
                        }
                    
        })->make();
        } catch(Exception $e) {
            return $e->getMessage();
        }
    }

}
