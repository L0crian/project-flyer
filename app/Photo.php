<?php

namespace App;

use Image;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class Photo extends Model
{
    protected $table = 'flyer_photos';

    /*    protected $file;*/

    protected $fillable = ['path', 'name', 'thumbnail_path'];

    /* protected $baseDir = 'images/photos';*/

    /*   protected static function boot()
        {
            static::creating(function($photo) {
               return $photo->upload();
            });
        }*/

    public function flyer()
    {
        return $this->belongsTo('App\Flyer');
    }

    /*    public static function fromFile(UploadedFile $file)
        {
            $photo = new static;

            $photo->file = $file;


           return $photo->fill([
                'path' => $photo->fileName(),
                'name' => $photo->filePath(),
                'thumbnail_path' => $photo->thumbnailPath()
            ]);

        }*/

    /*    public function fileName()
        {
            $name =  sha1(time() . $this->file->getClientOriginalName());
            $extension = $this->file->getClientOriginalExtension();

            return "{$name}.{$extension}";
        }*/

    public function setNameAttribute($name)
    {
        $this->attributes['name'] = $name;
        $this->path = $this->baseDir() . '/' . $name;
        $this->thumbnail_path = $this->baseDir() . '/tn-' . $name;
    }

    /*  public function filePath()
      {
          return $this->baseDir() . '/' . $this->fileName();
      }

      public function thumbnailPath()
      {
          return $this->baseDir() . '/tn-' . $this->fileName();
      }*/

    public function baseDir()
    {
        return 'images/photos';
    }

    public function delete()
    {
        \File::delete([
            $this->path,
            $this->thumbnail_path
        ]);

        parent::delete();
    }
}

/*    public static function named($name)
    {
        return (new static)->saveAs($name);
    }*/

 /*   protected function saveAs($name)
    {
        $this->name = sprintf("%s-%s", time(), $name);
        $this->path = sprintf("%s/%s", $this->baseDir, $this->name);
        $this->thumbnail_path = sprintf("%s/tn-%s", $this->baseDir, $this->name);

        return $this;
    }*/

/*    public function move(UploadedFile $file)
    {
        $file->move($this->baseDir, $this->name);

        $this->makeThumbnail();

        return $this;
    }*/

/*    public function upload()
    {
        $this->file->move($this->baseDir(), $this->name);

        $this->makeThumbnail();

        return $this;
    }*/

/*    protected function makeThumbnail()
    {
        Image::make($this->filePath())
            ->fit(200)
            ->save($this->thumbnailPath());
    }*/

/*    protected function makeThumbnail()
    {
        Image::make($this->path)
            ->fit(200)
            ->save($this->thumbnail_path);
    }
}*/
