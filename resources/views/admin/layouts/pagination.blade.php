<?php
// config
$link_limit = 10; // maximum number of links (a little bit inaccurate, but will be ok for now)
?>

@if ($paginator->lastPage() > 1)
<table style="margin:25px 0 0 4px;float:left">
    <tr>
        <th colspan="7">
            <div class="ui left floated pagination menu">
                <a href="{{ $paginator->url(1) }}" class="icon item {{ ($paginator->currentPage() == 1) ? ' disabled' : '' }}">
                    <i class="left chevron icon "></i>
                </a>
        @for ($i = 1; $i <= $paginator->lastPage(); $i++)
            <?php
            $half_total_links = floor($link_limit / 2);
            $from = $paginator->currentPage() - $half_total_links;
            $to = $paginator->currentPage() + $half_total_links;
            if ($paginator->currentPage() < $half_total_links) {
                $to += $half_total_links - $paginator->currentPage();
            }
            if ($paginator->lastPage() - $paginator->currentPage() < $half_total_links) {
                $from -= $half_total_links - ($paginator->lastPage() - $paginator->currentPage()) - 1;
            }
            ?>
            @if ($from < $i && $i < $to)
                <a href="{{ $paginator->url($i) }}" class="item {{ ($paginator->currentPage() == $i) ? ' active' : '' }}">
                    {{ $i }}
                </a>
            @endif
        @endfor
        <a href="{{ $paginator->url($paginator->lastPage()) }}" class="icon item {{ ($paginator->currentPage() == $paginator->lastPage()) ? ' disabled' : '' }}">
            <i class="right chevron icon"></i>
        </a>
            </div>
        </th>
    </tr>
</table>
@endif