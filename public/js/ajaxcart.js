function show() {
    $(document).ready(function(){
            // event.preventDefault();
            // console.log("Event type: ", evt.type);
            // evt.preventDefault();
            // if(typeof e.preventDefault == 'function'){
            //     e.preventDefault();
            //   } else {
            //     e.returnValue = false;
            //   }
        $.ajax({
            url: '/cart/get',
            method: 'get',
            success: success
        });
    });
}

setInterval('show()', 100);

function success(data) {
    // console.log('<<<<\n' + data + '\n>>>>');
    let obj = JSON.parse(data);
    // obj = Object.entries(obj)
    obj = Object.entries(obj);
    // obj.forEach(([key, value]) => console.log(`${key}: ${value['name']}`,`${key}: ${value['id']}`,`${key}: ${value['qty']}`));
    $('#tbody').empty();
    // console.log(obj);
    if (obj.length==0) {
        $('#tbody').append('<tr><th>Empty</th></tr>')
    } else {
        for(key in obj){
            $('#tbody').append('<tr scope="row"><td>'+obj[key][1]['name']+'</td><td>'+obj[key][1]['qty']+'</td><td>'+obj[key][1]['price']*obj[key][1]['qty']+'</td></tr>');
        } 
    } 
}

$('#dropdown-toggle').click(function(){
    $('.dropdown-menu').toggleClass('show');
    return false
});

$('#buy').click(function(){
    title = $('#title').val();
    price = $('input[name="price"]:checked').val();
    number = $('#number').val();
    id = $('#buy').val();
    options = $('#'+price).val();
    console.log(options);
    $.ajax({
        url: '/categories/good/addtocart/'+id+'',
        data: {title:title,price:price,number:number,options:options},
        method: 'POST'
    });
    return false;
});

$('.delete-cart').click(function(){
    rowid=$(this).val();
    $.ajax({
        url:'/delete/'+rowid+'',
        data:{rowid:rowid},
        method:'GET',
        success: hide
    });
    function hide() {
        $("#" + rowid).attr('hidden','hidden');
    }
    return false;
});

$('#clear').click(function(){
    $.ajax({
        url:'/clear',
        success: hide
    });
    function hide() {
        $('.delete-cart').attr('hidden','hidden');
        $('.product').attr('hidden','hidden');
    }
    return false;
});

$(function(){
    $('.ui-slider9').slider({
        range: true,
        min: 1,
        max: 1000,
        values: ['1', '1000'],
        slide: function(event, ui) {
            $('#min').val(ui.values[0]);
            $('#max').val(ui.values[1]);
        }
    });
});