<div class="footer">
    <div class="uk-container uk-container-center">
        <div class="uk-grid" data-uk-grid>
            <div class="uk-margin uk-width-medium-3-10">
                <h2>Astrogame</h2>
                <p>{{ trans('project.footer-text') }}</p>
            </div>

            <div class="uk-width-1-2 uk-width-medium-1-10 uk-margin-top">
                <ul class="uk-list-space uk-margin-top" style="list-style: none; margin-left: 0; padding-left: 0">
                    <li><a href="{{ url('/home') }}" class="ajax-link"><i class="uk-icon-home"></i> {{ trans('project.navbar.home') }}</a></li>
                    <li><a href="{{ url('/blog') }}" class="ajax-link"><i class="uk-icon-pencil"></i> {{ trans('project.navbar.blog') }}</a></li>
                    <li><a href="{{ url('/equipe') }}" class="ajax-link"><i class="uk-icon-users"></i> {{ trans('project.navbar.equipe') }}</a></li>
                    <li><a href="{{ url('/ranking') }}" class="ajax-link"><i class="uk-icon-cubes"></i> {{ trans('project.navbar.ranking') }}</a></li>
                </ul>
            </div>

            <div class="uk-width-1-2 uk-width-medium-1-10 uk-margin-top">
                <ul class="uk-list-space uk-margin-top" style="list-style: none; margin-left: 0; padding-left: 0">
                    <li><a href="https://facebook.com/cosmosexpoete"><i class="uk-icon-facebook"></i> Facebook</a></li>
                    <li><a href="https://www.youtube.com/channel/UCTTNFbIZIk_hsNbaZArX2fg"><i class="uk-icon-youtube"></i> Youtube</a></li>
                    <li><a href="mailto:eduardo@astrogame.me"><i class="uk-icon-envelope"></i> Email</a></li>
                </ul>
            </div>

            <div class="uk-width-medium-2-10 uk-margin-top">
                <ul class="uk-list-space uk-margin-top" style="list-style: none; margin-left: 0; padding-left: 0">
                    <li><a href="{{ url('/politica') }}" class="ajax-link"><i class="uk-icon-paperclip"></i> {{ trans('project.politica') }}</a></li>
                    <li><a href="{{ url('/termos') }}" class="ajax-link"><i class="uk-icon-gavel"></i> {{ trans('project.termos') }}</a></li>
                    <li><a href="{{ url('/credits') }}" class="ajax-link"><i class="uk-icon-user"></i> {{ trans('project.credits')}}</a></li>
                </ul>
            </div>

            <div class="uk-width-medium-3-10 uk-margin-top">
                <div class="uk-thumbnail" style="width: 315px;">
                  <div class="fb-page" data-href="https://www.facebook.com/astrogame" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="false"><blockquote cite="https://www.facebook.com/cosmosexpoete" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/cosmosexpoete">Astrogame</a></blockquote></div>
                </div>
            </div>
        </div>
    </div>

    <div class="subfooter uk-margin-top">
        <div class="uk-container uk-container-center uk-text-center-small">

            <div class="uk-align-left uk-margin-remove">
                <p>{!! trans('project.made-by') !!}</p>
            </div>

            <div class="uk-align-right uk-margin-remove">
                <i class="uk-icon uk-icon-hand-spock-o" title="Life long and prosper!" data-uk-tooltip></i> Version 3.5 Spock | @if (session()->get('language', 'pt-br') == 'pt-br')
                <a href="{{ url('lang/en') }}">Change to English</a> @else
                <a href="{{ url('lang/pt-br') }}">Mudar para Português</a> @endif
                <a href="#top" data-uk-smooth-scroll><i class="uk-icon-arrow-circle-up" title="Ir para o topo"></i></a>
            </div>
        </div>
    </div>
</div>
