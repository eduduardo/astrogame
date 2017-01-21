@if (!$wordpress->have_posts())
<p>{{ trans('blog.empty-text') }}</p>
@else

<?php if ($wordpress->have_posts()) : while ($wordpress->have_posts()) : $wordpress->the_post(); ?>
  @include('blog.post')
<?php endwhile; endif; ?> @endif
