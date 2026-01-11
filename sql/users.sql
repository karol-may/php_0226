create table users
(
    id            int auto_increment
        primary key,
    email         varchar(255)                       not null,
    password_hash text                               not null,
    created_at    datetime default CURRENT_TIMESTAMP not null,
    constraint email
        unique (email)
);

INSERT INTO default_database.users (id, email, password_hash, created_at) VALUES (1, 'karol@imay.pl', '0', '2026-01-10 10:32:22');
INSERT INTO default_database.users (id, email, password_hash, created_at) VALUES (2, 'helena@imay.pl', '0', '2026-01-10 10:39:47');
INSERT INTO default_database.users (id, email, password_hash, created_at) VALUES (4, 'karola@imay.pl', '0', '2026-01-10 11:02:31');
INSERT INTO default_database.users (id, email, password_hash, created_at) VALUES (7, 'karolb@imay.pl', '0', '2026-01-10 11:03:45');
INSERT INTO default_database.users (id, email, password_hash, created_at) VALUES (8, 'awys94@gmail.com', '0', '2026-01-10 11:07:09');
INSERT INTO default_database.users (id, email, password_hash, created_at) VALUES (11, 'awys9a4@gmail.com', '0', '2026-01-10 11:08:17');
INSERT INTO default_database.users (id, email, password_hash, created_at) VALUES (12, 'awys9a4@gmail.coma', '0', '2026-01-10 11:08:32');
INSERT INTO default_database.users (id, email, password_hash, created_at) VALUES (15, 'awys9a4@gmail.comaa', '0', '2026-01-10 11:09:04');
INSERT INTO default_database.users (id, email, password_hash, created_at) VALUES (18, 'awys94@gmail.comqwertyu', '0', '2026-01-10 11:15:17');
INSERT INTO default_database.users (id, email, password_hash, created_at) VALUES (20, 'awys94@gmail.comzs', '0', '2026-01-10 11:15:30');
INSERT INTO default_database.users (id, email, password_hash, created_at) VALUES (24, 'awys94@gmail.comzs4', '0', '2026-01-10 11:22:41');
INSERT INTO default_database.users (id, email, password_hash, created_at) VALUES (25, 'awys94@gmail.comzs44', '0', '2026-01-10 11:22:43');
INSERT INTO default_database.users (id, email, password_hash, created_at) VALUES (26, 'awys94@gmail.comzs444', '0', '2026-01-10 11:22:45');
INSERT INTO default_database.users (id, email, password_hash, created_at) VALUES (31, 'awys94@gmail.comzs4444', '0', '2026-01-10 11:22:50');
INSERT INTO default_database.users (id, email, password_hash, created_at) VALUES (41, 'karol@imay.pldsddsd', '0', '2026-01-10 11:35:44');
INSERT INTO default_database.users (id, email, password_hash, created_at) VALUES (47, 'karol@imay.pldsddsds', '0', '2026-01-10 11:35:49');
INSERT INTO default_database.users (id, email, password_hash, created_at) VALUES (56, 'karol@imay.pldsddsds3', '0', '2026-01-10 11:36:01');
INSERT INTO default_database.users (id, email, password_hash, created_at) VALUES (69, 'karol@imay.pldg', '0', '2026-01-10 12:04:11');
INSERT INTO default_database.users (id, email, password_hash, created_at) VALUES (70, 'karol@imay.pldgds', '0', '2026-01-10 12:04:15');
