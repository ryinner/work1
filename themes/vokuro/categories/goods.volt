<h1 class="mt-3 text-center">-Goods-</h1>
<div class="wrapper">
    <!-- CONTAINER -->
    {# <article class="container products"> #}
        <div class="row">
            <!-- CATALOG BAR -->
            <div class="col-sm-3 col-xs-4 catalog-bar">
                <!-- widget -->
                <div class="widget">
                    <h6>Price</h6>
                    <div class="row">
                    <div class="ui-slider9"></div> 
                        <div class="col-6"><input type="text" id="min" value="1" class="form-control mt-3" disabled></div>
                        <div class="col-6"><input type="text" id="max" value="1000" class="form-control mt-3" disabled></div>
                    </div>
                </div>
                <!-- /.widget -->

                <!-- widget -->
                <div class="widget">
                    <h6>Brands</h6>
                    <ul>
                        {% for brand in brands %}
                        <li class="checkbox">
                                <label>
                                    <input type="checkbox" class="brands" value="{{ brand.id_brands }}">
                                    <span> {{ brand.name_brands }} </span>
                            </label>
                        </li>   
                        {% endfor %}
                    </ul>
                    {% for param in filter %}
                        <input type="hidden" value="{{param.id_cat_par}}" id="cat">
                        <h6>{{ param.name_par }}</h6>
                        <ul>
                            {% for parametrsgoods in param.parametrsvalues %}
                            <li class="checkbox">
                                <label>
                                    <input type="checkbox" class="params" id="{{parametrsgoods.id_par_pv}}" value="{{parametrsgoods.id_pv}}">
                                    <span> {{ parametrsgoods.val_pv }} </span>
                                </label>
                            </li>   
                            {% endfor %}
                        </ul>
                    {% endfor %}
                </div>
                <a href="" id="filter" class="btn btn-default btn-sm">Filter</a>
            </div> 
            <!-- /.widget -->
            <div class="col">
                <div class="row">
                    <div class="row text-center" id="goods">
                            {% for item in page.items %}
                                    <div class="col-md-3 col-sm-6 product">
                                        <div class="product-img">
                                            <a href="good/{{ item.id_goods }}">
                                                <img src="../../{{item.photo_goods}}" alt="">
                                            </a>
                                            <a href="good/{{ item.id_goods }}" class="btn btn-primary add-cart">Посмотреть</a>
                                        </div>
                                        <h6><a href="good/{{ item.id_goods }}">{{ item.title_goods }}</a></h6>
                                    </div>
                            {% endfor %} 
                    </div> 
                {% block paginators %}{% endblock %}
            </div>
        </div>
    </div>       
</div>
