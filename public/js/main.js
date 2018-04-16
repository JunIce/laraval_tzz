$(function(){
    $.ajax({
        method: 'GET',
        url: '/ajax/homelist/',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        },
        data:{
            page: 1,
            classid: 2
        },
        success: function( id ) {
            
        }
    });
})