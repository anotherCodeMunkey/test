<?php 
namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Post extends Model 
{

    protected $fillable = ['post', 'author_id', 'created_at', 'updeted_at'];
    
    public function getLatestPosts()
    {
        $posts = self::latest('created_at')->get();
        return $posts;
    }

}
