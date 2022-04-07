<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;

class Item extends Model
{
    use SoftDeletes;
	//protected $table = 'members';
    protected $fillable = ['id', 'UserIdNo', 'ItemNo', 'DonationIdNo', 'FacIdNo', 'ItemName', 'BloodType', 'Category', 'Quantity', 'UnitOfMeasure', 'PackageType', 'BuyingPrice', 
	                       'UnitPrice', 'BegInventory', 'CurInventory', 'RemInventory', 'AboRhd', 'RefNo', 'RefRowNo', 'CompanyName', 'Network', 'Region', 'PurchaseDate', 
						   'ExpiryDate', 'DeliveryTime', 'updated_at', 'deleted_at', 'post_on'];	
	
	protected $dates = ['post_on','deleted_at'];
	protected $guarded = ['id'];
	protected $table = "items";
	
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
		$this->attributes['ItemNo'] = str_random($number);
		$this->attributes['DonationIdNo'] = str_random($number);
		$this->attributes['FacIdNo'] = str_random($number);
	}
	
	public function setPostOnAttribute($value)
	{
		$this->attributes['post_on'] = Carbon::parse($value);
    }

}
