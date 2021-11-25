const mysql = require("mysql2");

const connection = mysql.createConnection({
    host: "localhost",
    user: "root",
    database: "mydb",
    password: "Sng@9647"
});

exports.default = connection;