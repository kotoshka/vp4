<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Post extends Model
{
    protected $guarded = ['id'];
    public static function storePost($title, $content, $file = '')
    {
        $post = new Post();
        $post->title = $title;
        $post->content = $content;
        $post->user_id = Auth::id();
        if (!empty($file)) {
            $post->image = $file;
        }
        return $post->save();
    }
    public static function uploadFile(array $files)
    {
        try {
            // нужно ли использовать обе или достаточно move_uploaded_file?
            if (!is_uploaded_file($files['tmp_name'])) {
                throw new \Exception('Возможная атака с участием загрузки файла');
            }
            if (!move_uploaded_file($files['tmp_name'], "img/upload/" . $files['name'])) {
                throw new \Exception('Возможная атака с участием загрузки файла');
            }
            return "img/upload/" . $files['name'];
        } catch (\Exception $e) {
            $data['error'] = $e->getMessage();
        }
    }

}
