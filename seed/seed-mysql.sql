-- Database seed with default message value

create table if not exists slim.main
(
	id int auto_increment primary key,
	message text null,
	created_at timestamp default current_timestamp() not null,
	updated_at timestamp default null
);

insert into main (message) value ('What now?');