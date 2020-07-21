<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class WriterArticalModel extends Model
{
    protected $table = 'tbl_writer_article';
    protected $fillable =[
        'writer_article_id',
        'writer_article_file',
        'writer_article_comment',
        'get_writer',
        'get_article',
    ];
    protected $primaryKey = 'writer_article_id';
    public $incrementing = false;  // You most probably want this too

    /* Foreign Key */
    public function getwriter(){
        return $this->belongsTo(WriterModel::class, 'get_writer');
    }

    public function getarticle(){
        return $this->belongsTo(ArticleModel::class, 'get_article');
    }
   
    
}
