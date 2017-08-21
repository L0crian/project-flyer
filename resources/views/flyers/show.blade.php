@extends('layout')

@section('content')
    <div class="row">
        <div class="col-md-4 ">
            <h1>{!! $flyer->street  !!}</h1>
            <h2>{!! $flyer->price  !!}</h2>
            <hr>
            <div class="description">{!! nl2br($flyer->description) !!}</div>
        </div>

        <div class="col-md-8 fallery">

            @foreach($flyer->photos->chunk(4) as $photos)
                <div class="row">
                    @foreach ($photos as $photo)
                        <div class="col-md-3 gallery__image">
                          {!! link_to('Delete', "/photos/{$photo->id}", 'DELETE') !!}
                            <a href="/{{$photo->path}}" data-lity>
                                <img src="/{{ $photo->thumbnail_path  }}" alt="">
                            </a>
                        </div>
                    @endforeach
                </div>
            @endforeach
            @if($user && $user->owns($flyer))
                <hr>
                <form id="addPhotosForm" action="{{ route('store_photo_path', [$flyer->zip, $flyer->street]) }}"
                      method="POST"
                      class="dropzone">
                    {{ csrf_field() }}
                </form>
            @endif
        </div>
    </div>

@endsection

@section('scripts.footer')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.1.0/dropzone.js"></script>
    <script>
        Dropzone.options.addPhotosForm = {
            paramName: 'photo',
            maxFilessize: 3,
            acceptedFiler: '.jpg, .jpeg, .png, .bmp',
        }
    </script>
@endsection