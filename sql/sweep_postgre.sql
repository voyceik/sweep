CREATE DATABASE db_sweep;
CREATE USER sweep WITH PASSWORD 'choose_a_password';
\connect db_sweep;
CREATE TABLE task (
  id SERIAL NOT NULL,
  type char(5) DEFAULT NULL,
  filein text,
  fileout text,
  status varchar(15) DEFAULT NULL,
  user_id varchar(50) DEFAULT NULL,
  start_date date DEFAULT NULL,
  finish_date date DEFAULT NULL,
  email varchar(60) DEFAULT NULL,
  name varchar(60) DEFAULT NULL,
  institution varchar(60) DEFAULT NULL,
  description varchar(60) DEFAULT NULL,
  filetxt text,
  sha1 varchar(64),
  PRIMARY KEY (id)
);
GRANT ALL ON task TO sweep;
GRANT USAGE, SELECT ON SEQUENCE task_id_seq TO sweep;
INSERT INTO TASK (type , filein , fileout , status , user_id , start_date , finish_date , email , name , institution , description , filetxt) 
VALUES
('sweep' , 'pantherdb.faa' , 'pantherdb_w.mat' , 'archived' , 'sweep' , '2019-08-27' , '2019-08-27' , 'appsbio.info@gmail.com' , 'SWEEP APLICATION TOOLS' , 'UFMG' , 'Whole PHANTHERDB database covers 131 complete genomes' , 'PantherDB');
INSERT INTO TASK (type , filein , fileout , status , user_id , start_date , finish_date , email , name , institution , description , filetxt) 
VALUES
('sweep' , 'pantherdb_human.faa' , 'pantherdb_human_w.mat' , 'archived' , 'sweep' , '2019-08-27' , '2019-08-27' , 'appsbio.info@gmail.com' , 'SWEEP APLICATION TOOLS' , 'UFMG' , 'Whole PHANTHERDB database covers complete human genome' , 'PantherDB (Human)');
\q

 chcon -t httpd_sys_rw_content_t uploads/
