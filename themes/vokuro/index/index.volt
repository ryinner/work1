{{ flash.output() }}

<h1 class="mt-3 text-center">-Categories-</h1>
<div class="row">
    <article class="container products">
        <div class="row text-center">
            {% for category in categories %}
                <div class="col-md-3 col-sm-6 product">
                        <h6><a href="categories/{{category.id}}">{{ category.cat_name }}</a></h6>
                </div>
            {% endfor %}
        </div>
</div>