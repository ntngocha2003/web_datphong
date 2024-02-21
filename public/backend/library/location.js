(function($){
    'use strict';
    var HT={};
    
    HT.getLocation=()=>{
        $(document).on('change','.location',function(){
            let _this=$(this)
           
            let option ={
                'data':{
                    'location_id':_this.val(),

                },
                'target':_this.attr('data-target')
            }
            HT.sendDataTogetLocation(option)
        })
    }

    HT.sendDataTogetLocation=(option)=>{
        $.ajax({
            type: 'get',
            url: "location/getLocation",
            data:option,
            dataType: 'json',
            
            success: function(res) {
              
               $('.'+option.target).html(res.html);
            },
            error: function(jqXHR,textStatus,errorThrown) {
                console.log('lỗi')
            },
         });
    }

    HT.getLocation_edit=()=>{
        $(document).on('change','.location_edit',function(){
            let _this=$(this)
           
            let option ={
                'data':{
                    'location_id':_this.val(),

                },
                'target':_this.attr('data-target')
            }
            HT.sendDataTogetLocation_edit(option)
        })
    }

    HT.sendDataTogetLocation_edit=(option)=>{
        $.ajax({
            type: 'get',
            url: "user/location/getLocation_edit",
            data:option,
            dataType: 'json',
            
            success: function(res) {
              
               $('.'+option.target).html(res.html);
            },
            error: function(jqXHR,textStatus,errorThrown) {
                console.log('lỗi')
            },
         });
    }

    HT.locationCity=()=>{
        $('.provinces').trigger('change');  
        
       
    }

    $(document).ready(function(){
        HT.getLocation();
        HT.getLocation_edit();
        HT.locationCity();
     });


})(jQuery)