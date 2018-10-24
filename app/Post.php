<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //tabela posts
    protected $table = 'posts';
    //chave primaria do banco
    protected $primarykey = 'id';
    //cada um representa uma coluna no banco
    protected $fillable = [
        'title',
        'text',
        'image_location',
        'author_id',
        'slug'
    ];

    public function author()
    {
        return $this->belongsTo(User::class, 'author_id', 'id');
    }

    //relação de post com comentarios
    public function comments()
    {
        return $this->hasMany(Comment::class, 'post_id', 'id');
    }

    
}
