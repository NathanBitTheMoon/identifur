// Import configurations
const config = require("./mysql_login.json");

// Import dependenices
const mysql = require("mysql");
const path = require("path");
const http = require('https');
const fs = require('fs');
const url = require('url');
const request = require('request');

// Declare constants
const fileOutputDir = path.join(__dirname, "./downloads/");

// Connect to database
var mysqlConnection = mysql.createConnection({
    host: config.addr.ip,
    user: config.cred.username,
    password: config.cred.password,
    database: config.addr.db
});

// Connect to the database
mysqlConnection.connect((err) => {
    if (err) {
        throw err;
    } else {
        console.log(`Connected to database: "${config.addr.db}" as ${config.cred.username}.`);
    }
});

// We can assume that we are connected to the database
// Query the database

function getFileFromUrl(url) {
    var urlSplit = url.split('/');
    return urlSplit[urlSplit.length - 1];
}

function downloadFile(url) {
    var outputFile = path.join(fileOutputDir, getFileFromUrl(url));
    var file = fs.createWriteStream(outputFile);
    var urlObj = new URL(url)
    console.log(urlObj.protocol + "//" + urlObj.host + urlObj.pathname);
    
    http.get(urlObj.toString(), function(response) {
        response.pipe(file);
    })
}

const query = "SELECT * FROM `faLinks`;";
mysqlConnection.query(query, (err, result, fields) => {
    for (var i = 0; i < result.length; i += 1) {
        setTimeout(downloadFile, 5 * i, result[i]["thumb"]);
        var resourceQuery = `INSERT IGNORE INTO \`resources\` (id, resourceDir) VALUES (${i}, ${mysql.escape(path.join(fileOutputDir, getFileFromUrl(result[i]["thumb"])))});`;
        var updateFaQuery = `UPDATE \`faLinks\` SET resourceId=${i} WHERE thumb=${mysql.escape(result[i]["thumb"])};`;

        mysqlConnection.query(resourceQuery);
        mysqlConnection.query(updateFaQuery);
    }
});