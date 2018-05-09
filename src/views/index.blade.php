@foreach($albums->groupBy('category')->reverse() as $category => $albums)

    <div class="clearfix"></div>

    <div class="card mb-4">
        <div class="card-header text-white" style='background: #333;'>{{ $category }}</div>

        <div class="card-body">
            <div class="row">
                @foreach($albums as $album)

                    <div class="col-md-3 col-4">

                        <a href="{{ $album->path() }}" class="thumbnail">
                            <img src="{{ $album->images->first()->thumbnail() }}" class="img-fluid">

                            <div class="py-2">{{ $album->album_name }}</div>
                        </a>
                    </div>

                @endforeach
            </div>
        </div>

        <div class="card-footer">
            Last Update: {{ $album->updated_at->diffForHumans() }}
        </div>
    </div>
@endforeach