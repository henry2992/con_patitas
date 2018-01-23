<?php

namespace App\Http\Controllers;

use App\Pet;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
class FileUploadController extends Controller
{
    //

    function __construct()
    {
        $this->middleware("auth");
    }

    public function uploadFiles(Request $request ,$type,$size)
    {
        switch ($type) {
            case "avatar" :
                /*  */
                $rootPath="uploads/avatar";
                break;
            case "product" :
                /*      */
                $rootPath="uploads/products";
                break;

            default :
                break;
        }


        $valid_exts = array('jpeg', 'jpg', 'png', 'gif','JPG','PNG','GIF','JPEG');

        foreach ($request->file('image') as $key => $image)
        {
//                 get uploaded file extension
                $ext = explode('.',$image->getClientOriginalName());
                $ext = strtolower(end($ext));
                $imageRealPath  =   $image->getRealPath();
                // looking for format and size validity

                if (in_array($ext,$valid_exts) && $image->getClientSize() /1024/1024 < 4)
                {

                    // unique file path
                    $uid = uniqid();
                    $date = date('Y-m-d');
                    $year = date("Y");


                    if(!is_dir($rootPath .'/'.$year))
                    {
                        mkdir($rootPath.'/'.$year);
                    }
                    if(!is_dir($rootPath .'/'.$year.'/'.$date))
                    {
                        mkdir($rootPath .'/'.$year.'/'.$date);
                    }

                    $path = $rootPath .'/'.$year.'/'.$date;
                    $fileName = $uid . "." .$ext;

                    $img = Image::make($imageRealPath);  /* Intervention library */
                    $img->resize(intval($size), null, function($constraint) {
                        $constraint->aspectRatio();
                    });

                    // move uploaded file from temp to uploads directory
                    if ($img->save($path.'/'.$fileName))
                    {
                        $returnJson = array("status"=>"success","path" => $path,"filename" =>$fileName);

                        return response()->json($returnJson);
                    }
                    else {
                        $returnJson['status'] = 'Subida fallida: error desconocido!';
                        return response()->json($returnJson);
                    }
                }
                else {
                    $returnJson['status'] = 'Subida Fallida: Formato no soportado o fichero demasiado grande!';
                    return response()->json($returnJson);
                }
        }
    }
}
