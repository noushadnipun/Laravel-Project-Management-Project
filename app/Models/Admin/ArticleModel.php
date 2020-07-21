<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class ArticleModel extends Model
{
    protected $table = 'tbl_article';
    protected $fillable = [
        'article_title',
        'article_description',
        'article_due_date',
        'article_cost',
        'article_project',
        'article_writer'
    ];
    protected $primaryKey = 'article_id';
    public $incrementing = false;  // You most probably want this too


    /* foriegn key assign */
    public function project()
    {
        return $this->belongsTo(ProjectModel::class, 'article_project');
    }

    public function article()
    {
        return $this->belongsTo(WriterModel::class, 'article_writer');
    }

    public function articlecomment()
    {
        return $this->hasMany(WriterArticalModel::class, 'get_article')->orderBy('created_at', 'desc');
    }


}
