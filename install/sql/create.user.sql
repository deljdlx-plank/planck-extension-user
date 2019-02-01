CREATE TABLE user
(
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    status INT,
    email VARCHAR(1024),
    password VARCHAR(255),
    properties TEXT,
    login VARCHAR(255),
    creation_date DATETIME,
    update_date DATETIME
)