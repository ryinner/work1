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
                    <input type="range" class="form-range" min="0" max="5" step="0.5" id="customRange3">
                    <div class="d-flex justify-content-between"> <small class="text-muted">$20</small> <small class="text-muted">$100</small> </div>
                </div>
                <!-- /.widget -->

                <a href="catalog_grid_sidebar_2.html" class="btn btn-default btn-sm">Filter</a>
            
                <!-- widget -->
                <div class="widget">
                    <h6>Product Type</h6>
                    <ul>
                        <li class="checkbox">
                            <label>
                                <input type="checkbox">
                                Contemporary
                            </label>
                        </li>
                        <li class="checkbox">
                            <label>
                                <input type="checkbox">
                                Plastic
                            </label>
                        </li>
                        <li class="checkbox">
                            <label>
                                <input type="checkbox">
                                Outdoor
                            </label>
                        </li>
                        <li class="checkbox">
                            <label>
                                <input type="checkbox">
                                Industrial Metal
                            </label>
                        </li>
                        <li class="checkbox">
                            <label>
                                <input type="checkbox">
                                Contemporary Plastic
                            </label>
                        </li>
                        <li class="checkbox">
                            <label>
                                <input type="checkbox">
                                Contemporary Wood
                            </label>
                        </li>
                        <li class="checkbox">
                            <label>
                                <input type="checkbox">
                                Farmhouse
                            </label>
                        </li>
                        <li class="checkbox">
                            <label>
                                <input type="checkbox">
                                Lloyd Loom
                            </label>
                        </li>
                    </ul>
                </div>
            </div> 
            <div class="col">
                <div class="row">
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
                                    </div>
                            {% endfor %}
                        {% endfor %}
                    </div> 
            </div>
        </div>
    </div>       
</div>
