<ul class="navbar-nav mr-auto">
	<li class="{{ active_class(if_route_pattern(['categories.index', 'categories.create', 'categories.show', 'categories.edit', 'categories.delete'])) }}" role="menuitem">
		<a class="nav-link" href="{{route('categories.index')}}">@lang('categories.index')</a>
	</li>
</ul>
