#drop table phpcal;
CREATE TABLE phpcal (
  id int(8) NOT NULL AUTO_INCREMENT,
  sdato date,
  edato date,
  recur char(12),
  sdesc char(16) NOT NULL,
  url varchar(128),
  ldesc text,
  tipo int(1) NOT NULL,
  approved int(1) NOT NULL DEFAULT 0,
  app_by char(16),
  PRIMARY KEY(id),
  INDEX (sdato),
  INDEX (edato)
)
