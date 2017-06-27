@foreach($album->images as $image)

    <div class="col-lg-3 col-md-4 col-xs-6">

        <a href="{{ url()->current() . '/' . $image->id }}">

            <img src="{{ $image->thumbnail() }}"
                 class="img-responsive"
                 style="padding: 15px 0;">

        </a>

    </div>

@endforeach