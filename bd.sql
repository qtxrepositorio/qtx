--INICIO DO PROJETO

CREATE TABLE users(
    id INT IDENTITY(1,1) CONSTRAINT pk_users PRIMARY KEY,
	name VARCHAR(100) not null,
	cpf VARCHAR(11) not null,
    username VARCHAR(50) not null,
    password VARCHAR(255) not null,
	status bit not null,
	email VARCHAR(100) not null,
    created DATETIME2 DEFAULT NULL,
    modified DATETIME2 DEFAULT NULL 
);

CREATE TABLE roles(
    id INT IDENTITY(1,1) CONSTRAINT pk_roles PRIMARY KEY,
	name varchar(50) not null,
	description VARCHAR(100) not null
);

CREATE TABLE roles_users(
	role_id INT NOT NULL CONSTRAINT fk_role_key  FOREIGN KEY (role_id) REFERENCES roles(id),
	user_id INT NOT NULL CONSTRAINT fk_user_key FOREIGN KEY (user_id) REFERENCES users(id)
	CONSTRAINT pk_role_idx PRIMARY KEY (role_id, user_id)
);

CREATE TABLE notices(
	id INT IDENTITY(1,1) CONSTRAINT pk_notices PRIMARY KEY,
	subject VARCHAR(100) not null,
	text VARCHAR(500) not null,
	created DATETIME2 DEFAULT NULL,
    modified DATETIME2 DEFAULT NULL, 
	user_id INT NOT NULL CONSTRAINT fk_sender_key FOREIGN KEY (user_id) REFERENCES users(id)
);

CREATE TABLE notices_users(
	notice_id INT NOT NULL CONSTRAINT fk_notice_user_key  FOREIGN KEY (notice_id) REFERENCES notices(id),
	user_id INT NOT NULL CONSTRAINT fk_receiver_user_key FOREIGN KEY (user_id) REFERENCES users(id),
	CONSTRAINT pk_notices_users_idx PRIMARY KEY (notice_id, user_id)
);


CREATE TABLE notices_roles(
	notice_id INT NOT NULL CONSTRAINT fk_notice_role_key  FOREIGN KEY (notice_id) REFERENCES notices(id),
	role_id INT NOT NULL CONSTRAINT fk_receiver_role_key FOREIGN KEY (role_id) REFERENCES roles(id)
	CONSTRAINT pk_notices_roles_idx PRIMARY KEY (notice_id, role_id)
);


/*
SEGUNDA FASE: Adicionar as tabelas do sistema de chamados.
*/

CREATE TABLE calls_categories(
	id INT IDENTITY(1,1) CONSTRAINT pk_categories PRIMARY KEY,
	name VARCHAR(200),
	time time,
	created DATETIME2 DEFAULT NULL 
);

CREATE TABLE calls(
	id INT IDENTITY(1,1) CONSTRAINT pk_calls PRIMARY KEY,
	subject VARCHAR(100) not null,
	text VARCHAR(500),
	urgency VARCHAR(50) not null,
	category INT NOT NULL CONSTRAINT fk_categorie_key FOREIGN KEY (category) REFERENCES calls_categories(id),
	status VARCHAR(50) not null,
	created_by INT NOT NULL CONSTRAINT fk_sender_call_key FOREIGN KEY (created_by) REFERENCES users(id),
	attributed_to INT NOT NULL CONSTRAINT fk_receiver_call_key FOREIGN KEY (attributed_to) REFERENCES users(id),
	visualized BIT,
	created DATETIME2 DEFAULT NULL,
    modified DATETIME2 DEFAULT NULL
);

CREATE TABLE calls_responses(
	id INT IDENTITY(1,1) CONSTRAINT pk_calls_responses PRIMARY KEY,
	text VARCHAR(500),
	created_by INT NOT NULL CONSTRAINT fk_sender_response_key FOREIGN KEY (created_by) REFERENCES users(id),
	call_id INT NOT NULL CONSTRAINT fk_call_key FOREIGN KEY (call_id) REFERENCES calls(id), 
	visualized BIT,
	created DATETIME2 DEFAULT NULL 
);

CREATE TABLE calls_files(
	id INT IDENTITY(1,1) CONSTRAINT pk_calls_files PRIMARY KEY,
	text VARCHAR(500),
	files VARCHAR(500),
	call_id INT NOT NULL CONSTRAINT fk_call_files_key FOREIGN KEY (call_id) REFERENCES calls(id), 
	created DATETIME2 DEFAULT NULL 
);





