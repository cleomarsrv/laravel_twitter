# Laravel Twitter
Esté é um projeto apresenta uma versão simplificada do twitter. Funcionalidades criadas:
  - cadastro de usuário
  - login
  - esqueci minha senha
  - postar um tweet
  - comentar em um tweet
  - seguir e desseguir usuários
  - meu feed: exibe tweets do próprio usuário autenticado e quem ele segue
  - feed completo: exibido tweets de todos usuários

# Passo a passo:

1. Clone o projeto:
	```bash
	git clone https://github.com/cleomarsrv/laravel_twitter.git

2. Entre na pasta laravel_twitter
	```bash
	cd laravel_twitter

3. Crie o arquivo .env a partir de .env.example:
	```bash
	cp .env.example .env

4. Execute o comando:
	```bash
	docker compose up -d

5. Aguarde a criação dos containers e subir a aplicação. Mesmo após concluir o processo, aguarde mais alguns minutos, pois o script start.sh tem comandos que precisam ser executados após os containers estarem funcionando.

6. Acesse o link
	<a href="http://127.0.0.1:8000" target="_blank">http://127.0.0.1:8000</a>
 
# Alguns usuários para testes:
| usuário          | senha      |
|-----------------------:|------------|
| elon.musk@example.com  | password   |
| leonardo@example.com   | password   |
| bill.gates@example.com | password   |
| tom.hanks@example.com  | password   |
| demi.lovato@example.com| password   |
