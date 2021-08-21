##API RESTFUL VESTI_DESAFIO


## API Vesti_Desafio
#############################################################


## Para rodar a aplicação

    Após clonar o projeto:
    start Apache MySQL;
    
## Informações do Banco de dados

    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=vesti_desafio
    DB_USERNAME=root
    DB_PASSWORD=

    rode  php artisan serve;



    insomnia/Postman;

     Autenticação

        para cadastrar - http://localhost:8000/api/cadastrar;

        login - http://localhost:8000/api/login

        copiar token para e colar na aba referente a token para liberar acesso as rotas protegidas

        Inserir dados nas tabelas:

        ## categorias -> post http://localhost:8000/api/cadastrarCategoria  #ex: 01 [{"categoria": "Camiseta"}] 02[{"categoria": "saia"}] 
        03[{"categoria": "calca"}]

        ## tamanhos -> post http://localhost:8000/api/cadastrarTamanho  #ex: [{"tamanho": "P"}], [{"tamanho": "M"}], [{"tamanho": "G"}]


        Fazer registro de produto:

        ##cadastro -> post http://localhost:8000/api/produto  
        
        ## ex:

        {
            "nome": "Nome do Produto ", -> requerido
            "codigo": "58674398fhf498", -> requerido
            "preco": "456.90",          -> requerido
            "quantidade": "15",         -> requerido
            "id_categoria": "1",        -> requerido   para listar categorias get -> http://localhost:8000/api/categorias
            "id_tamanho": "1",          -> requerido   para listar tamannho   get -> http://localhost:8000/api/tamanhos
            "composicao": "seda",
            "imagem": {}, //em construção
            
        }
        
        ##listar todos -> get  http://localhost:8000/api/produtos

        ##buscar produto por id -> get http://localhost:8000/api/produtos/1

        ##Atualizar produto -> put http://localhost:8000/api/produtos/1

        ##Deletar produto -> delete http://localhost:8000/api/produtos/1

        ##Logout -> post http://localhost:8000/api/logout




    





