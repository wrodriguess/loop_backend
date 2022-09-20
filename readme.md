# Desafio Loop Brasil ♾️

## Pré requisitos para executar o projeto
<ul>
    <li>Php</li>
    <li>MySQL</li>
    <li>Insomnia</li>
    <li>Xampp / Wamp</li>
</ul>

<hr/>

<ol>
    <li>
        <b>Clone o projeto</b>
        <p>Comando: git clone https://github.com/wrodriguess/loop_backend.git</p>
    </li>
    <li>
        <b>Acesse a pasta do projeto</b>
        <p>Comando: cd loop_backend</p>
    </li>
    <li>
        <b>Rode o servidor Xampp/Wamp e o banco de dados MySQL</b>
    </li>
    <li>
        <b>Crie o banco de dados</b>
        <p>Comando: CREATE DATABASE loop_brasil; </p>
    </li>
    <li>
        <b>Importe o DUMP</b>
        <p>Selecione o banco de dados <b>loop_brasil</b> e importe o dump <b>loop_brasil.sql</b> localizado na pasta raiz do projeto</p>
    </li>
    <li>
        <b>Altere os dados de conexão com o banco de dados</b>
        <p>No arquivo <b>api/config/databse.php</b> se necessário altere o host, username e password de acordo com os dados de acesso do seu banco de dados</p>
    </li>
    <li>
        <b>Importe os end pooints</b>
        <p>No <b>Insomnia</b> importe o arquivo <b>insomnia_endpoints_loop_brasil.json</b> localizado na pasta raiz do projeto</p>
    </li>
    <li>
        <b>Altere o préfixo do host</b>
        <p>No <b>Insomnia</b> em <b>Manage Environments</b> altere o valor da variável url (ou se preferir altere o prefixo <b>url</b> em cada uma das rotas.</p>
    </li>
    <li>
        <b>Divirta-se 😁</b>
    </li>
</ol>