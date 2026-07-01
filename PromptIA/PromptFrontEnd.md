# Prompt Utilizado para fazer o Fornt End

### pergunta 1
Contexto: 
Estou tendo uma matéria de Segurança da Informação e o trabalho da matéria, consiste no seguinte: 
Desenvolver uma ferramenta automatizada utilizando agentes de IA estou utilizando o n8n capaz de realizar diagnóstico de vulnerabilidades, identificando riscos e sugerindo ações corretivas. 
Descrição A ferramenta desenvolvida deve: 
    Coletar informações do sistema alvo. 
    Identificar vulnerabilidades
    Classificar e apresentar riscos
    Sugerir medidas e ações corretivas

Cenário: 
Servidor Web 

A ferramenta deve: 
    Analisar protocolos criptográficos (SSL/TLS) 
    Identificar configurações inseguras 
    Avaliar certificados digitais 
    Detectar falhas de configuração 

Saídas esperadas: 
    Lista de vulnerabilidades 
    Classificação de risco 
    Recomendações de correção 
Requisitos Técnicos:
    Utilizar ferramenta de automação (ex: n8n) 
    Integrar fluxo de coleta, análise e resposta 
    Implementar lógica automatizada
    Gerar saída em relatório ou dashboard 
    Relatório: 
        Vulnerabilidades. 
        Riscos. 
        Recomendações 
    
### Pergunta     
Eu fiquei responsável por fazer o front end. Por onde o usuário colocara o endereço do site para ser analisado 
Poderia gerar o código front end em .html que atendesse esses códigos abaixo vindos do n8n 
obs: ---------- são a separação entre os diferentes códigos 

```text
{
  "status": "seguro",
  "classificacao_risco": "Baixo",
  "vulnerabilidades": [
    {
      "item": "Nenhuma vulnerabilidade crítica encontrada",
      "descricao": "...",
      "recomendacao": "..."
    }
  ],
  "email_html": "..."
}
---------------------
curl --location 'https://mercerproject.app.n8n.cloud/webhook-test/auditoria-ssl' \
--header 'Content-Type: application/json' \
--data-raw '{
    "url":"agendaai.bixs.com.br",
    "email":"alexssandromercer@gmail.com"
}'
---------------------
const myHeaders = new Headers();
myHeaders.append("Content-Type", "application/json");

const raw = JSON.stringify({
  "url": "    ",
  "email": "   "
});

const requestOptions = {
  method: "POST",
  headers: myHeaders,
  body: raw,
  redirect: "follow"
};

fetch("https://mercerproject.app.n8n.cloud/webhook-test/auditoria-ssl", requestOptions)
  .then((response) => response.text())
  .then((result) => console.log(result))
  .catch((error) => console.error(error));

```

### Pergunta 2 

Poderia me mostrar um código para eu colocar no meu front end para que a borda do campo de escrita de endereço do site e email fiquem verdes quando de texto estiver correto e a borda vermelha quando estiver incorreto



### Passo 1: Configurar o HTTP Request no n8n

Substitua o nó HTTP Request antigo (ou crie um novo entre o Webhook e o AI Agent) e configure a barra lateral direita dele assim:

1. **Method:** Mude para `GET`.
2. **URL:** Cole a URL mudando a parte final para capturar dinamicamente o que o usuário digitou no frontend:


```text
https://whoisjson.com/api/v1/ssl-cert-check?domain={{ $json.body.url }}

```


3. **Authentication:** Mude para `None` (pois vamos colocar o token direto no cabeçalho/header, exatamente como o seu curl faz).
4. **Headers (Cabeçalhos):** Abaixo de Authentication, clique em **Add Header** e preencha com os dois campos:
* **Name:** `Authorization`
* **Value:** `TOKEN=seu_token_aqui` *(Substitua `seu_token_aqui` pelo seu token real do WhoisJSON, mantendo a palavra `TOKEN=` na frente)*.
