
const app = require("./server/server").default;

const Condominio_RemoteDataSource = require("./data/datasource/remoto/condominio");
const condominioDataSource = new Condominio_RemoteDataSource();
app.get("/condominios", condominioDataSource.getCondominios);
app.post("/condominio", condominioDataSource.cadastraCondominio);
app.delete("/deletaCondominio/:id", condominioDataSource.deletaCondominio);
app.put("/atualizaCondominio", condominioDataSource.atualizaCondominio);

