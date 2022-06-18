// routers/main.js

const express	= require("express");
const ejs		= require("ejs");
const path		= require("path");
const conn		= require('../db.js');
var router		= express.Router();
var multer		= require('multer'); 

var storage  = multer.diskStorage({ 
    destination(req, file, cb) {
        cb(null, 'upload/');
    },
    filename(req, file, cb) {
        cb(null, `${Date.now()}__${file.originalname}`);
    },
});
var upload = multer({ dest: 'upload/' }); 
var uploadWithOriginalFilename = multer({ storage: storage }); 

router.get("/", function (req, res) {
	var sql = 'SELECT * FROM guestBook';
	conn.query(sql, function (err, rows) {
		if (err) console.log("query is not excuted. select fail!\n" + err);
		else res.render("index", { list: rows, form: "" });
	});
} );

router.post("/", uploadWithOriginalFilename.single('inputFile'), function (req, res) {
	console.log(req.body);
    console.log(req.file);
	if (!req.file) {
		var sql = 'INSERT INTO guestBook (name, nick, content, file) VALUES (?,?,?);';
		var params = [req.body.inputName,req.body.inputNick,req.body.inputText];
	}
	else {
		var sql = 'INSERT INTO guestBook (name, nick, content, file) VALUES (?,?,?,?);';
		var params = [req.body.inputName,req.body.inputNick,req.body.inputText, req.file.filename];
	}
	sql += 'SELECT * FROM guestBook;';
	conn.query(sql, params, function (err, rows) {
		if (err) console.log("query is not excuted. insert fail!\n" + err);
		else res.render("index", { list: rows[1], form: "" });
	});
} );

router.get("/modify/:no", function (req, res) {
	const no = req.params.no;
	var sql = 'SELECT * FROM guestBook;'+'SELECT * FROM guestBook WHERE no=?;';
	conn.query(sql, no, function (err, rows) {
		if (err) console.log("query is not excuted. select fail!\n" + err);
		else res.render("index", { list: rows[0], form: rows[1] });
	});
});
router.post("/modify/:no", uploadWithOriginalFilename.single('inputFile'), function (req, res) {
	const no = req.params.no;
	const name = req.body.inputName;
	const nick = req.body.inputNick;
	const content = req.body.inputText;

	if (!req.file) {
		var sql = 'UPDATE guestBook SET name=?, nick=?, content=? WHERE no=?;';
		var params = [name, nick, content, no];
	}
	else {
		var sql = 'UPDATE guestBook SET name=?, nick=?, content=?, file=? WHERE no=?;';
		var params = [name, nick, content, req.file.filename, no];
	}

	conn.query(sql, params, function (err, rows) {
		if (err) console.log("query is not excuted. modify fail!\n" + err);
		else res.redirect("/");
	});
});

router.get("/delete/:no", function (req, res) {
	const no = req.params.no;
	var sql = 'DELETE FROM guestBook WHERE no=?;';
	conn.query(sql, no, function (err, rows) {
		if (err) console.log("query is not excuted. delete fail!\n" + err);
		else res.redirect("/");
	});
});

var appRoot = process.env.PWD;
var uploadPath = path.join(appRoot,"upload");

router.get("/download/:no", function(req, res) {
	const no = req.params.no;
	var sql = 'SELECT * FROM guestBook WHERE no=?;';
	conn.query(sql, no, function (err, rows) {
		if (err) console.log("query is not excuted. download fail!\n" + err);
		else {
			var inputFilename = rows[0].file;
			const file = `${uploadPath}/${inputFilename}`;
			res.download(file);
		}
	})
    
});

module.exports = router;