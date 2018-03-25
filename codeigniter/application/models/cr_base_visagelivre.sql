create schema visagelivre;

create table visagelivre._user(
 nickname varchar(30) constraint _user_pk primary key,
 pass varchar(20) not null,
 email varchar(40) not null
 );
 
create table visagelivre._friendof(
nickname varchar(30) not null constraint _friendof_user_fk1 references visagelivre._user,
friend varchar(30) not null constraint _friendof_user_fk2 references visagelivre._user,
birth_date date default current_date,
constraint _friendof_pk primary key (nickname, friend));

create table visagelivre._friendrequest(
nickname varchar(30) not null constraint _friendrequest_user_fk1 references visagelivre._user,
target varchar(30) not null constraint _friendrequest_user_fk2 references visagelivre._user,
request_date date default current_date,
constraint _friendrequest_pk primary key (nickname, target));

alter table visagelivre._friendof add constraint name_friend_chk check (nickname != friend);
alter table visagelivre._friendrequest add constraint name_target_chk check (nickname != target);

create table visagelivre._document(
IDDOC serial constraint _document_PK primary key,
content varchar(128) not null,
create_date timestamp not null default now(),
auteur varchar(30) not null constraint _document_user_fk references visagelivre._user on delete cascade);

create table visagelivre._post(
IDDOC integer not null constraint _post_PK primary key 
    constraint _post_IS_document_fk references visagelivre._document on delete cascade);
   
create table visagelivre._comment(
IDDOC integer not null constraint _comment_PK primary key 
    constraint _comment_IS_document_fk references visagelivre._document on delete cascade,
ref integer not null constraint _comment_document_fk references visagelivre._document on delete cascade);

insert into visagelivre._user values
('Utilisateur1','user1','user1@gmail.com'),
('Utilisateur2','user2','user2@gmail.com'),
('Utilisateur3','user3','user3@gmail.com'),
('Utilisateur4','user4','user4@gmail.com'),
('Utilisateur5','user5','user5@gmail.com'),
('Utilisateur6','user6','user6@gmail.com'),
('Utilisateur7','user7','user7@gmail.com'),
('Utilisateur8','user8','user8@gmail.com'),
('Utilisateur9','user9','user9@gmail.com');

insert into visagelivre.friendof (nickname,friend) values
('Utilisateur1','Utilisateur2'),
('Utilisateur1','Utilisateur3'),
('Utilisateur4','Utilisateur2'),
('Utilisateur4','Utilisateur6'),
('Utilisateur2','Utilisateur6');

insert into visagelivre.friendrequest (nickname,target) values
('Utilisateur1','Utilisateur4'),
('Utilisateur1','Utilisateur6'),
('Utilisateur4','Utilisateur7'),
('Utilisateur7','Utilisateur6'),
('Utilisateur5','Utilisateur3');











