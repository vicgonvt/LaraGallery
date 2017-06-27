@foreach($albums as $album)

    <div class="col-lg-3 col-md-4 col-xs-6">

        <a href="{{ $album->path() }}">
            <img src="{{ $album->images()->first()->thumbnail() }}" class="img-responsive">
            <p>{{ $album->album_name }}</p>
        </a>

    </div>

@endforeach