<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class WriterModel extends Model
{
    protected $table = 'tbl_writer';
    protected $fillable = [
        'writer_name',
        'writer_email',
        'writer_pasword',
        'writer_address',
        'writer_phone',
        'writer_status',
        'writer_assign_project'
    ];
    protected $primaryKey = 'writer_id';
    public $incrementing = false;  // You most probably want this too

    /* Asiign Foreign Key */
    public function project()
    {
        return $this->belongsTo(ProjectModel::class, 'writer_assign_project');
    }
}
