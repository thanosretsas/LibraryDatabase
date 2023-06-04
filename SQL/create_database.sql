create database library_db;
use library_db;

create table if not exists author
(
    id         int(10) auto_increment
        primary key,
    first_name varchar(15) not null,
    last_name  varchar(15) not null
)
    collate = latin1_swedish_ci;

create index if not exists idx_author_first_and_last_name
    on author (first_name, last_name);

create table if not exists book
(
    id       int(10) auto_increment
        primary key,
    title    varchar(30)  not null,
    date     date         not null,
    ISBN     varchar(10)  not null,
    language varchar(20)  not null,
    page_num int(5)       not null,
    image    varchar(30)  null,
    keywords varchar(30)  null,
    summary  varchar(500) null
)
    collate = latin1_swedish_ci;

create index if not exists title_idx
    on book (title);

create table if not exists book_author
(
    id        int(10) auto_increment
        primary key,
    book_id   int(10) not null,
    author_id int(10) not null,
    constraint fk_author_id
        foreign key (author_id) references author (id)
            on update cascade,
    constraint fk_book_id
        foreign key (book_id) references book (id)
            on update cascade
)
    collate = latin1_swedish_ci;

create table if not exists category
(
    id   int(10) auto_increment
        primary key,
    name enum ('fiction', 'sci-fi', 'non-fiction', 'mystery', 'poetry', 'other') not null
)
    collate = latin1_swedish_ci;

create table if not exists book_category
(
    id          int(10) auto_increment
        primary key,
    book_id     int(10) not null,
    category_id int(10) not null,
    constraint fk_book_id2
        foreign key (book_id) references book (id)
            on update cascade,
    constraint fk_category_id
        foreign key (category_id) references category (id)
            on update cascade
)
    collate = latin1_swedish_ci;

create index if not exists idx_category_name
    on category (name);

create table if not exists global_administrator
(
    id       int(10) auto_increment
        primary key,
    username varchar(20) not null,
    password varchar(20) not null
)
    collate = latin1_swedish_ci;

create table if not exists school
(
    id                   int(7) auto_increment
        primary key,
    name                 varchar(25) not null,
    address              varchar(25) not null,
    city                 varchar(25) not null,
    phone                int(10)     not null,
    email                varchar(25) not null,
    principal_first_name varchar(25) not null,
    principal_last_name  varchar(25) not null,
    admin_id             int(10)     not null
)
    collate = latin1_swedish_ci;

create table if not exists book_school
(
    id               int(10) auto_increment
        primary key,
    book_id          int(10) not null,
    school_id        int(7)  not null,
    copies           int(10) not null,
    copies_available int(10) not null,
    constraint fk_book_id3
        foreign key (book_id) references book (id)
            on update cascade,
    constraint fk_school_id
        foreign key (school_id) references school (id)
            on update cascade
)
    collate = latin1_swedish_ci;

create table if not exists user
(
    id         int(10) auto_increment
        primary key,
    school_id  int(7)                                     not null,
    first_name varchar(20)                                not null,
    last_name  varchar(20)                                not null,
    username   varchar(20)                                not null,
    password   varchar(20)                                not null,
    phone      int(10)                                    not null,
    email      varchar(25)                                not null,
    birth_date date                                       not null,
    role       enum ('local_admin', 'teacher', 'student') not null,
    status     enum ('active', 'not_active')              not null,
    constraint fk_school_id2
        foreign key (school_id) references school (id)
            on update cascade
)
    collate = latin1_swedish_ci;

create table if not exists loan
(
    id             int(10) auto_increment
        primary key,
    book_school_id int(10) not null,
    user_id        int(10) not null,
    local_admin_id int(10) not null,
    loan_date      date    not null,
    due_date       date    not null,
    return_date    date    null,
    constraint fk_book_school_id2
        foreign key (book_school_id) references book_school (id)
            on update cascade,
    constraint fk_user_id
        foreign key (user_id) references user (id)
            on update cascade
)
    collate = latin1_swedish_ci;

create index if not exists fk_admin_id
    on loan (user_id);

create index if not exists idx_loan_date
    on loan (loan_date);

create table if not exists rating
(
    id       int(10) auto_increment
        primary key,
    user_id  int(10)            not null,
    book_id  int(10)            not null,
    review   varchar(500)       null,
    likert   int(1)             not null,
    approved enum ('yes', 'no') not null,
    constraint fk_book_id5
        foreign key (book_id) references book (id)
            on update cascade,
    constraint fk_user_id3
        foreign key (user_id) references user (id)
            on update cascade,
    check (`likert` >= 1 and `likert` <= 5)
)
    collate = latin1_swedish_ci;

create table if not exists reservation
(
    id             int(10) auto_increment
        primary key,
    book_school_id int(10)                    not null,
    user_id        int(10)                    not null,
    reserve_date   date                       null,
    status         enum ('active', 'pending') not null,
    constraint fk_book_school_id
        foreign key (book_school_id) references book_school (id)
            on update cascade,
    constraint fk_user_id2
        foreign key (user_id) references user (id)
            on update cascade
)
    collate = latin1_swedish_ci;

create index if not exists idx_role
    on user (role);

