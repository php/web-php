<?php require "header.inc"?>
<H1>SQL'izing the Photo Album Example</H1>

<ul>
<li>Where and how to store the pictures?
<li>The Schema
<?example('CREATE TABLE photos (
  filename varchar(60) DEFAULT \'\' NOT NULL,
  album varchar(60),
  text varchar(120),
  PRIMARY KEY (filename)
);')?><font size=+4>
<li>The Authentication Database</font>
<?example('CREATE TABLE users (
  id varchar(16) DEFAULT \'\' NOT NULL,
  password varchar(13),
  PRIMARY KEY (id)
);')?>

</ul>

<?php require "footer.inc"?>
