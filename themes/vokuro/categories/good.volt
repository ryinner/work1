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
                    </span>
                    <p>{{good.desrp_goods}}</p>
                    <form>
                    <div class="add-cart">
                        <input type="number" id="number" name="number" class="form-control text-center" value="1" min="1" max="{{good.count_goods}}">
                        <input type="hidden" id="title" name="title" value="{{good.title_goods}}">
                        <input type="hidden" id="photo" name="photo" value="{{good.photo_goods}}">
                        <p></p>
                        {% for price in good.prices %}
                        <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="price" id="price" checked value="{{ price.value_prices }}">
                        <input type="hidden" id="{{ price.value_prices }}" name="{{ price.value_prices }}" value="{{ price.value_prices }}">
                        <label class="form-check-label" for="inlineRadio1"><span class="amount">$ {{ price.value_prices }}</span></label>
                        </div>
                        {% endfor %}
                        <button id="buy" value="{{good.id_goods}}" class="btn btn-primary btn-thn add-cart">Add to cart</button>
                    </div>
                    </form>
                    <table class="table cart-total">
                            <tr>
                                <th>Category:</th>
                                <td>{{ cat.cat_name }}</td> 
                            </tr>
                            <tr>
                                <th>Brand:</th>
                                <td>{{brand.name_brands}}</td>
                            </tr>
                             {% for item in param %}
                                 <tr>
                                    <th>{{item.name_par}}:</th>
                                    <td>{{item.value_pg}}</td>
                                </tr>
                            {% endfor %}
                    </table>
                </div>
            </div>    
        </div>
    </article>
</div>
