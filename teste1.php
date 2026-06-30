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

-------------------
curl --location 'https://mercerproject.app.n8n.cloud/webhook-test/auditoria-ssl' \
--header 'Content-Type: application/json' \
--data-raw '{
    "url":"agendaai.bixs.com.br",
    "email":"alexssandromercer@gmail.com"
}'

----------------
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