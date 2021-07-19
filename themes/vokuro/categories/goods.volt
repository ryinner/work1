<h1 class="mt-3 text-center">-Goods-</h1>
<div class="row">
    <article class="container products">
        <div class="row text-center">
            {% for category in categories %}
                {% for item in category.goods %}
                        <div class="col-md-3 col-sm-6 product">
                            <div class="product-img">
                                <a href="good/{{ item.id_goods }}">
                                    <img src="../../{{item.photo_goods}}" alt="">
                                </a>
                                <a href="good/{{ item.id_goods }}" class="btn btn-primary add-cart">Посмотреть</a>
                            </div>
                            <h6><a href="good/{{ item.id_goods }}">{{ item.title_goods }}</a></h6>
                            <span class="price">
                                <span class="amount">{{ item.price_goods }} $</span>
                            </span>
                        </div>
                {% endfor %}
            {% endfor %}
        </div>
</div>