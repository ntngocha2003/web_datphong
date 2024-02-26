<div class="filter-wrapper">
    <div class="uk-flex uk-flex-middle uk-flex-space-between">
         <div class="perpage">
             <div class="uk-flex uk-flex-middle uk-flex-spade">
                 <select name="perpage" class="form-control input-sm perpage filter mr10">
                     @for($i=20;$i<=200;$i=$i+20)
                         <option value="{{$i}}">{{$i}} bản ghi</option>
                     @endfor
                 </select>
                 
             </div>
         </div>
         <div class="action">
             <div class="uk-flex uk-flex-middle">
                 <div class="uk-search uk-flex uk-flex-middle mr10">
                     <div class="input-group">
                         <input type="text" name="keyword" value="" placeholder="Nhập từ khóa bạn muốn tìm kiếm..." class="form-control" />
                         <span class="input-group-btn">
                             <button class="btn btn-primary mb0 btn-sm" type="submit" name="search" value="search">Tìm kiếm</button>
                         </span>
                     </div>
                 </div>
                 <a href="{{route('room.create')}}" class="btn btn-success"><i class="fa fa-plus"></i>Thêm mới phòng</a>
             </div>
         </div>
    </div>
 </div>