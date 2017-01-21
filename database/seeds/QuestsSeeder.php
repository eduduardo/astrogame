<?php

use App\Models\Quest;
use Illuminate\Database\Seeder;

class QuestsSeeder extends Seeder
{
    public $quests = [

        [
            'name'         => 'primeira_missao',
            'title'        => 'Bem-vindo ao Astrogame!',
            'type'         => 2,
            'description'  => 'Mais uma vez, seja bem vindo ao Astrogame, sua primeira missão é concluir o capítulo de boas vindas assistindo a todos os videos que irão aparecer na tela, é rápido e não vai demorar, curta o show do cosmos!',
            'objetivos'    => 'Ver tudo sem pular e curtir as belas imagens do universo!',
            'xp_reward'    => 500,
            'money_reward' => 50,
            'min_level'    => 1,
            'max_level'    => 0,
        ],

        [
            'name'         => 'capitulo_copernico_primeira_missao',
            'title'        => 'O Sistema Solar',
            'type'         => 2,
            'description'  => 'Vamos dar uma volta pelo nosso Sistema Solar e conhecer os planetas mais proximos da Terra!',
            'objetivos'    => 'Leia os textos e alinhe os planetas ás suas respectivas órbitas',
            'xp_reward'    => 2500,
            'money_reward' => 100,
            'min_level'    => 1,
            'max_level'    => 0,
        ],

        [
            'name'         => 'capitulo_copernico_segunda_missao',
            'title'        => 'O Pai da Astronomia',
            'type'         => 2,
            'description'  => 'Atenção para essa missão é recomendado que você tenha completado anteriormente a missão "O Sistema Solar"!',
            'objetivos'    => 'Responda as questões sobre a Teoria do Heliocentrismo corretamente!',
            'xp_reward'    => 3000,
            'money_reward' => 100,
            'min_level'    => 1,
            'max_level'    => 0,
        ],

        [
            'name'         => 'capitulo_galileu_primeira_missao',
            'title'        => 'Meu primeiro telescópio',
            'type'         => 2,
            'description'  => 'Você irá precisar de um telescópio para começar a observar o céu, vá até a loja e compre as peças necessárias!',
            'objetivos'    => 'Comprar as Peças do Telescópio na loja',
            'xp_reward'    => 2500,
            'money_reward' => 0,
            'min_level'    => 1,
            'max_level'    => 0,
        ],

        [
            'name'         => 'capitulo_galileu_segunda_missao',
            'title'        => 'Mãos á obra',
            'type'         => 2,
            'description'  => 'Você já tem as peças necessárias, agora está na hora de montar seu telescópio!',
            'objetivos'    => 'Monte seu primeiro telescópio',
            'xp_reward'    => 2500,
            'money_reward' => 200,
            'min_level'    => 1,
            'max_level'    => 0,
        ],

        [
            'name'         => 'capitulo_galileu_terceira_missao',
            'title'        => 'A Arte da Observação',
            'type'         => 2,
            'description'  => 'Agora você esté pronto para começar a observar o céu! Vamos nessa!',
            'objetivos'    => 'Observe o céu por alguns minutos',
            'xp_reward'    => 2500,
            'money_reward' => 100,
            'min_level'    => 1,
            'max_level'    => 0,
        ],

        [
            'name'         => 'capitulo_galileu_quarta_missao',
            'title'        => 'Testando o conhecimento',
            'type'         => 2,
            'description'  => 'Agora vamos testar seus conhecimentos sobre as estrelas e as contelações!',
            'objetivos'    => 'Responda as questões corretamente!',
            'xp_reward'    => 2500,
            'money_reward' => 200,
            'min_level'    => 1,
            'max_level'    => 0,
        ],

        [
            'name'         => 'capitulo_kepler_primeira_missao',
            'title'        => 'As órbitas são elípticas, não redondas!',
            'type'         => 2,
            'description'  => 'Kepler apresenta a sua primeira Lei Fundamental, a lei das órbitas',
            'objetivos'    => 'Complete o minigame',
            'xp_reward'    => 3000,
            'money_reward' => 100,
            'min_level'    => 1,
            'max_level'    => 0,
        ],

        [
            'name'         => 'capitulo_kepler_segunda_missao',
            'title'        => 'As três leis fundamentais',
            'type'         => 2,
            'description'  => 'Está na hora de testar seu conhecimento sobre as Leis de Kepler, arrebenta!',
            'objetivos'    => 'Responda o questionário corretamente',
            'xp_reward'    => 3000,
            'money_reward' => 150,
            'min_level'    => 1,
            'max_level'    => 0,
        ],

        [
            'name'         => 'capitulo_hubble_primeira_missao',
            'title'        => 'As Galáxias',
            'type'         => 2,
            'description'  => 'Não existe somente um tipo de galáxia no universo, vamos aprender como elas se classificam e do que elas são formadas!',
            'objetivos'    => 'Indique a qual tipo pertence cada galáxia',
            'xp_reward'    => 3000,
            'money_reward' => 100,
            'min_level'    => 1,
            'max_level'    => 0,
        ],

        [
            'name'         => 'capitulo_hubble_segunda_missao',
            'title'        => 'Hubble, O astrônomo, não o telescópio',
            'type'         => 2,
            'description'  => 'Hubble, alám da classificação das galáxias, também irá nos falar um pouco sobre a teoria do universo em expanção e sobre sua própria lei! ',
            'objetivos'    => 'A partir das informações dadas por Hubble, responda corretamente as perguntas',
            'xp_reward'    => 3000,
            'money_reward' => 100,
            'min_level'    => 1,
            'max_level'    => 0,
        ],

        [
            'name'         => 'capitulo_carl_sagan_primeira_missao',
            'title'        => 'Mais peças para a espaçonave',
            'type'         => 2,
            'description'  => 'Para fazer a sua espaçonave funcionar Sagan irá precisar de peças, talvez você possa comprar algumas em sua loja.',
            'objetivos'    => 'Compre as peças da espaço nave em sua loja!',
            'xp_reward'    => 3750,
            'money_reward' => 0,
            'min_level'    => 1,
            'max_level'    => 0,
        ],

        [
            'name'         => 'capitulo_carl_sagan_segunda_missao',
            'title'        => 'É tipo um quebra-cabeça!',
            'type'         => 2,
            'description'  => 'Está na hora de montar sua espaçonave com as peças que você comprou, vamos nessa!',
            'objetivos'    => 'Monte a espaçonave',
            'xp_reward'    => 3750,
            'money_reward' => 50,
            'min_level'    => 1,
            'max_level'    => 0,
        ],

        [
            'name'         => 'capitulo_carl_sagan_terceira_missao',
            'title'        => 'Para o alto e avante!',
            'type'         => 2,
            'description'  => 'A nave está pronta para o lançamento, tome o comando e voe pelo espaço!',
            'objetivos'    => 'Pilote a espaço nave pelo espaço cideral e ache a VOYAGER!',
            'xp_reward'    => 3750,
            'money_reward' => 150,
            'min_level'    => 1,
            'max_level'    => 0,
        ],

        [
            'name'         => 'capitulo_carl_sagan_quarta_missao',
            'title'        => 'Um mundo novo',
            'type'         => 2,
            'description'  => 'Carl Sagan tem algo para falar para você!',
            'objetivos'    => 'Leia todas as falas e complete o astrogame',
            'xp_reward'    => 3750,
            'money_reward' => 200,
            'min_level'    => 1,
            'max_level'    => 0,
        ],

        [
            'name'         => 'missao_palido_ponto_azul',
            'title'        => 'Pequena pálida missão!',
            'type'         => 1,
            'description'  => 'Nessa missão você terá que assistir por completo a mensagem deixada por Carl Sagan quando a espaçonave Voayger 1 passou por Juptier e avistou um pequeno pálido ponto azul, a Terra como um grão de areia.',
            'objetivos'    => 'Assistir ao video completo do pequeno pálido ponto azul',
            'xp_reward'    => 500,
            'money_reward' => 450,
            'min_level'    => 1,
            'max_level'    => 0,
        ],

        [
            'name'         => 'missao_projeto_cosmos',
            'title'        => 'Projeto Cosmos',
            'type'         => 1,
            'description'  => 'Você passou pelo stand do Projeto Cosmos na expoete 2015? Que tal assistir mais uma vez ao video do simulador do universo?',
            'objetivos'    => 'Assitir ou re-assistir o video completo do projeto cosmos',
            'xp_reward'    => 350,
            'money_reward' => 300,
            'min_level'    => 1,
            'max_level'    => 0,
        ],

        [
            'name'         => 'missao_amigo',
            'title'        => 'Chame um amigo!',
            'type'         => 1,
            'description'  => 'Curtiu o projeto astrogame? Ajude ele a crescer convidando um amigo a entrar no jogo!',
            'objetivos'    => 'Compartilhar o projeto nas redes sociais',
            'xp_reward'    => 150,
            'money_reward' => 200,
            'min_level'    => 1,
            'max_level'    => 0,
        ],

        [
            'name'           => 'missao_apollo_11',
            'title'          => 'Apollo 11',
            'type'           => 1,
            'description'    => '<p>Tripulada pelos astronautas Neil Armstrong, Edwin \'Buzz\' Aldrin e Michael Collins, Apollo 11 foi a quinta missão tripulada do programa Apollo que conseguiu cumprir a missão proposta pelo Presidente John F. Kennedy em 25 de maio de 1961 que disse que antes do final daquela década conseguiria pousar um homem na Lua e trazê-lo de volta para a Terra com segurança.</p><p>A missão de você é conseguir assistir até o final da simulação criada pelo Filipe Dias Gianotto e ao final você irá ganhar uma insigna da missão Apollo 11!</p>',
            'objetivos'      => 'Assistir ao video simulação completo da Apollo 11.',
            'xp_reward'      => 250,
            'money_reward'   => 50,
            'min_level'      => 4,
            'max_level'      => 0,
            'insigna_reward' => 'apollo_11',
        ],

        [
            'name'         => 'missao_cosmos_quizz',
            'title'        => 'Projeto Cosmos Quizz',
            'type'         => 1,
            'description'  => 'Você visitou o projeto cosmos durante a expoete 2015? Teste seus conhecimentos sobre os diversos assuntos abordados nos stands do projeto com o mesmo quiz do percuso do Cosmos!',
            'objetivos'    => 'Responder corretamente todas as questões do quizz do projeto cosmos',
            'xp_reward'    => 250,
            'money_reward' => 50,
            'min_level'    => 3,
            'max_level'    => 0,
        ],
    ];

    /**
     * Run the database seeds.
     */
    public function run()
    {
        Quest::getQuery()->delete();

        foreach ($this->quests as $quest) {
            Quest::insert($quest);
            $this->command->info('Quest: '.e($quest['title']).' adicionado.');
        }
    }
}
