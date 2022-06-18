const express	= require("express");
const ejs		= require("ejs");
const path		= require("path");
const app		= express();
const fs = require('fs');

app.set('view engine', 'ejs');

app.use(express.urlencoded({ extended: false }));
app.set("views", path.join(__dirname, "views"));

app.use('/Image',express.static(path.join(__dirname,'Image')));

app.use('/', require('./routes/main'));

app.listen(8010, function () {
	var dir = './upload';
  	if (!fs.existsSync(dir)) fs.mkdirSync(dir); 
	console.log("listening on port 8010");
});