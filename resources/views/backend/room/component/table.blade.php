<table class="table table-bordered table-striped">
    <thead>
    <tr>
        <th>
            <input type="checkbox" value="" id="checkAll" class="input-checkbox"/>
        </th>
        <th>Tên phòng</th>
        <th>Mô tả</th>
        <th>Gía phòng</th>
        <th>Trạng thái</th>
        <th class="text-center">Thao tác</th>
    </tr>
    </thead>
    <tbody>
        @if(@isset($rooms) && is_object($rooms))
            @foreach ($rooms as $room)
                <tr>
                    <td>
                        <input type="checkbox" value="" id="checkAll" class="input-checkbox"/>
                    </td>

                    <td>
                        {{$room->nameRoom}}
                    </td>
            
                    <td>
                        {{$room->description}}
                    </td>
            
                    <td>
                        {{$room->price}}
                    </td>
            
                    <td>
                        {{$room->status}}
                    </td>
                   
                    <td class="text-center">                 
                        {{-- <a href="{{route('room.edit',$room->id)}}" class="btn btn-success"><i class="fa fa-edit"></i></a>
                        <a href="{{route('room.delete',$room->id)}}" class="btn btn-danger"><i class="fa fa-trash"></i></a> --}}
                    </td>
                </tr>         
            @endforeach
        @endif

    </tbody>
</table>

