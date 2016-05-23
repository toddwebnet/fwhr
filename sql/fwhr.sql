DROP TABLE IF EXISTS client;

CREATE TABLE IF NOT EXISTS client (
  client_id INT AUTO_INCREMENT,
  username VARCHAR(32),
  password_hash varchar(64),
  last_login DATETIME,
  PRIMARY KEY (client_id)
);

INSERT INTO client(username, password_hash) values ('admin', '$2a$07$adsfasdkslfjalsksdjf2uysUFqhqP1Q72D8NLV6kMgEN62KPe6Zq');
/* P@55w04d */
INSERT INTO client(username, password_hash) values ('user1', '$2a$07$adsfasdkslfjalsksdjf2usYPRmeE40jYEIVxEGkmfLnGYAoKC1P.');
/* Houston1 */
INSERT INTO client(username, password_hash) values ('reallylongusernamebutnotthatlong', '$2a$07$adsfasdkslfjalsksdjf2uxdeTQuh2UNYAPFlJRUgFjJFzUTBJVNy');
/* BargainsAreAG00dDealIFTheyAreCheapEnough */