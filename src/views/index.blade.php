@foreach($albums->groupBy('category')->reverse() as $category => $albums)

    <div class="clearfix"></div>

    <div class="lead padding-25">{{ $category }}</div>

    @foreach($albums as $album)

        <div class="col-lg-3 col-md-4 col-xs-6">

            <a href="{{ $album->path() }}" class="thumbnail">
                <img src="{{ $album->images->first()->thumbnail() }}" class="img-responsive">

                <div class="text-center" style="padding: 15px 0;">{{ $album->album_name }}</div>

            </a>

        </div>

    @endforeach

@endforeach