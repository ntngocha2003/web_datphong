<!-- paginating  -->
@if($numberOfPage > 1)
<div class="d-flex justify-content-center align-items-center my-2">
    <a class="btn btn-success" href="">Trước</a>  
    @for($i = 1; $i <= $numberOfPage; $i++)
        @if($pageIndex == $i)
            <a class="btn btn-primary ms-2" href="">{{$i}}</a> 
        @else
            
            @if($i == 1 || $i == $numberOfPage || ($i <= $pageIndex + 4 && $i >= $pageIndex - 4))
                <a class="btn btn-success ms-2" href="">{{$i}}</a>
            @elseif($i == $pageIndex - 5 || $i == $pageIndex + 5)
                <a class="btn btn-success ms-2" href="">...</a>
            @endif
        @endif
    @endfor
    <a class="btn btn-success ms-2" href="">Sau</a>
</div>
@endif