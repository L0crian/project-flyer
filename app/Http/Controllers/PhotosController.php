<?php

namespace App\Http\Controllers;

use App\Flyer;
use App\Photo;
use Illuminate\Http\Request;
use App\Http\Requests\AddPhotoRequest;
use App\AddPhotoToFlyer;

class PhotosController extends Controller
{
    public function store($zip, $street, AddPhotoRequest $request)
    {
        $flyer = Flyer::locatedAt($zip, $street);
        $photo = $request->file('photo');

        (new AddPhotoToFlyer($flyer, $photo))->save();

        /*  $photo = $this->makePhoto($request->file('photo'));
          Flyer::locatedAt($zip, $street)->addPhoto($photo);*/
    }

    public function destroy($id)
    {
        Photo::findorFail($id)->delete();

        return back();
    }

    /*   protected function makePhoto(UploadedFile $file)
       {
           return Photo::named($file->getClientOriginalName())
                   ->move($file);
       }*/
}
