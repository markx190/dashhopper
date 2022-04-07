<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;

class Personal extends Model
{
    use SoftDeletes;
	//protected $table = 'members';
	protected $fillable = ['pPersonalIdNo','pUserIdNo', 'pDateofApplication', 'pRiyadh', 'pJeddah', 'pMadinah', 'pAlAhsa', 
							     'pDammam', 'pPHCs', 'pNoPreference', 'pPositionApplied', 'pAreaofSpecialty', 'pAvailability', 'pReferredBy', 
								 'pRecSource', 'pOccupation', 'pLastName', 'pFirstName', 'pMiddleName', 'pSuffix', 'pGender', '	pBirthDate', '	pAge',
								 'pMarital', 'pPlaceofBirth', 'pNationality', 'pReligion', 'pNameOfSpouse', 'pIsSpouse', 'pIqamaPermit', 'pAddress', 'pCurrentAddress', 
								 'pTelephoneNo', 'pMobileNo', 'pEmailAddress', 'pCompanySponsor', 'pVisaType', 'pCollegeName1', 'pCollegeName2', 'pCollegeName3',
								 'pCountry1', 'pCountry2', 'pCountry3', 'pDateAttFrom1', 'pDateAttFrom2', 'pDateAttFrom3', 'pDateAttTo1', 'pDateAttTo2', 'pDateAttTo3',
								 'pQualification1', 'pQualification2', 'pQualification3', 'pPro1', 'pPro2', 'pPro3', 'pCountryPro1', 'pCountryPro2', 'pCountryPro3', 
								 'pLicensePro1', 'pLicensePro2', 'pLicensePro3', 'pExpiryDate1', 'pExpiryDate2', 'pExpiryDate3', 'pTraining1', 'pTraining2', 'pTraining3', 
								 'pTrainingAttFrom1', 'pTrainingAttFrom2', 'pTrainingAttFrom3', 'pTrainingAttTo1', 'pTrainingAttTo2', 'pTrainingAttTo3', 'pCourse1',
								 'pCourse1', 'pCourse2', 'pCourse3', 'avatar', 'live', 'created_by', 'created_at', 
								 'updated_at', 'deleted_at', 'post_on'];	
	
	protected $dates = ['post_on','deleted_at'];
	protected $guarded = ['id'];
	protected $table = "personals";
	
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
		$this->attributes['pPersonalIdNo'] = str_random($number);
	}
	
	public function setPostOnAttribute($value)
	{
		$this->attributes['post_on'] = Carbon::parse($value);
	}
}
