{{-- @include('backend.orderRoom.component.breadcrumb',['title'=>$config['seo']['delete']['title']]) --}}
<div class="row mt20">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>{{$config['seo']['index']['tableHeading']}}</h5>
               
            </div>
            <div class="ibox-content">
                @include('backend.user.component.filter')
                @include('backend.user.component.table')
                @include('backend.user.component.paginating')
            </div>
        </div>
    </div>
</div>