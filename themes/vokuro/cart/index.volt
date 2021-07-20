<h1 class="mt-3 text-center">-Cart-</h1>
<div class="row">
    <article class="container products">
        <div class="row text-center">
            {% for good in cart %}
                        <div class="col-md-3 col-sm-6 product">
                            <div class="product-img">
                                <img src="../../{{good['photo']}}" alt="">
                            </div>
                            <h6>{{ good['title'] }}</h6>
                                   <table class="table cart-total">
                            <tr>
                                <th>Price:</th>
                                <td>{{ good['count'] * good['price'] }} $</td> 
                            </tr>
                            <tr>
                                <th>Count:</th>
                                <td>{{good['count']}}</td>
                            </tr>
                    </table>
                            <button type="submit" id="click" class="btn btn-primary btn-thn add-cart">Delete from cart</button>
                        </div>
            {% endfor %}
        </div>
</div>