CREATE TABLE ADMINUSER(
        ID_Admin          Int NOT NULL AUTO_INCREMENT ,
        Username        Char (30) ,
        Password        Char (25) ,
        User_Email      Char (50) ,
        PRIMARY KEY (ID_Admin )
)ENGINE=InnoDB;


CREATE TABLE POST(
        ID_post           Int NOT NULL AUTO_INCREMENT ,
        title            Char (255) ,
        Post_Content     Text,
        Post_Date        Datetime ,
        ID_Admin        int NOT NULL,
        PRIMARY KEY (ID_post )
)ENGINE=InnoDB;

CREATE TABLE COMMENT(
        ID_comment            Int NOT NULL AUTO_INCREMENT ,
        Comment_Email           Char (50) ,
        Comment_Content         Text ,
        Comment_Date            Datetime ,
        ID_post               int NOT NULL ,
        PRIMARY KEY (ID_comment )
)ENGINE=InnoDB;

ALTER TABLE POST ADD CONSTRAINT FK_AdminUser FOREIGN KEY (ID_Admin) REFERENCES ADMINUSER(ID_Admin);
ALTER TABLE COMMENT ADD CONSTRAINT FK_post FOREIGN KEY (ID_post) REFERENCES POST(ID_post);
