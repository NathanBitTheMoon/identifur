// Import configurations
const config = require("./mysql_login.json");

// Import dependencies
const mysql = require("mysql");
const furaffinity = require("furaffinity-api");

// Declare constants
const searchTerm = '@keywords fursuiting';

// Open connection to mySQL server using credentials from config file
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

// We can assume we are connected to the database
var i = 0;
var pageCount = 65;
var query;

function getInsert() {
    furaffinity.Search('@keywords fursuiting', { page: i }).then((res) => {
        console.log(`Page: ${i}`)
        for (var x = 0; x < res.length; x += 1) {
            query = `INSERT IGNORE INTO \`faLinks\` (id, link, thumb, title, resourceId) VALUES ('${res[x].id}', '${res[x].url}', '${res[x].thumb.large}', ${mysql.escape(res[x].title)}, '0');`;
            mysqlConnection.query(query);
        }
    });
    i += 1;
    if (i < pageCount) {
        setTimeout(getInsert, 5000);
    }
}

getInsert();