<div class="col-xs-12">

    <img src="{{ $item->fullImage() }}"
         class="img-responsive"
         style="padding: 15px 0;">

    <div>
        <a href="{{ $item->fullImage() }}" download="download">

            <i class="fa fa-cloud-download fa-2x download-div-detail" aria-hidden="true"></i>

        </a>
    </div>

    <p class="text-center">
        <a href="{{ $item->fullImage() }}" download="download">download</a> |
        prev | next</p>
</div>