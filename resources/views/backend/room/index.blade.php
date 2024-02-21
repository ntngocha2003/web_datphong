@include('backend.room.component.breadcrumb',['title'=> $config['seo']['index']['title']])
<div class="row mt20">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>{{$config['seo']['index']['tableHeading']}}</h5>
               
            </div>
            <div class="ibox-content">
                @include('backend.room.component.filter')
                @include('backend.room.component.table')
                @include('backend.room.component.paginating')
            </div>
        </div>
    </div>
</div>
