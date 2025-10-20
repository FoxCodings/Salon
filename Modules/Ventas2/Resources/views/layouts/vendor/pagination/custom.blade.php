
@if ($paginator->hasPages())
    <ul class="pagination justify-content-center pagination-sm">
        @if ($paginator->onFirstPage())
            <!-- <li class="disabled"><span>← Previous</span></li> -->
            <li class="page-item disabled">
                  <a class="page-link" >
                    <span aria-hidden="true" class="material-icons">chevron_left</span>
                    <span>Anterior</span>
                  </a>
            </li>
        @else
            <li class="page-item">
                <a class="page-link" href="{{ $paginator->previousPageUrl() }}" aria-label="Previous">
                    <span aria-hidden="true" class="material-icons">chevron_left</span>
                    <span>Anterior</span>
                </a>
            </li>
            <!-- <li><a href="{{ $paginator->previousPageUrl() }}" rel="prev">← Previous</a></li> -->
        @endif



        @foreach ($elements as $element)

            @if (is_string($element))
                <!-- <li class="disabled"><span>{{ $element }}</span></li> -->
                <li class="page-item disabled">
                  <a class="page-link" >
                        <span>{{ $element }}</span>
                    </a>
                </li>
            @endif



            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <!-- <li class="active my-active"><span>{{ $page }}</span></li> -->
                        <li class="page-item my-active">
                          <a class="page-link" >
                                <span>{{ $page }}</span>
                            </a>
                        </li>
                    @else
                        <!-- <li><a href="{{ $url }}">{{ $page }}</a></li> -->
                        <li class="page-item ">
                            <a class="page-link" href="{{ $url }}" aria-label="1">
                                <span>{{ $page }}</span>
                            </a>
                        </li>
                    @endif
                @endforeach
            @endif
        @endforeach



        @if ($paginator->hasMorePages())
        <li class="page-item">
            <a class="page-link" href="{{ $paginator->nextPageUrl() }}" aria-label="Next">
                <span>Siguiente</span>
                <span aria-hidden="true" class="material-icons">chevron_right</span>
            </a>
        </li>
            <!-- <li><a href="{{ $paginator->nextPageUrl() }}" rel="next">Next →</a></li> -->
        @else
        <li class="page-item disabled">
              <a class="page-link" >
                <span>Siguiente</span>
                <span aria-hidden="true" class="material-icons">chevron_right</span>
              </a>
        </li>

            <!-- <li class="disabled"><span>Next →</span></li> -->
        @endif
    </ul>
@endif
