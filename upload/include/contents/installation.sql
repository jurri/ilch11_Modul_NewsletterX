CREATE TABLE `prefix_newsletter_send` (
`nls_pk` int NOT NULL AUTO_INCREMENT,
`nls_strtext` text,
`nls_strbetreff` varchar(200),
`nls_dtmcreate` datetime DEFAULT CURRENT_TIMESTAMP,
`nls_art` varchar(10),
`nls_anzahl` int,
PRIMARY KEY (`nls_pk`)
)

CREATE TABLE `prefix_newsletter2user` (
`nlu_pk` int NOT NULL AUTO_INCREMENT,
`nlu_fknl` int NOT NULL,
`nlu_fkuid` int NOT NULL,
PRIMARY KEY (`nlu_pk`)
)