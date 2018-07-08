<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Product extends Model
{
    protected $guarded = ['id'];
    public static function storeProduct($title, $content = '',  $file = '', $price = 0, $category_id = 0)
    {
        $product = new Product();
        $product->name = $title;
        $product->description = $content;
        $product->price = $price;
        $product->category_id = $category_id;
        if (!empty($file)) {
            $product->photo = $file;
        }
        $product->save();
        $id = $product->id;
        return $id;
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
