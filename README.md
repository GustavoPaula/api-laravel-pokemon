[X] Criar rota de API que vai receber o nome do pokemon como parâmetro
[X] Criar Controller
[X] Criar Service para fazer uma Requisição HTTP para a API Pokemon
[X] Criar Mapper para tratar os dados de retorno da API Pokemon
  - nome do pokemon e as habilidades;
[X] Criar Model
  - pokemons
    - id -> bigIncrements('id')
    - name -> string
  - abilities
    - id -> bigIncrements('id')
    - name -> string
    - pokemon_id -> unsignedBigInteger
[X] Criar Repository para salvar os dados na tabela do banco MySQL
[X] Criar o Request para validar os dados
[X] Criar o DTO para transferir os dados para as camadas pra aplicação
[X] Criar o Mapper (fromDBtoApi) e retornar os dados do banco para api
  - Estrutura do Mapper de retorno para API
  [
    "id": id-table-pokemons
    "name":"pikachu",
    "updated_at": "2024-12-06T00:26:20.000000Z",
    "created_at": "2024-12-06T00:26:20.000000Z",
    "abilities": [
      "id": id-table-abilities
      "name":"static",
      "name":"lightning-rod",
      "updated_at": "2024-12-06T00:26:20.000000Z",
      "created_at": "2024-12-06T00:26:20.000000Z",
    ]
  ]
[] Criar Job para enviar dados da API pokemon para outra API ( ainda vamos definir quem vai receber esses dados )