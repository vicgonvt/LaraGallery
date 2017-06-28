<div class="col-xs-12">

    <nav aria-label="...">
        <ul class="pager">
            <li class="previous"><a href="{{ $item->prev() }}"><span aria-hidden="true">&larr;</span> prev</a></li>
            <li class="next"><a href="{{ $item->next() }}">next <span aria-hidden="true">&rarr;</span></a></li>
        </ul>
    </nav>

    <p class="text-center">
        <a href="{{ $item->fullImage() }}" download="download">download</a>
    </p>

    <img src="{{ $item->fullImage() }}"
         class="img-responsive"
         style="padding: 15px 0;">

    <div>
        <a href="{{ $item->fullImage() }}" download="download">

            <i class="fa fa-cloud-download fa-2x download-div-detail" aria-hidden="true"></i>

        </a>
    </div>

</div>