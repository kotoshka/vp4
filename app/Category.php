<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded = ['id'];
    public static function storeCategory($title, $content, $file = '')
    {
        $category = new Category();
        $category->name = $title;
        $category->description = $content;
        if (!empty($file)) {
            $category->photo = $file;
        }
        return $category->save();
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
