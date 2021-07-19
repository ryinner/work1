{{ flash.output() }}

<header class="jumbotron" id="overview">
    <h1 class="display-4">Welcome!</h1>
    <p class="lead">This is a website secured by Phalcon Framework</p>
    <hr class="my-4">
</header>

<div class="row">
          <!-- CONTAINER -->
    <article class="container products">
        <!-- row -->
        <div class="row text-center">
            <div class="col-md-3 col-sm-6 product">
                <div class="product-img">
                    <a href="product.html">
                        <img src="img/cart-item-1.jpg" alt="">
                    </a>
                    <a href="catalog_grid.html" class="btn btn-primary add-cart">Add to Cart</a>
                </div>
                <h6><a href="product.html">Contemporary chair</a></h6>
                <span class="price">
                    <span class="amount">$ 159,00</span>
                </span>
            </div>
            <div class="col-md-3 col-sm-6 product">
                <div class="product-img">
                    <a href="product.html">
                        <img src="img/cart-item-2.jpg" alt="">
                    </a>
                    <a href="catalog_grid.html" class="btn btn-primary add-cart">Add to Cart</a>
                </div>
                <h6><a href="product.html">Farmhouse chair</a></h6>
                <span class="price">
                        <span class="amount">$ 47,50</span>
                </span>
            </div>
            <div class="col-md-3 col-sm-6 product">
                <div class="product-img">
                    <a href="product.html">
                        <img src="img/cart-item-3.jpg" alt="">
                    </a>
                    <a href="catalog_grid.html" class="btn btn-primary add-cart">Add to Cart</a>
                </div>
                {{ link_to('session/login', "&larr; Категория") }}
                <h6><a href="product.html">Outdoor chair</a></h6>
                <span class="price">
                    <span class="amount">$ 89,99</span>
                </span>
            </div>
            <div class="col-md-3 col-sm-6 product">
                <div class="product-img">
                    <a href="product.html">
                        <img src="img/cart-item-4.jpg" alt="">
                    </a>
                    <a href="catalog_grid.html" class="btn btn-primary add-cart">Add to Cart</a>
                </div>
                <h6><a href="product.html">Classic style chair</a></h6>
                <span class="price">
                    <span class="amount">$ 59,00</span>
                </span>
            </div>
        </div>
        <!-- /.row -->

        <!-- row -->
        <div class="row text-center">
            <div class="col-md-3 col-sm-6 product">
                <div class="product-img">
                    <a href="product.html">
                        <img src="img/cart-item-5.jpg" alt="">
                    </a>
                    <a href="catalog_grid.html" class="btn btn-primary add-cart">Add to Cart</a>
                </div>
                <h6><a href="product.html">Lloyd Loom chair</a></h6>
                <span class="price">
                    <span class="amount">$ 159,00</span>
                </span>
            </div>
            <div class="col-md-3 col-sm-6 product">
                <div class="product-img">
                    <a href="product.html">
                        <img src="img/cart-item-6.jpg" alt="">
                    </a>
                    <a href="catalog_grid.html" class="btn btn-primary add-cart">Add to Cart</a>
                </div>
                <h6><a href="product.html">Plastic chair</a></h6>
                <span class="price">
                    <span class="amount">$ 159,00</span>
                </span>
            </div>
            <div class="col-md-3 col-sm-6 product">
                <div class="product-img">
                    <a href="product.html">
                        <img src="img/cart-item-7.jpg" alt="">
                    </a>
                    <a href="catalog_grid.html" class="btn btn-primary add-cart">Add to Cart</a>
                </div>
                <h6><a href="product.html">Contemporary Wood chair</a></h6>
                <span class="price">
                    <span class="amount">$ 340,00</span>
                </span>
            </div>
            <div class="col-md-3 col-sm-6 product">
                <div class="product-img">
                    <a href="product.html">
                        <img src="img/cart-item-8.jpg" alt="">
                    </a>
                    <a href="catalog_grid.html" class="btn btn-primary add-cart">Add to Cart</a>
                </div>
                <h6><a href="product.html">Contemporary chair</a></h6>
                <span class="price">
                    <span class="amount">$ 590,00</span>
                </span>
            </div>
        </div>
        <!-- /.row -->
</div>
