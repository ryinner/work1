{%- set menus = [
    'Home': 'index',
    'About': 'about',
    'Cart': 'cart'
] -%}
<div class="container">
<nav class="navbar mainmenu">
    {{ link_to(null, 'class': 'logo', 'Vökuró') }}
    <div class="justify-content">
    <div class="navbar" id="navbarSupportedContent">
        <ul class="nav me-auto mb-2 mb-lg-0">
            {%- for key, value in menus %}
                {% if value == dispatcher.getControllerName() %}
                <li class="nav-item active">
                    {{ link_to(value, 'class': 'nav-link', key) }}
                </li>
                {% else %}
                <li class="nav-item">{{ link_to(value, 'class': 'nav-link', key) }}</li>
                {% endif %}
            {%- endfor -%}
            <!-- <li class="nav-item"><a class="nav-link" href="/cart">Cart</a></li> -->
            <li class="nav-item"><a class="nav-link dropdown mr-1 dropdown-toggle" id="dropdown-toggle" href="javascript;"></a></li>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuReference">
                <!-- <div class="row"> -->
                    <li>
                        <table class="table table-dark table-striped table-bordered align-middle text-center">
                            <thead>
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Count</th>
                                    <th scope="col">Price</th>
                                <tr>
                            </thead>
                            <tbody id="tbody">
                            </tbody>
                        </table>
                    </li>
                <!-- </div> -->
            </ul>
        </ul>
    </div>

</nav>
</div>
</div>

<main role="main" class="flex-shrink-0">
    <div class="container">
        {{ content() }}
    </div>
</main>

<footer class="footer mt-auto py-3">
    <div class="container">
        <span class="text-muted">
            Made with love by the Phalcon Team

            {{ link_to("privacy", "Privacy Policy") }}
            {{ link_to("terms", "Terms") }}

            © {{ date("Y") }} Phalcon Team.
        </span>
    </div>
</footer>