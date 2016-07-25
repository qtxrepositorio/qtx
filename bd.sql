CREATE TABLE users(
    id INT IDENTITY(1,1) CONSTRAINT pk_users PRIMARY KEY,
	name VARCHAR(100) not null,
    username VARCHAR(50) not null,
    password VARCHAR(255) not null,
	status bit not null,
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
	CONSTRAINT pk_role_idx PRIMARY KEY (role_id, user_id),
);



