<div class="col-12">

    <div class="row d-flex">
        <div class="col-6">
            <nav aria-label="Page navigation">
                <ul class="pagination">
                    <li class="page-item"><a class="page-link" href="{{ $item->prev() }}">Previous</a></li>
                    <li class="page-item"><a class="page-link" href="{{ $item->next() }}">Next</a></li>
                </ul>
            </nav>
        </div>

        <div class="col-6">
            <div class="text-right">
                <a href="{{ $item->fullImage() }}" download="download">download</a>
            </div>
        </div>
    </div>

    <img src="{{ $item->fullImage() }}"
         class="img-fluid"
         style="padding: 15px 0;">

    <div>
        <a href="{{ $item->fullImage() }}" download="download">

            <i class="fa fa-cloud-download fa-2x download-div-detail" aria-hidden="true"></i>

        </a>
    </div>

</div>