use values;

CREATE TABLE data(
	id int auto_increment primary key not null,
	title varchar(255) not null,
    updated_at timestamp not null,
	content varchar(255) not null
)