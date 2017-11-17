{{-- phân trang có css, cần truyền vào mảng ls_books và count total_books --}}
@php
if($total_books % 8 == 0)
  $total_page = $total_books / 8;
else $total_page = $total_books / 8 + 1;

$current_page = $ls_books->currentPage();
@endphp

@if ($ls_books->hasPages())
<ul class="pagination modal-3 float-right">
  {{-- Previous Page Link --}}
  @if ($current_page > 1 && $total_page > 1)
  @if ($ls_books->onFirstPage())
  <li><a href="#" class="prev disabled">&laquo</a></li>
  @else
  <li><a href="{{ $ls_books->previousPageUrl() }}" rel="prev" class="prev">&laquo</a></li>
  @endif
  @endif

  {{-- Pagination Elements --}}
  @for ($i = 1; $i <= $total_page; $i++)
  @if ($i == $current_page)
  <li><a href="#" class="active">{{$i}}</a></li>
  @else
  <li><a href="{{$ls_books->url($i)}}">{{$i}}</a></li>
  @endif
  @endfor

  {{-- Next Page Link --}}
  @if ($ls_books->hasMorePages())
  <li><a href="{{ $ls_books->nextPageUrl() }}" rel="next" class="next">&raquo;</a></li> 
  @else
  <li><a href="#" class="next disabled">&raquo;</a></li> 
  @endif
</ul>

@endif