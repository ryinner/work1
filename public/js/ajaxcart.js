function show() {
    $(document).ready(function(){
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
            $('#tbody').append('<tr scope="row"  class="align-middle"><td>'+obj[key][1]['name']+'</td><td>'+obj[key][1]['qty']+'</td><td>'+obj[key][1]['price']*obj[key][1]['qty']+'</td></tr>');
        } 
    } 
}

$('#dropdown-toggle').click(function(){
    $('.dropdown-menu').toggleClass('show');
    return false;
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

$('#filter').click(function(){
    let id = $('#cat').val();
    let min = $('#min').val();
    let max = $('#max').val();

    let brands = [];
    $('input.brands[type=checkbox]:checked').each(function() {
        brands.push($(this).val());
    });

    let params = [];
    let types = [];
    $('input.params[type=checkbox]:checked').each(function() {
        types.push($(this).attr('id'));
        params.push($(this).val());
    });

    types = new Set(types);
    types = Array.from(types);

    $.ajax({
        url: '/categories/filter/',
        data: {id:id,min:min,max:max,brands:brands,types:types,params:params},
        method: 'post',
        success: filter
    });

    function filter(data){
        let goods = JSON.parse(data);
        goods = Object.entries(goods);
        console.log(goods);
        $('#goods').empty();
        for(item in goods) {
            console.log(goods[item][1]);
            $('#goods').append('<div class="col-md-3 col-sm-6 product"><div class="product-img"><a href="good/'+goods[item][1].id_goods+'"><img src="../../'+goods[item][1].photo_goods+'" alt=""></a><a href="good/'+goods[item][1].id_good+'" class="btn btn-primary add-cart">Посмотреть</a></div><h6><a href="good/'+goods[item][1].id_goods+'">'+goods[item][1].title_goods+'</a></h6></div>');
        }
        
    }

    return false;
});
