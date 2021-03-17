# scrape/furaffinity.net
Scripts for scraping data from FurAffinity

## Config Creds
The `index.js` requires a configuration file to connect to a database. The file name is `mysql_login.json`. The format should follow:
```json
{
    "cred": {
        "username": "uid",
        "password": "pass"
    },
    "addr": {
        "ip": "xxx.xxx.xxx.xxx",
        "db": "database"
    }
}
```

### Example
```json
{
    "cred": {
        "username": "identifur",
        "password": "passwd"
    },
    "addr": {
        "ip": "121.200.28.109",
        "db": "identifur"
    }
}
```