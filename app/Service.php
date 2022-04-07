<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;

class Service extends Model
{
     use SoftDeletes;
	//protected $table = 'members';
	protected $fillable = ['id', 'pUser_Id', 'pServiceNo', 'pServiceName', 'pPatientName', 'pComp1', 'pComp2', 
								 'pComp3', 'pComp4', 'pComp5', 'pComp6', 'pComp6', 'pComp7', 'pComp8', 'pComp9', 
								 'pComp10', 'pComp11', 'pComp12', 'pComp13', 'pComp14', 'pComp15', 'pComp16', 
								 'pCompDosage1', 'pCompDosage2','pCompDosage3', 'pCompDosage4', 'pCompDosage5', 'pCompDosage6',
								 'pCompDosage7', 'pCompDosage8','pCompDosage9', 'pCompDosage10', 'pCompDosage11', 'pCompDosage12',
								 'pCompDosage13', 'pCompDosage14', 'pCompDosage15', 'pCompDosage16',
								 'pCompPrice1', 'pCompPrice2', 'pCompPrice3', 'pCompPrice4', 'pCompPrice5',
								 'pCompPrice6', 'pCompPrice7', 'pCompPrice8', 'pCompPrice9', 'pCompPrice10',
								 'pCompPrice11', 'pCompPrice12', 'pCompPrice13', 'pCompPrice14', 'pCompPrice15',
								 'pCompPrice16', 'pIVSupply1', 'pIVSupply2', 'pIVSupply3', 'pIVSupply4', 'pIVSupply5',
								 'pIVSupply6', 'pIVSupply7', 'pIVSupply8', 'pIVSupply9', 'pIVSupply10','pIVSupplyPrice1',
								 'pIVSupplyPrice2', 'pIVSupplyPrice3', 'pIVSupplyPrice4', 'pIVSupplyPrice5', 'pIVSupplyPrice6',
								 'pIVSupplyPrice7', 'pIVSupplyPrice8','pIVsupplyPrice9', 'pIVSupplyPrice10',
								 'pUnitPrice', 'pType', 'pTotalAmount', 'updated_at', 'deleted_at', 'post_on'];	
	
	protected $dates = ['post_on','deleted_at'];
	protected $guarded = ['id'];
	protected $table = "services";
	
	public function setLiveAttribute($value)
	{
		$this->attributes['live'] = (boolean)($value);
	}

	public function getShortContentAttribute()
	{
		return substr($this->content, 0, random_int(60, 150)).'...';

	}

	/*public function setRandomStringAttribute($number)
	{
		$this->attributes['pNumber'] = str_random($number);
	}*/
	
	public function setRandomStringAttribute($number)
	{
		$this->attributes['pServiceNo'] = str_random($number);
	}
	
	public function setPostOnAttribute($value)
	{
		$this->attributes['post_on'] = Carbon::parse($value);
	}
	
}
