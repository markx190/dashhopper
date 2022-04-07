<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;

class BtSkills extends Model
{
    protected $table = "bt_skills";
	protected $guarded = ['id'];
    
    public static function saveSkills($request)
    {
        $createSkills = self::create([
            'skills_id_no' => mt_rand(100000, 999999),
            'title' => $request->title,
            'industry' => $request->industry,
            'description' => $request->description,
        ]);
        return $createSkills;
    }

    public static function saveEditedSkills($request)
    {
        $editedSkills = BtSkills::where('skills_id_no', $request->e_SkillsIdNo)->first();
        if (!empty($editedSkills)){
            $editedSkills->title = $request->e_Title;
            $editedSkills->industry = $request->e_Industry;
            $editedSkills->description = $request->e_Description;
            $editedSkills->save();
            return $editedSkills;
        }  
    }

    public static function deleteSkills($request)
    {
        $deletedSkills = BtSkills::find($request->skillId)->delete();
            return $deletedSkills;
    }
}

