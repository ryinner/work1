{% extends "categories/goods.volt" %}
{% block paginators %}
	<td colspan="10" class="text-right">
		<div class="btn-group" role="group">
			{{ link_to("categories/"~ param.id_cat_par, '<i class="icon-fast-backward"></i> First', "class": "btn btn-secondary") }}
			{{ link_to("categories/"~ param.id_cat_par ~"?page=" ~ page.previous, '<i class="icon-step-backward"></i> Previous', "class": "btn btn-secondary") }}
			{{ link_to("categories/"~ param.id_cat_par ~"?page=" ~ page.next, '<i class="icon-step-forward"></i> Next', "class": "btn btn-secondary") }}
			{{ link_to("categories/"~ param.id_cat_par ~"?page=" ~ page.last, '<i class="icon-fast-forward"></i> Last', "class": "btn btn-secondary") }}
		</div>

		<div class="btn-group" role="group">
			<button type="button" class="btn btn-secondary" disabled>{{ page.current }}</button>
			<button type="button" class="btn btn-secondary" disabled>/</button>
			<button type="button" class="btn btn-secondary" disabled>{{ page.last }}</button>
		</div>
	</td>
{% endblock %}
