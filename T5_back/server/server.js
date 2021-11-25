const express = require("express");
const body_parser = require("body-parser");
const app = express();
const cors = (req, res, next) => {
    res.set('access-control-allow-origin', '*');
    res.set('access-control-allow-headers', '*');
    res.set('access-control-allow-methods', '*');
    next();
};
app.use(cors);
app.use(body_parser.json());
app.listen(3000, ()=>{
    console.log("servidor ta funfando");
});
exports.default = app;

