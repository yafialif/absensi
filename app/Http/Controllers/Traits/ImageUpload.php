<?php
/**
 * Created by PhpStorm.
 * User: yafialif
 * Date: 25/02/19
 * Time: 18.03
 */

namespace App\Http\Controllers\Traits;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ImageUpload
{

    public function saveImage(Request $request){
        if (!file_exists(public_path('uploads/foto/'))) {
            mkdir(public_path('uploads/foto/'), 0777);
        }
        foreach ($request->all() as $key => $value) {
            if ($request->hasFile($key)) {
                $file = $request->file('image');
                $ext = $file->getClientOriginalExtension();
                $datetime = date('d-m-Y_H:m:s');
                $newName = rand(100000, 1001238912) . "_" . $datetime . "." . $ext;
                $location = public_path('uploads/foto/'. $newName);
                Image::make($file)->resize(500, 500, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($location);
                $image = url('uploads/foto') . '/' . $newName;
                $request = new Request(array_merge($request->all(), [$key => $image]));
            }
        }
        return $request;
    }

}
