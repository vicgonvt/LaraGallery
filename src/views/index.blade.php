@foreach($albums as $album)

    <div class="col-lg-3 col-md-4 col-xs-6">

        <a href="{{ $album->path() }}">
            <img src="lara_gallery/{{ $album->images()->first()->thumbnail() }}" class="img-responsive">
            <h4>{{ $album->album_name }}</h4>
        </a>

    </div>
    
@endforeach