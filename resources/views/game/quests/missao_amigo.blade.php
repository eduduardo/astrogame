@extends('game.general.general')
@section('title')
Compartilhe o Astrogame
@stop

@section('javascript')
{!! Minify::javascript(['/js/game/general.js'])->withFullURL() !!}
<script>
play_music('bossa_nova');
$("#bodyarea").on('click', '.share_fb', function(event) {
    event.preventDefault();
    var that = $(this);
    var post = that.parents('article.post-area');
    $.ajaxSetup({ cache: true });
        $.getScript('//connect.facebook.net/pt_BR/sdk.js', function(){
        FB.init({
          appId: '989279721140978',
          version: 'v2.3' // or v2.0, v2.1, v2.0
        });
        FB.ui({
            method: 'share',
            title: 'Astrogame - Uma jornada ao conhecimento do universo',
            description: 'Entre em nossa plataforma interativa onde você irá explorar o Cosmos, conhecer sobre grandes nomes da astronomia e aprender sobre as estrelas, os planetas, o universo e tudo mais!',
            href: 'https://astrogame.me/',
          },
          function(response) {
            if (response && !response.error_code) {
                complete_quest('missao_amigo');
            } else {
                UIkit.notify({message: '<i class="uk-icon-exclamation"></i> Você precisa compartilhar o astrogame para completar a missão!', status: 'danger', pos:'top-right', timeout: 3000});
            }
        });
  });
});
</script>

@endsection

@section('content')
  <div class="uk-container uk-container-center game-section">
      <div class="uk-grid">
        <div class="uk-width-1-2 uk-container-center uk-text-center" id="bodyarea">
            <button class="share_fb action-button red uk-width-1-1"><i class="uk-icon-share"></i> Compartilhar no facebook</button>
        </div>
      </div>
      <div class="cientist-box">
      <div class="cientist-message">
          <span class="bubble cientist-text">Compartilhe o astrogame para seus amigos e ganhe XP e astrocoins!</span>
      </div>
      <img src="{{ URL('/img/char/carl-01.png')}}" class="cientist uk-animation-hover uk-animation-shake" alt="carl sagan cartoon">
  </div>
  </div>
@stop
