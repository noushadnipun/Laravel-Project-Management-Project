<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class ProjectModel extends Model
{
    protected $table = 'tbl_project';
    protected $fillable = [
        //'project_id',
        'project_name',
        'project_description',
        'project_status'
    ];
    protected $primaryKey = 'project_id';
    public $incrementing = false;  // You most probably want this too
}
