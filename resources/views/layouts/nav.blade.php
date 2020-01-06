<ul class="navbar-nav mr-auto">
	<li class="{{ active_class(if_route_pattern(['categories.index', 'categories.create', 'categories.show', 'categories.edit', 'categories.delete'])) }}" role="menuitem">
		<a class="nav-link" href="{{route('categories.index')}}">@lang('categories.index')</a>
	</li>
	<li class="{{ active_class(if_route_pattern(['posts.index', 'posts.create', 'posts.show', 'posts.edit', 'posts.delete'])) }}" role="menuitem">
		<a class="nav-link" href="{{route('posts.index')}}">@lang('posts.index')</a>
	</li>
</ul>
