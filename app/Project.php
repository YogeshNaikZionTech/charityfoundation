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

        return $this->belongsToMany('App\User', 'donate_project')->withPivot('project_cents')->withPivot('receipt_num')->withPivot('user_card')->withPivot('donation_type')->withTimestamps();
    }
}
