<h1 class="mt-3 text-center">-Chair-</h1>

<div class="row">
    <article class="container type-product">
            <div class="justify-content">
            {% for item in good %}
            <div class="row text-center">
                <div class="col-sm-6 magnific-wrap">
                    <div class="img-medium text-center">
                        <div class="medium-slider">
                            <a href="#" title="Farmhouse chair" class="magnific"><img src="../../{{item.photo_goods}}" alt=""></a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 m-center">
                    <h3>{{ item.title_goods }}</h3>
                    <span class="price">
                        <span class="amount">$ {{ item.price_goods }}</span>
                    </span>
                    <p>{{item.desrp_goods}}</p>
                    <table class="table cart-total">
                        {% for row in item.categories %}
                        {% endfor %}
                            <tr>
                                <th>Category:</th>
                                <td>{{row.cat_name}}</td>
                            </tr>
                    </table>
                </div>
            </div>    
        {% endfor %}
        </div>
    </article>
</div>