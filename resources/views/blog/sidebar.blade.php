@section('javascript')
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v2.7";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
@stop

<aside class="uk-panel uk-panel-box">
    <form role="search" method="get" class="uk-form" action="{{ url('/blog/search')}}" data-uk-search>
        <div class="uk-form-icon uk-display-block uk-margin-bottom">
            <i class="uk-icon-search"></i>
            <input type="search" class="uk-width-1-1" name="s" placeholder="Procuro por...">
        </div>
    </form>

    <div class="uk-panel uk-margin-large-top">
        <h3 class="uk-panel-title">{{ trans('blog.last-posts')}}</h3>
        <ul class="uk-list-line" style="list-style: none; margin: 0; padding: 0">
                <?php while ($recentPosts->have_posts()) : $recentPosts->the_post(); ?>
                <li>
                    <a href="{{ the_permalink() }}" rel="bookmark">
                        {{ the_title() }}
                    </a>
                </li>
                <?php endwhile; ?>
        </ul>
    </div>

    <div class="uk-panel uk-margin-large-top">
        <h3 class="uk-panel-title">{{ trans('blog.categories') }}</h3>
        <ul class="uk-list-line" style="list-style: none; margin: 0; padding: 0">
            <?php $categories = get_categories(); ?>
            @foreach ($categories as $category)
              <li><a href="{{ url('/blog/category').'/'.$category->slug }}" rel="bookmark">{{ $category->name }}</a></li>
            @endforeach
        </ul>
    </div>

    <div class="uk-panel uk-margin-large-top">
        <h3 class="uk-panel-title">{{ trans('blog.social') }}</h3>
        <div class="fb-page" data-href="https://www.facebook.com/astrogame" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/cosmosexpoete" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/cosmosexpoete">Astrogame</a></blockquote></div>
    </div>
</aside>
