CREATE TABLE puestos (id_puesto int NOT NULL PRIMARY KEY AUTO_INCREMENT,
                      nombre varchar(30),
                      descripcion varchar(100));
                      
CREATE TABLE un (id_un int NOT NULL PRIMARY KEY AUTO_INCREMENT,
                nombre varchar(30));
                   
CREATE TABLE sim(iccid int NOT NULL PRIMARY KEY,
                region varchar (10));
                
CREATE TABLE plan_datos (id_plan int NOT NULL PRIMARY KEY AUTO_INCREMENT,
                        nombre varchar (20),
                        descripcion varchar (100));
                        
CREATE TABLE marca(id_marca int NOT NULL PRIMARY KEY AUTO_INCREMENT,
                   nombre_marca varchar (20),
                   id_modelo int,
                  CONSTRAINT fk_modelo FOREIGN KEY (id_modelo) REFERENCES modelo(id_modelo));
   
CREATE TABLE diadema(id_diadema int NOT NULL PRIMARY KEY,
                     descripcion varchar (100),
                     id_marca int,
                    CONSTRAINT fk_marca2 FOREIGN KEY (id_marca) REFERENCES marca(id_marca));
                
CREATE TABLE usuario (no_empleado int NOT NULL PRIMARY KEY,
                     nombre_completo varchar (100),
                     id_puesto int,
                     id_un int,
                     CONSTRAINT fk_puesto FOREIGN KEY (id_puesto) REFERENCES puestos(id_puesto),
                     CONSTRAINT fk_un FOREIGN KEY (id_un) REFERENCES un(id_un));
                     
CREATE TABLE ticket_cel (id_ticket_cel int NOT NULL PRIMARY KEY AUTO_INCREMENT,
                         fecha_entrega date,
                         descripcion varchar(100),
                         no_empleado int,
                         imei int,
                         id_cambio int,
                         CONSTRAINT fk_cambio FOREIGN KEY (id_cambio) REFERENCES puestos(id_cambio),
                         CONSTRAINT fk_empleado FOREIGN KEY (no_empleado) REFERENCES usuario(no_empleado),
                         CONSTRAINT fk_imei FOREIGN KEY (imei) REFERENCES telefonos(imei));
                         
CREATE TABLE ticket_daidema (id_ticket_diadema int NOT NULL PRIMARY KEY AUTO_INCREMENT,
                         fecha_entrega date,
                         descripcion varchar(100),
                         no_empleado int,
                         id_cambio int,
                         CONSTRAINT fk_cambio1 FOREIGN KEY (id_cambio) REFERENCES puestos(id_cambio),
                         CONSTRAINT fk_empleado2 FOREIGN KEY (no_empleado) REFERENCES usuario(no_empleado));
                      
CREATE TABLE telefonos(imei int NOT NULL PRIMARY KEY,
                      linea int,
                      accesosrios varchar (100),
                      id_marca int,
                      iccid int,
                      id_plan int,
                      CONSTRAINT fk_marca1 FOREIGN KEY (id_marca) REFERENCES marca(id_marca),
                      CONSTRAINT fk_iccid FOREIGN KEY (iccid) REFERENCES sim(iccid),
                      CONSTRAINT fk_plan FOREIGN KEY (id_plan) REFERENCES plan_datos(id_plan));
CREATE TABLE usuarioBach(id_usuario_bach int not null PRIMARY KEY AUTO_INCREMENT,
                        corrreo varchar(100),
                         contrasena varchar(32),
                        tocken varchar(16));
                        
CREATE TABLE rol(id_rol int not null PRIMARY KEY AUTO_INCREMENT,
                 nombre varchar(50));
                 
CREATE TABLE usuBach_rol(id_rol int,
                        id_usuario_bach int,
                        CONSTRAINT pk_usuBach PRIMARY KEY (id_rol,id_usuario_bach),
                        CONSTRAINT fk_rol FOREIGN KEY (id_rol) REFERENCES rol(id_rol),
                        CONSTRAINT fk_usua_bach FOREIGN KEY (id_usuario_bach) REFERENCES usuaroBach(id_usuario_bach));