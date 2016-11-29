<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
	public $timestamps =true;
	public $table='project';
	protected $fillable = [
		'project_Title', 'project_Description', 'project_Date', 'project_StartTime','project_status', 'project_image', 'category', 'created_at', 'updated_at',
	];


    public function  User(){

        return $this->belongsToMany('App\User', 'donate_project')->withPivot('receipt_id')->withPivot('donation_type')->withTimestamps();
    }
}
