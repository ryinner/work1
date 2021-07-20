<h1 class="mt-3 text-center">-Chair-</h1>

<div class="row">
    <article class="container type-product">
            <div class="justify-content">
            <div class="row text-center">
                <div class="col-sm-6 magnific-wrap">
                    <div class="img-medium text-center">
                        <div class="medium-slider">
                            <a href="#" title="Farmhouse chair" class="magnific"><img src="../../{{good.photo_goods}}" alt=""></a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 m-center">
                    <h3>{{ good.title_goods }}</h3>
                    <span class="price">
                        <span class="amount">$ {{ good.price_goods }}</span>
                    </span>
                    <p>{{good.desrp_goods}}</p>
                    <form method="POST" action="/categories/good/addtocart/{{good.id_goods}}">
                    <div class="add-cart">
                        <input type="number" id="number" name="number" class="form-control text-center" value="1" min="1" max="{{good.count_goods}}">
                        <input type="hidden" id="title" name="title" value="{{good.title_goods}}">
                        <input type="hidden" id="price" name="price" value="{{good.price_goods}}">
                        <input type="hidden" id="photo" name="photo" value="{{good.photo_goods}}">
                        <p></p>
                        <button type="submit" id="click" class="btn btn-primary btn-thn add-cart">Add to cart</button>
                    </div>
                    <table class="table cart-total">
                            <tr>
                                <th>Category:</th>
                                <td>{{ cat.cat_name }}</td> 
                            </tr>
                            <tr>
                                <th>Count:</th>
                                <td>{{good.count_goods}}</td>
                            </tr>
                    </table>
                </div>
            </div>    
        </div>
    </article>
</div>
