<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tweet;
use App\Models\User;

class TweetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$tweets = [
			'A inteligência artificial está mudando o mundo e suas aplicações são ilimitadas.',
			'O avanço da biotecnologia promete curas para doenças que antes eram consideradas incuráveis.',
			'A exploração espacial está em seu auge, com missões programadas para Marte nos próximos anos.',
			'A energia solar é uma alternativa viável e sustentável para o futuro da nossa energia.',
			'A impressão 3D está revolucionando a fabricação de produtos personalizados.',
			'A tecnologia 5G irá permitir uma conectividade sem precedentes em todo o mundo.',
			'O aquecimento global é uma realidade e precisamos agir agora para combatê-lo.',
			'Robôs estão se tornando parte integrante da força de trabalho moderna.',
			'O aprendizado de máquina pode ajudar a prever desastres naturais e mitigar seus efeitos.',
			'As criptomoedas estão mudando a forma como percebemos o dinheiro e as finanças.',
			'O uso de drones na agricultura pode aumentar a eficiência e reduzir custos.',
			'As vacinas mRNA estão revolucionando a medicina e o tratamento de doenças.',
			'A nanotecnologia tem o potencial de transformar indústrias inteiras, desde eletrônicos até saúde.',
			'A tecnologia de blockchain pode aumentar a segurança e transparência nas transações.',
			'O design centrado no usuário é fundamental para criar produtos eficazes e atraentes.',
			'As cidades inteligentes estão se tornando uma realidade, utilizando tecnologia para melhorar a qualidade de vida.',
			'O teletrabalho se tornou uma prática comum, mudando a forma como trabalhamos.',
			'As interfaces neurais podem permitir que pessoas com deficiências físicas controlem dispositivos apenas com o pensamento.',
			'A automação está transformando a indústria, aumentando a produtividade e eficiência.',
			'O uso de big data permite uma análise mais profunda e insights valiosos para empresas.',
			'As biocombustíveis são uma alternativa sustentável aos combustíveis fósseis.',
			'As pesquisas em células-tronco estão abrindo novas possibilidades para a medicina regenerativa.',
			'Os carros autônomos prometem revolucionar o transporte e a mobilidade urbana.',
			'As tecnologias vestíveis estão mudando a forma como monitoramos nossa saúde.',
			'As smart TVs estão integrando recursos de streaming de forma cada vez mais intuitiva.',
			'A inteligência emocional é uma habilidade crucial para o sucesso no ambiente de trabalho.',
			'A realidade aumentada está mudando a forma como interagimos com o mundo digital.',
			'A tecnologia de reconhecimento facial levanta questões sobre privacidade e segurança.',
			'O uso de energia eólica está aumentando, contribuindo para a sustentabilidade ambiental.',
			'Os avanços na computação quântica podem resolver problemas complexos de forma muito mais rápida.',
			'Os aplicativos de saúde mental estão ajudando muitas pessoas a encontrar apoio e recursos.',
			'O conceito de agricultura vertical está ganhando popularidade nas cidades.',
			'Os assistentes virtuais estão se tornando cada vez mais comuns em nossas casas.',
			'A educação online está democratizando o acesso ao conhecimento.',
			'As tecnologias de microchip estão se tornando essenciais em dispositivos médicos.',
			'A reciclagem eletrônica é uma preocupação crescente no mundo moderno.',
			'Os algoritmos de recomendação estão moldando nossas experiências online.',
			'As inovações em energias renováveis estão tornando o mundo mais sustentável.',
			'O ensino de programação nas escolas é essencial para o futuro das novas gerações.',
			'A integração da IA em nossos cotidianos pode melhorar a eficiência e a qualidade de vida.',
			'O uso de realidade virtual está se expandindo para áreas como educação e treinamento.',
			'As criptomoedas estão mudando o conceito de economia digital.',
			'Os avanços na genética estão permitindo tratamentos mais personalizados.',
			'O telemedicina se tornou uma opção viável para consultas médicas durante a pandemia.',
			'As startups de tecnologia estão impulsionando a inovação e criando novos empregos.',
			'As soluções de mobilidade elétrica estão mudando a forma como nos deslocamos.',
			'Os jogos educacionais estão tornando o aprendizado mais envolvente e divertido.',
			'A pesquisa em inteligência artificial ética é crucial para um futuro responsável.',
			'As plataformas de e-learning estão revolucionando o ensino tradicional.',
			'Os podcasts estão se tornando uma forma popular de compartilhar conhecimento e histórias.',
			'O uso de tecnologia em eventos ao vivo está melhorando a experiência do público.',
			'As redes sociais desempenham um papel importante na disseminação de informações.',
			'O acesso à informação é mais fácil do que nunca, mas devemos ser críticos sobre suas fontes.',
			'A diversidade na tecnologia é fundamental para criar soluções inclusivas.',
			'Os aplicativos de produtividade estão ajudando as pessoas a se manterem organizadas.',
			'As bibliotecas digitais estão se expandindo, oferecendo acesso a uma vasta gama de recursos.',
			'O conceito de cidade sustentável está ganhando força entre urbanistas e arquitetos.',
			'As plataformas de crowdfunding estão ajudando startups a levantar fundos.',
			'O uso de tecnologia em práticas agrícolas está aumentando a produção alimentar.',
			'As mudanças climáticas afetam todos os aspectos de nossas vidas e exigem ação imediata.',
			'A pesquisa em inteligência artificial generativa pode revolucionar a criação de conteúdo.',
			'A análise preditiva está ajudando empresas a tomar decisões informadas.',
			'Os produtos de limpeza ecológicos estão se tornando mais populares entre os consumidores.',
			'A evolução da Internet das Coisas está conectando mais dispositivos do que nunca.',
			'O compartilhamento de caronas está se tornando uma alternativa viável ao transporte público.',
			'Os algoritmos de aprendizado profundo estão revolucionando a visão computacional.',
			'A proteção de dados pessoais é uma preocupação crescente na era digital.',
			'Os aplicativos de entrega estão mudando a forma como fazemos compras.',
			'O aprendizado contínuo é essencial para se manter relevante em um mercado de trabalho em mudança.',
			'As tecnologias de smart home estão melhorando a conveniência e segurança nas casas.',
			'A pesquisa sobre doenças infecciosas é crucial para o controle de epidemias.',
			'A colaboração remota é facilitada por ferramentas digitais de comunicação.',
			'A ciência de dados está se tornando uma habilidade valiosa em muitas indústrias.',
			'Os dispositivos de saúde conectados estão permitindo monitoramento remoto de pacientes.',
			'O futuro da medicina está na combinação de tecnologia e cuidados personalizados.',
			'A acessibilidade digital é vital para garantir que todos possam participar da era digital.',
			'As conferências virtuais estão se tornando uma norma na troca de conhecimento.',
			'O transporte público está adotando tecnologias para se tornar mais eficiente.',
			'As tecnologias de visão computacional têm aplicações em várias indústrias.',
			'As parcerias entre empresas e universidades estão impulsionando a inovação.',
			'O impacto da tecnologia na saúde mental é um tema de crescente discussão.',
			'Os novos materiais estão revolucionando a indústria da construção.',
			'O aprendizado de máquina é uma ferramenta poderosa para a análise de dados.',
			'As campanhas de conscientização sobre saúde pública estão se expandindo com o uso da tecnologia.',
			'As redes neurais artificiais são inspiradas na forma como o cérebro humano funciona.',
			'A pesquisa em energia limpa está em ascensão à medida que buscamos soluções sustentáveis.',
			'As plataformas de streaming estão mudando a forma como consumimos mídia.',
			'A coleta de dados em tempo real está ajudando empresas a melhorar seus serviços.',
		];

        // Obter todos os usuários
        $users = User::all();

        // Verificar se existem usuários
        if ($users->isEmpty()) {
            return;
        }

        // Criar 5 tweets para cada usuário
        foreach ($users as $user) {
            foreach (array_rand(array_flip($tweets), 5) as $tweet) {
                Tweet::create([
                    'user_id' => $user->id, // Atribui o ID do usuário
                    'message' => $tweet, // Mensagem do tweet
                ]);
            }
        }
    }
}

