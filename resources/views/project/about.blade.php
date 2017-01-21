@extends('project.general')
@section('title') {{ trans('project.about') }} | {{ trans('project.project-name') }} @stop
@section('style')
 {!! Minify::stylesheet(['/vendor/uikit/css/components/slideshow.gradient.css', '/vendor/uikit/css/components/dotnav.gradient.css', '/vendor/uikit/css/components/slidenav.gradient.css'])->withFullURL() !!} @stop
@section('javascript') {!! Minify::javascript(['/vendor/uikit/js/components/slideshow.js'], ['defer' => true])->withFullURL() !!} @stop
@section('content')
<div class="thumbnav">
    <div class="uk-container uk-container-center">
        <div class="uk-align-left">
            <h1>{{ trans('about.title') }}</h1>
        </div>
    </div>
</div>
<div class="about uk-text-justify">
    <div class="uk-container uk-container-center">
        <div class="uk-grid uk-margin-large-top" data-uk-grid>
            <div class="uk-width-medium-1-2 uk-text-center">
              <div class="uk-thumbnail uk-overlay-hover">
                  <figure class="uk-overlay" data-uk-scrollspy="{cls:'uk-animation-fade'}">
                      <img width="415" src="{{ url('img/gamefication1.jpg') }}" alt="gamification">
                      <figcaption class="uk-text-center uk-overlay-panel uk-overlay-background uk-flex uk-flex-center uk-flex-middle">
                          Gamification, um jeito divertido de aprender </figcatipon>
                  </figure>
              </div>
            </div>
            <div class="uk-width-medium-1-2 uk-margin-small">
                <h1><i class="uk-icon uk-icon-child"></i> {{ trans('about.title1') }}</h1>
                <p>{{ trans('about.text1') }}</p>
                <p>{{ trans('about.text2') }}</p>
                <p>{!! trans('about.text3') !!}</p>
                @if (env('ASTROGAME_LOGIN'))
                  <a class="action-button blue" href="#login" data-uk-modal><i class="uk-icon-gamepad"></i> {{ trans('about.button1')}}</a>
                  @else
                    <p><button class="action-button disabled" disabled data-uk-tooltip="{pos:'bottom'}" title="Aguarde, logo sairá quentinho do forno um jogo incrível!"><i class="uk-icon uk-icon-close"></i> Login Indisponível</button></p>
                  @endif
            </div>
        </div>
        <hr class="uk-grid-divider">
        <div class="uk-grid" data-uk-grid>
            <div class="uk-width-medium-1-2 uk-text-justify">
                <h2><i class="uk-icon uk-icon-book"></i> Sobre o Trabalho de Conclusão de Curso</h2>
                <p>{{ trans('about.text4') }}</p>
                <p>{{ trans('about.text5') }}</p>
                <p>{{ trans('about.text6') }}</p>
                <p>{{ trans('about.text7') }}</p>
                <p>{{ trans('about.text8') }}</p>
                <p>{{ trans('about.text9') }}</p>
            </div>
            <div class="uk-width-medium-1-2">
                <figure class="uk-thumbnail" data-uk-scrollspy="{cls:'uk-animation-fade'}">
                    <img src="{{url('img/gamefication.jpg')}}" alt="gamefication">
                </figure>
                <p><a href="{{ url('tcc-astrogame-v2.pdf')}}" class="action-button red"><i class="uk-icon uk-icon-download"></i> {{ trans('about.button2')}}</a></p>
            </div>
        </div>
        <hr class="uk-grid-divider">
        <h1 class="uk-text-center uk-margin-large-bottom" id="historia-cosmos"><i class="uk-icon uk-icon-archive"></i> {{ trans('about.title2')}}</h1>
        <div class="uk-grid" data-uk-grid>
            <div class="uk-width-medium-1-2">
                <div class="uk-thumbnail uk-overlay-hover">
                    <figure class="uk-overlay" data-uk-scrollspy="{cls:'uk-animation-fade'}">
                        <img width="660" height="400" src="{{ url('img/history/history_1.jpg') }}" alt="Projeto Cosmos">
                        <figcaption class="uk-text-center uk-overlay-panel uk-overlay-background uk-flex uk-flex-center uk-flex-middle">
                            {{ trans('about.figcaption1')}} </figcatipon>
                    </figure>
                </div>
            </div>
            <div class="uk-width-large-1-2 uk-margin-top">
                <div class="uk-text-center">
                  <img src="{{ url('img/logo-cosmos.png') }}" alt="Projeto Cosmos Logo" width="200">
                </div>
                <p>{{ trans('about.text10') }}</p>
                <p>{{ trans('about.text11') }}</p>
            </div>
            <div class="uk-width-large-1-2 uk-margin-large-top">
                <h2><i class="uk-icon-hourglass-half"></i> {{ trans('about.title2') }}</h2>
                <p>{{ trans('about.text12') }}</p>
                <p>{{ trans('about.text13') }}</p>
                <p>{{ trans('about.text14') }}</p>
            </div>
            <div class="uk-width-large-1-2 uk-margin-large-top" data-uk-scrollspy="{cls:'uk-animation-fade'}">
                <div class="uk-thumbnail uk-overlay-hover ">
                    <figure class="uk-overlay">
                        <img width="660" height="400" src="{{ url('img/history/entrada_simulador.jpg')}}" alt="Entra do simulador do projeto cosmos">
                        <figcaption class="uk-text-center uk-overlay-panel uk-overlay-background uk-flex uk-flex-center uk-flex-middle">
                             {{ trans('about.figcaption2') }} </figcatipon>
                    </figure>
                </div>
            </div>
            <div class="uk-width-large-1-2 uk-margin-large-top" data-uk-scrollspy="{cls:'uk-animation-fade'}">
                <iframe width="560" height="315" src="https://www.youtube.com/embed/zBx8e6eGfV4?rel=0&amp;showinfo=0" frameborder="0" allowfullscreen class="uk-responsive-width"></iframe>
                <div class="uk-text-muted uk-text-center">{{ trans('about.figcaption3') }}</div>
            </div>
            <div class="uk-width-large-1-2 uk-margin-large-top">
                <h2><i class="uk-icon-map-signs"></i> {{ trans('about.title3') }}</h2>
                <p>{{ trans('about.text15') }}</p>
                <p>{{ trans('about.text16') }}</p>
                <p>{{ trans('about.text17') }}</p>
            </div>
        </div>
        <div class="uk-grid" data-uk-grid>
            <div class="uk-width-large-1-2">
                <h2 class="uk-text-center"><i class="uk-icon-users"></i> {{ trans('about.title4') }}</h2>
                <ul class="uk-list uk-list-striped uk-overflow-container" style="height:300px">
                    <li>ADRIANO FABOCI</li>
                    <li>ALICE MANTOVANI</li>
                    <li>ALVARO VIERA</li>
                    <li>ANA JULIA LACRETA</li>
                    <li>ANA LAURA SANTOS</li>
                    <li>BRENDA CONTTESSOTTO</li>
                    <li>BRUNO CASTIGLIONI</li>
                    <li>CAIO EDUARDO</li>
                    <li>CARLOS EDUARDO</li>
                    <li>CAROL SANTOS</li>
                    <li>EDUARDO AUGUSTO RAMOS</li>
                    <li>EDUARDO AUGUSTO SILVA</li>
                    <li>EDUARDO TEODORO</li>
                    <li>FELIPE PEREIRA JORGE</li>
                    <li>FILICIO ROCHA DAVID</li>
                    <li>FILIPE GIANOTTO</li>
                    <li>GABRIEL FILIPE FERREIRA</li>
                    <li>GABRIEL LEITE</li>
                    <li>GUSTAVO ELIAS ANECHINI</li>
                    <li>GUSTAVO OLIVEIRA</li>
                    <li>GUSTAVO SANTOS BORBORENO</li>
                    <li>JÉSSICA LARA DOS SANTOS</li>
                    <li>JOÃO PEDRO ALKIMI BUENO</li>
                    <li>LAÍS VITÓRIA GRANZIEIRA</li>
                    <li>LEONARDO FERNANDES</li>
                    <li>MÁRCIO BOMBO</li>
                    <li>MARIA CAROLINE MARQUES</li>
                    <li>MATHEUS DIAS</li>
                    <li>MATEHUS NERY</li>
                    <li>MONIQUE VECHINI</li>
                    <li>MURILO GINEZ</li>
                    <li>NATHALIA MANDELI</li>
                    <li>PEDRO CERRUTI</li>
                    <li>RENAN BUENO</li>
                    <li>RODRIGO PESSANHA</li>
                    <li>THAYNÁ RECCHIA</li>
                    <li>VINICIUS LAGUNA</li>
                    <li>VITOR HUGO MARTONI FRANCO</li>
                    <li>VICTOR LIMA</li>
                    <li>WANDREW ROGÉRIO</li>
                    <li>YASMIN MENEZES</li>
                </ul>
            </div>
            <div class="uk-width-large-1-2 uk-margin-top" data-uk-scrollspy="{cls:'uk-animation-fade'}">
                <div class="uk-slidenav-position" data-uk-slideshow="{autoplay:true}">
                    <ul class="uk-slideshow">
                        <li>
                          <figure class="uk-thumbnail">
                            <img src="{{ url('img/history/equipe_completa.jpg') }}" alt="">
                          </figure>
                        </li>
                        <li>
                          <figure class="uk-thumbnail">
                            <img src="{{ url('img/history/equipe_com_patrocinador.jpg') }}" alt="">
                          </figure>
                        </li>
                        <li>
                          <figure class="uk-thumbnail">
                            <img src="{{ url('img/history/equipe.jpg') }}" alt="">
                          </figure>
                        </li>
                        <li>
                          <figure class="uk-thumbnail">
                            <img src="{{ url('img/history/equipe_2.jpg') }}" alt="">
                          </figure>
                        </li>
                        <li>
                          <figure class="uk-thumbnail">
                            <img src="{{ url('img/history/equipe_5.jpg') }}" alt="">
                          </figure>
                        </li>
                        <li>
                          <figure class="uk-thumbnail">
                            <img src="{{ url('img/history/equipe_6.jpg') }}" alt="">
                          </figure>
                        </li>
                    </ul>
                    <a href="#" class="uk-slidenav uk-slidenav-contrast uk-slidenav-previous" data-uk-slideshow-item="previous" style="color: rgba(255,255,255,0.4)"></a>
                    <a href="#" class="uk-slidenav uk-slidenav-contrast uk-slidenav-next" data-uk-slideshow-item="next" style="color: rgba(255,255,255,0.4)"></a>
                </div>
            </div>
        </div>
        <div class="uk-grid uk-margin-large-top" data-uk-grid>
            <div class="uk-width-large-1-2" data-uk-scrollspy="{cls:'uk-animation-fade'}">
                <div class="uk-slidenav-position" data-uk-slideshow="{autoplay:true}">
                    <ul class="uk-slideshow">
                        <li>
                          <figure class="uk-thumbnail">
                            <img src="{{ url('img/history/nebulosa.jpg') }}" alt="">
                          </figure>
                        </li>
                        <li>
                          <figure class="uk-thumbnail">
                            <img src="{{ url('img/history/buraco_negro.jpg') }}" alt="">
                          </figure>
                        </li>
                        <li>
                          <figure class="uk-thumbnail">
                            <img src="{{ url('img/history/visitacao1.jpg') }}" alt="">
                          </figure>
                        </li>
                        <li>
                          <figure class="uk-thumbnail">
                            <img src="{{ url('img/history/visitacao2.jpg') }}" alt="">
                          </figure>
                        </li>
                        <li>
                          <figure class="uk-thumbnail">
                            <img src="{{ url('img/history/lousa.jpg') }}" alt="">
                          </figure>
                        </li>
                        <li>
                          <figure class="uk-thumbnail">
                            <img src="{{ url('img/history/simluador_cinema.jpg') }}" alt="">
                          </figure>
                        </li>
                        <li>
                          <figure class="uk-thumbnail">
                            <img src="{{ url('img/history/simluador_interno.jpg') }}" alt="">
                          </figure>
                        </li>
                        <li>
                          <figure class="uk-thumbnail">
                            <img src="{{ url('img/history/simluador_projetor.jpg') }}" alt="">
                          </figure>
                        </li>
                        <li>
                          <figure class="uk-thumbnail">
                            <img src="{{ url('img/history/simluador2.jpg') }}" alt="">
                          </figure>
                        </li>
                        <li>
                          <figure class="uk-thumbnail">
                            <img src="{{ url('img/history/lousa.jpg') }}" alt="">
                          </figure>
                        </li>
                        <li>
                          <figure class="uk-thumbnail">
                            <img src="{{ url('img/history/planetario.jpg') }}" alt="">
                          </figure>
                        </li>
                        <li>
                          <figure class="uk-thumbnail">
                            <img src="{{ url('img/history/planetario_claro.jpg') }}" alt="">
                          </figure>
                        </li>
                        <li>
                          <figure class="uk-thumbnail">
                            <img src="{{ url('img/history/equipe_stands.jpg') }}" alt="">
                          </figure>
                        </li>
                        <li>
                          <figure class="uk-thumbnail">
                            <img src="{{ url('img/history/disco_da_voayger.jpg') }}" alt="">
                          </figure>
                        </li>
                    </ul>
                    <a href="#" class="uk-slidenav uk-slidenav-contrast uk-slidenav-previous" data-uk-slideshow-item="previous" style="color: rgba(255,255,255,0.4)"></a>
                    <a href="#" class="uk-slidenav uk-slidenav-contrast uk-slidenav-next" data-uk-slideshow-item="next" style="color: rgba(255,255,255,0.4)"></a>
                </div>
            </div>
            <div class="uk-width-large-1-2 uk-margin-top">
                @for ($i = 1; $i <= 4; $i++) <blockquote>
                    <p>{{ trans('about.depoimento' . $i )}}</p>
                    <small>{{ trans('about.depoimento_author' . $i )}}</small>
                    </blockquote>
                    @endfor
            </div>
        </div>
        <hr class="uk-grid-divider">
        <div class="uk-grid" data-uk-grid>
            <div class="uk-width-1-1 uk-text-center">
                <div class="uk-thumbnail uk-overlay-hover ">
                    <figure class="uk-overlay">
                        <img width="660" height="300" src="{{ url('img/history/et_e_equipe.jpg') }}" alt="Eduardo Ramos, Renan e Alvaro ET">
                        <figcaption class="uk-text-center uk-overlay-panel uk-overlay-background uk-flex uk-flex-center uk-flex-middle">
                            <i class="uk-icon-hand-spock-o"></i> Life long and prosper! </figcaption>
                    </figure>
                </div>
            </div>
        </div>
    </div>
    <hr class="uk-grid-divider">
</div>
</div>
@stop
