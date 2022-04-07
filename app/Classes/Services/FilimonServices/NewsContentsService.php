<?php

namespace App\Classes\Services\FilimonServices;
use Illuminate\Http\Request;
use App\Classes\Constants\Constants;
use Carbon\Carbon;
use Datatables;
use App\User;
use App\Models\NewsContents;
use DB;
use Auth;
use Exception;

class NewsContentsService
{
    public function indexView()
    {
        try {
            return view('fil_views.manage_navbars');
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function addContent($request)
    {   
        DB::beginTransaction();
        try {
        $validation = Validator::make($request->all(), [
            'hic_documents' => 'image|mimes:jpeg,png,jpg|max:4048'
        ]);

        $hicDocuments = new RdDocuments;
        $hicDocuments->docs_id_no = mt_rand(100000, 999999);
        $hicDocuments->hic_id_no = $request->hic_id_no;
        $hicDocuments->hic_docs_name = $request->hic_docs_name;
       
        if ($validation->passes()){
            if ($request->hasFile('hic_documents')) {
                $document = $request->file('hic_documents');
                
                $filename = time() . '.' . $document->getClientOriginalExtension();
                $location = public_path('uploads/documents/'. $filename);
                Image::make($document)->resize(360, 360)->save($location);
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


    public function newsContentsDataTable($request)
    {
        try {
            $queryContents = DB::table('news_contents')
                                ->select(
                                    'id',
                                    'news_id_no',
                                    'article_name',
                                    'position',
                                    'content_type',
                                    'content_status')->get();
            $query = datatables()->of($queryContents);
            return $query
            ->addColumn('action', function ($data) {
                $action = '<a target="_blank" style="text-decoration:none;">
                            <button class="btn btn-primary btn-sm" type="button"
                            data-content-id="'. $data->id .'"
                            data-content-news-id-no"'. $data->news_id_no .'"
                            data-content-article-name="'. $data->article_name .'"
                            data-content-position="'. $data->position .'"
                            data-content-content-status="'. $data->content_status .'"
                            data-content-content-type="'. $data->content_type .'"
                            onclick="viewDriversDetails(this)">
                            <i class="fa fa-pencil-square"></i> View & Edit
                        </button>
                    </a>';
                return $action;
            })->make();
        } catch(Exception $e) {
            return $e->getMessage();
        }
    }
}
