# MySQL dump 4.0
#
# Host: localhost    Database: php3
#--------------------------------------------------------
DROP table bugdb;

CREATE TABLE bugdb (
  id int(8) NOT NULL AUTO_INCREMENT,
  bug_type char(32),
  email varchar(40) NOT NULL,
  sdesc varchar(80), 
  ldesc text,
  php_version char(16),
  php_os char(32),
  status char(16),
  comments text,
  ts1 datetime,
  ts2 datetime,
  dev_id char(16),
  PRIMARY KEY (id)
);
