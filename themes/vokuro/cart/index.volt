<h1 class="mt-3 text-center">-Cart-</h1>
<div class="row">
    <article class="container products">
        <div class="row text-center">
            {% for good in cart %}
                        <div class="col-md-3 col-sm-6 product" id="{{good.rowId}}">
                            {# <div class="product-img">
                                <img src="../../{{good['photo']}}" alt="">
                            </div> #}
                            <h6>{{ good.name }}</h6>
                                   <table class="table cart-total">
                            <tr>
                                <th>Price:</th>
                                <td>{{ good.price }} $</td> 
                            </tr>
                            <tr>
                                <th>Count:</th>
                                <td>{{good.qty}}</td>
                            </tr>
                            <tr>
                                <th>Total Price:</th>
                                <td>{{ good.qty * good.price }}</td>
                            </tr>
                    </table>
                    <form>
                        <button value="{{good.rowId}}" id="delete" class="btn btn-primary btn-thn delete-cart">Delete from cart</button>
                    </form>
                    </div>
            {% endfor %}
            <!-- <h3 class="mt-6 text-center">Total: {{ total }}</h3> -->
            <form>
                <button type="submit" id="clear" class="btn btn-primary btn-thn clear-cart">Clear cart</button>
            </form>

            {% if total == 0 %}
            
            {% else %}
                <h3 class="mt-6 text-center">Make Order</h3>
                <a href="../orders">Buy</a>
            {% endif %}
        </div>
</div>