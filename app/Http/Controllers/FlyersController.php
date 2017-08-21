<?php

namespace App\Http\Controllers;

use App;
use App\Flyer;
use App\Photo;
use Illuminate\Http\Request;
use App\Http\Requests\FlyerRequest;
use App\Http\Requests\AddPhotoRequest;
use App\Http\Controllers\Traits\AuthorizesUsers;
use Symfony\Component\HttpFoundation\File\UploadedFile;


class FlyersController extends Controller
{
   /* use AuthorizesUsers;*/

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['show']]);

        parent::__construct();
    }

    public function create()
    {
        return view('flyers.create');
    }

    public function store(FlyerRequest $request)
    {
        $flyer = $this->user->publish(
            new Flyer($request->all())
        );

        flash()->success('Success!', 'Your flyer has been created.');
        return redirect(flyer_path($flyer));
    }

    public function show($zip, $street)
    {
        $street = str_replace('-', ' ', $street);

        $flyer = Flyer::locatedAt($zip, $street);

        return view('flyers.show', compact('flyer'));
    }

    public function addPhoto($zip, $street, AddPhotoRequest $request)
    {
     /*   $this->validate($request, [
            'photo' => 'required|mimes:jpg,png,jpeg,bmp'
        ]);


        if(! $this->userCreatedFlyer($request)) {
            return $this->unauthorized($request);
        }*/
        $photo = Photo::fromFile($request->file('photo'));

        Flyer::locatedAt($zip, $street)->addPhoto($photo);

      /*  $photo = $this->makePhoto($request->file('photo'));
        Flyer::locatedAt($zip, $street)->addPhoto($photo);*/
    }

 /*   protected function makePhoto(UploadedFile $file)
    {
        return Photo::named($file->getClientOriginalName())
                ->move($file);
    }*/

}

