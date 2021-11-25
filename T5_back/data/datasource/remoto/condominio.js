const db = require("../../../server/mysql").default;

class Condominio_RemoteDataSource
{   
    
    getCondominios(req,resp){
        db.query("SELECT * FROM condominio", (err, result, field) => {
            console.log(result);
            resp.status(200);
            resp.json(result);
        });
    }
    
    cadastraCondominio(req,resp){
        db.query(`INSERT INTO condominio (nome, cnpj, endereco) VALUES("${req.body.nome}", "${req.body.cnpj}", "${req.body.endereco}")`, (err, result, field) => {
            if(err != undefined)
            {
                resp.status(400);
                resp.json("erro ao cadastrar");
            }
            console.log(err);
            resp.status(200);
            resp.json(result);
        });
    }
    
    deletaCondominio(req,resp){
        db.query(`DELETE FROM condominio WHERE idcondominio = ${req.params.id}`, (err, result, field) => {
            if(err != undefined)
            {
                resp.status(400);
                resp.json("erro ao deletar");
            }
            console.log(err);
            resp.status(200);
            resp.json(result);
        });
    }
    
    atualizaCondominio(req,resp){
        console.log(req.body);
        db.query(`UPDATE condominio SET nome = "${req.body.nome}", cnpj = "${req.body.cnpj}", endereco = "${req.body.endereco}" 
              WHERE idcondominio = ${req.body.idcondominio}`, (err, result, field) => {
            if(err != undefined)
            {
                resp.status(400);
                resp.json("erro ao atualizar");
            }
            console.log(result);
            resp.status(200);
            resp.json(result);
        });
    }
}

module.exports = Condominio_RemoteDataSource;