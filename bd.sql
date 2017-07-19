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

CREATE TABLE calls_status(
    id INT IDENTITY(1,1) CONSTRAINT pk_status PRIMARY KEY,
    title VARCHAR(100) NOT NULL,
    description VARCHAR(500) NOT NULL,
    created DATETIME2 DEFAULT NULL,
    modified DATETIME2 DEFAULT NULL
);

CREATE TABLE calls_areas(
    id INT IDENTITY(1,1) CONSTRAINT pk_areas PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    description VARCHAR(500) NOT NULL,
    created DATETIME2 DEFAULT NULL,
    modified DATETIME2 DEFAULT NULL
);

CREATE TABLE calls_categories(
    id INT IDENTITY(1,1) CONSTRAINT pk_categories PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    description VARCHAR(500) NOT NULL,
    area_id INT NOT NULL CONSTRAINT fk_area_key FOREIGN KEY (area_id) REFERENCES calls_areas(id),
    created DATETIME2 DEFAULT NULL,
    modified DATETIME2 DEFAULT NULL
);

CREATE TABLE calls_subcategories(
    id INT IDENTITY(1,1) CONSTRAINT pk_subcategories PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    description VARCHAR(500) NOT NULL,
    sla time  NOT NULL,
    category_id INT NOT NULL CONSTRAINT fk_category_key FOREIGN KEY (category_id) REFERENCES calls_categories(id),
    created DATETIME2 DEFAULT NULL,
    modified DATETIME2 DEFAULT NULL
);

CREATE TABLE calls_solutions(
    id INT IDENTITY(1,1) CONSTRAINT pk_solutions PRIMARY KEY,
    title VARCHAR(100) NOT NULL,
    description VARCHAR(500) NOT NULL,
    subcategorie_id INT NOT NULL CONSTRAINT fk_subcategorie_key FOREIGN KEY (subcategorie_id) REFERENCES calls_subcategories(id),
    created DATETIME2 DEFAULT NULL,
    modified DATETIME2 DEFAULT NULL
);

CREATE TABLE solutions_files(
    id INT IDENTITY(1,1) CONSTRAINT pk_solutions_files PRIMARY KEY,
    text VARCHAR(500) NOT NULL,
    archive VARCHAR(500) NOT NULL,
    solution_id INT NOT NULL CONSTRAINT fk_solutions_files_key FOREIGN KEY (solution_id) REFERENCES calls_solutions(id),
    created DATETIME2 DEFAULT NULL,
    modified DATETIME2 DEFAULT NULL
);

CREATE TABLE calls_urgency(
    id INT IDENTITY(1,1) CONSTRAINT pk_urgency PRIMARY KEY,
    title VARCHAR(100) NOT NULL,
    description VARCHAR(500) NOT NULL,
    created DATETIME2 DEFAULT NULL,
    modified DATETIME2 DEFAULT NULL
);

CREATE TABLE calls(
    id INT IDENTITY(1,1) CONSTRAINT pk_calls PRIMARY KEY,
    subject VARCHAR(100) not null,
    text VARCHAR(500),
    area_id INT NOT NULL CONSTRAINT fk_call_area_key FOREIGN KEY (area_id) REFERENCES calls_areas(id),
    category_id INT NOT NULL CONSTRAINT fk_call_categorie_key FOREIGN KEY (category_id) REFERENCES calls_categories(id),
    subcategory_id INT NOT NULL CONSTRAINT fk_call_subcategorie_key FOREIGN KEY (subcategory_id) REFERENCES calls_subcategories(id),
    status_id INT NOT NULL CONSTRAINT fk_call_status_key FOREIGN KEY (status_id) REFERENCES calls_status(id),
    urgency_id INT NOT NULL CONSTRAINT fk_call_urgency_key FOREIGN KEY (urgency_id) REFERENCES calls_urgency(id),
    solution_id INT CONSTRAINT fk_call_solution_key FOREIGN KEY (solution_id) REFERENCES calls_solutions(id),
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
    created DATETIME2 DEFAULT NULL,
    modified DATETIME2 DEFAULT NULL
);

CREATE TABLE calls_files(
    id INT IDENTITY(1,1) CONSTRAINT pk_calls_files PRIMARY KEY,
    text VARCHAR(100),
    archive VARCHAR(500),
    call_id INT NOT NULL CONSTRAINT fk_call_files_key FOREIGN KEY (call_id) REFERENCES calls(id),
    created DATETIME2 DEFAULT NULL,
    modified DATETIME2 DEFAULT NULL
);

/*
TERCEIRA FASE: Adicionar as tabelas do sistema de comunicação externa.
*/

CREATE TABLE treatments_document (
    id INT IDENTITY(1,1) CONSTRAINT pk_treatments PRIMARY KEY,
    description VARCHAR(200) NOT NULL,
    status TINYINT(max) NOT NULL
    created DATETIME2 DEFAULT NULL
    modified DATETIME2 DEFAULT NULL
);

CREATE TABLE references_document(
    id INT IDENTITY(1,1) CONSTRAINT pk_references PRIMARY KEY,
    description VARCHAR(45) NOT NULL,
    status TINYINT(1) NOT NULL,
);

CREATE TABLE external_documents (
    id INT IDENTITY(1,1) CONSTRAINT pk_external_documents PRIMARY KEY,
    number_document VARCHAR(10),
    local VARCHAR(45) NOT NULL,
    client_id INT NOT NULL,
    client_name VARCHAR(45) NOT NULL,
    client_contact VARCHAR(45) NOT NULL,
    treatment_id INT NOT NULL CONSTRAINT fk_treatment FOREIGN KEY (treatment_id) REFERENCES treatments_document(id),
    reference_id INT NOT NULL CONSTRAINT fk_reference FOREIGN KEY (reference_id) REFERENCES references_document(id),
    subject VARCHAR(45) NOT NULL,
    user_id INT NOT NULL CONSTRAINT fk_sender_external_document FOREIGN KEY (user_id) REFERENCES users(id),
    user_function VARCHAR(45) NOT NULL,
    created DATETIME2 DEFAULT NULL
);
