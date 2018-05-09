<div class="row">
    @foreach($album->images as $image)

        <div class="col-lg-3 col-md-4 col-6">

            <div style="position: relative;">
                <a href="{{ url()->current() . '/' . $image->id }}">

                    <img src="{{ $image->thumbnail() }}"
                         class="img-fluid"
                         style="padding: 15px 0;">

                    <div>
                        <a href="{{ $image->fullImage() }}" download="download">

                            <i class="fa fa-cloud-download fa-2x download-div" aria-hidden="true"></i>

                        </a>
                    </div>

                </a>
            </div>

        </div>

        @endforeach
</div>