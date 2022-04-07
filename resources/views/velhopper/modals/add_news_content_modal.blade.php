<style>
.modal-backdrop
{
    opacity:0.5 !important;
}
.device-margin {
    margin-top: -9px;
}
</style>
<div class="modal" id="addNewsContentsModal" role="dialog">
    <div class="modal-dialog modal-xl">
        <div class="modal-content pull-right">
        <div class="add-documents"><b><p id="header-label"><i class="fa fa-folder"></i> Add News Content</p></b></div>
    <div class="row alert-m">
</div>
<form class="add-contents-form" enctype="multipart/form-data" method="post">    
{{ csrf_field() }}
<div class="modal-body div-docs">
    <div class="row">
        <div class="col-md-6">
            <label>Article Name</label>
                <input id="add-article-name" type="text" class="form-control" name="article_name"> 
            <span id="a-article-text"></span>
        </div>
        <div class="col-md-3">
            <label>Location</label>
                <select id="n-location" class="form-control news-location" name="location">
                    <option></option>
                    <option value="first Layer Left">First Layer Left</option>
                    <option value="first Layer Right">First Layer Right</option>
                </select>
            <span id="a-location-text"></span>
        </div> 
        <div class="col-md-3">
            <label>Type</label>
                <input type="text" class="form-control" name="content_type">
                <input type="hidden" class="form-control" value="For Approval" name="content_status"> 
                <input type="hidden" class="form-control" value="Caraga" name="created_by">  
                <span id="a-type-text"></span>
            </div> 
        </div>
    <div class="row">
        <div class="col-md-12">
            <label>Content</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="8" name="contents"></textarea>
            <span id="a-contents-text"></span>
        </div>
        <div class="col-md-4">
            <label>Upload Photo</label>
                <input style="height: 2.7em;" type="file" class="form-control" name="news_image"> 
            <span id="a-article-photo"></span>
        </div>
    </div>
</div>
<div class="modal-footer">
    <div class="row s-btn">
        </div>
            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</form>
@include('reddrop_back.back_scripts.manage_users')