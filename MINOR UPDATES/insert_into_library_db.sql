
Skip to content

    Pricing

Sign in
Sign up
thanosretsas /
LibraryDatabase
Public

Code
Issues
Pull requests
Actions
Projects
Security

    Insights

LibraryDatabase/SQL/insert_into_library_db.sql
@thanosretsas
thanosretsas Add files via upload
Latest commit a0962a2 Jun 4, 2023
History
1 contributor
692 lines (672 sloc) 71.3 KB
use library_db;
INSERT INTO book (title, date, ISBN, language, page_num, image, keywords, summary)
VALUES
    ('The Hobbit', '2022-09-21', '9780547928227', 'English', 310, 'the_hobbit.jpg', 'fantasy, adventure', 'A fantasy novel that serves as a prequel to The Lord of the Rings.'),
    ('Frankenstein', '2022-05-11', '9780486282114', 'English', 280, 'frankenstein.jpg', 'gothic, science fiction', 'A classic tale of science, creation, and the consequences of playing God.'),
    ('The Alchemist', '2022-07-12', '9780062315007', 'English', 208, 'the_alchemist.jpg', 'spiritual, allegory', 'A philosophical novel about a young Andalusian shepherd who embarks on a journey to discover his personal legend.'),
    ('Brave New World', '2022-03-07', '9780060850524', 'English', 288, 'brave_new_world.jpg', 'dystopian, science fiction', 'A dystopian novel set in a futuristic society where human reproduction, social order, and individuality are tightly controlled.'),
    ('The Picture of Dorian Gray', '2022-10-14', '9780199535989', 'English', 254, 'dorian_gray.jpg', 'gothic, philosophical', 'A Gothic novel that explores the themes of beauty, art, and the consequences of pursuing pleasure without regard for morality.'),
    ('The Great Expectations', '2022-11-30', '9780141439563', 'English', 544, 'great_expectations.jpg', 'coming-of-age, bildungsroman', 'A coming-of-age novel that follows the life of an orphan named Pip and his journey through the social class system of Victorian England.'),
    ('Animal Farm', '2022-08-26', '9780451526342', 'English', 112, 'animal_farm.jpg', 'political, allegory', 'An allegorical novella that satirizes the events leading up to the Russian Revolution and the Stalinist era of the Soviet Union.'),
    ('The Adventures of Huckleberry Finn', '2022-06-18', '9780486280615', 'English', 366, 'huckleberry_finn.jpg', 'adventure, satire', 'A satirical novel that follows the adventures of a young boy named Huck Finn as he travels down the Mississippi River with a runaway slave.'),
    ('Crime and Punishment', '2022-04-05', '9780140449136', 'English', 671, 'crime_punishment.jpg', 'psychological, crime', 'A psychological novel that explores the moral and mental anguish of a young man who commits a murder and faces the consequences.'),
    ('The Kite Runner', '2022-02-09', '9781594631931', 'English', 371, 'kite_runner.jpg', 'historical, drama', 'A novel that tells the story of Amir, a young boy from Afghanistan, and his journey of redemption and self-discovery.');
insert into book (title, date, ISBN, language, page_num, image, keywords, summary) values ('Hunger Games 1', '1863/04/02', '357279877-9', 'English', 210, null, 'dystopia', null);
insert into book (title, date, ISBN, language, page_num, image, keywords, summary) values ('Hunger Games 2', '1901/05/17', '124325910-8', 'English', 411, null, 'dystopia', null);
insert into book (title, date, ISBN, language, page_num, image, keywords, summary) values ('Hunger Games 3', '1829/08/19', '970421951-2', 'English', 249, null, 'dystopia', null);
insert into book (title, date, ISBN, language, page_num, image, keywords, summary) values ('Hunger Games 4', '1988/02/14', '857260846-X', 'English', 293, null, 'dystopia', null);
insert into book (title, date, ISBN, language, page_num, image, keywords, summary) values ('Hunger Games 5', '1949/03/19', '383886908-7', 'English', 157, null, 'dystopia', null);
insert into book (title, date, ISBN, language, page_num, image, keywords, summary) values ('Secret Seven 1', '1757/05/09', '651822625-0', 'Greek', 245, null, 'adventure', null);
insert into book (title, date, ISBN, language, page_num, image, keywords, summary) values ('Secret Seven 2', '1843/12/04', '646920602-6', 'Greek', 92, null, 'adventure', null);
insert into book (title, date, ISBN, language, page_num, image, keywords, summary) values ('Secret Seven 3', '1972/10/16', '178872012-1', 'Portuguese', 223, null, 'adventure', null);
insert into book (title, date, ISBN, language, page_num, image, keywords, summary) values ('Secret Seven 4', '1788/05/18', '755463250-7', 'Bulgarian', 499, null, 'adventure', null);
insert into book (title, date, ISBN, language, page_num, image, keywords, summary) values ('Secret Seven 5', '1866/01/05', '795412117-8', 'Greek', 467, 'quisque.jpg', 'adventure', null);
insert into book (title, date, ISBN, language, page_num, image, keywords, summary) values ('Secret Seven 6', '1957/02/14', '750033309-9', 'Greek', 75, 'molestie.jpg', null, null);
insert into book (title, date, ISBN, language, page_num, image, keywords, summary) values ('Secret Seven 7', '2021/09/18', '659223247-1', 'Greek', 437, 'id.jpg', 'adventure', null);
insert into book (title, date, ISBN, language, page_num, image, keywords, summary) values ('Secret Seven 8', '1956/08/23', '034281469-9', 'Greek', 293, null, 'adventure', null);
insert into book (title, date, ISBN, language, page_num, image, keywords, summary) values ('Secret Seven 9', '1744/05/03', '906912415-7', 'Greek', 479, null, 'adventure', null);
insert into book (title, date, ISBN, language, page_num, image, keywords, summary) values ('Secret Seven 10', '1950/06/07', '472649481-3', 'Greek', 171, 'a.jpg', 'adventure', null);
insert into book (title, date, ISBN, language, page_num, image, keywords, summary) values ('Secret Seven 11', '1807/08/20', '727501576-5', 'Greek', 206, null, null, 'adventure');
insert into book (title, date, ISBN, language, page_num, image, keywords, summary) values ('Secret Seven 12', '1864/09/09', '164328859-8', 'Greek', 430, null, 'adventure', null);
insert into book (title, date, ISBN, language, page_num, image, keywords, summary) values ('Secret Seven 13', '1769/11/15', '271796525-4', 'Irish Gaelic', 370, 'advent.jpg', null, null);
insert into book (title, date, ISBN, language, page_num, image, keywords, summary) values ('Secret Seven 14', '1811/10/19', '825833030-6', 'Greek', 127, null, 'adventure', null);
insert into book (title, date, ISBN, language, page_num, image, keywords, summary) values ('Secret Seven 15', '1732/04/19', '561276187-2', 'Greek', 115, 'eget.jpg', null, null);
insert into book (title, date, ISBN, language, page_num, image, keywords, summary) values ('Secret Seven 16', '1988/01/29', '014384666-3', 'Greek', 104, 'in.jpg', 'adventure', null);
insert into book (title, date, ISBN, language, page_num, image, keywords, summary) values ('Famous Five 1', '1727/02/10', '564700138-6', 'Greek', 456, null, null, null);
insert into book (title, date, ISBN, language, page_num, image, keywords, summary) values ('Famous Five 2', '1832/08/16', '943787429-8', 'Greek', 422, 'vulputate.jpg', 'adventure', null);
insert into book (title, date, ISBN, language, page_num, image, keywords, summary) values ('Famous Five 3', '1722/01/04', '419174468-2', 'Portuguese', 109, null, null, null);
insert into book (title, date, ISBN, language, page_num, image, keywords, summary) values ('Famous Five 4', '1763/12/06', '110846817-9', 'Greek', 399, null, null, null);
insert into book (title, date, ISBN, language, page_num, image, keywords, summary) values ('Famous Five 5', '2008/05/19', '275147049-1', 'Romanian', 325, null, 'adventure', null);
insert into book (title, date, ISBN, language, page_num, image, keywords, summary) values ('Famous Five 6', '1785/10/12', '675916896-8', 'Greek', 74, null, 'adventure', 'vel augue vestibulum rutrum rutrum');
insert into book (title, date, ISBN, language, page_num, image, keywords, summary) values ('Famous Five 7', '1972/05/01', '805803772-9', 'Greek', 225, null, 'adventure', null);
insert into book (title, date, ISBN, language, page_num, image, keywords, summary) values ('Famous Five 8', '1829/02/11', '372349137-5', 'Greek', 216, null, 'adventure', null);
insert into book (title, date, ISBN, language, page_num, image, keywords, summary) values ('Famous Five 9', '2001/11/03', '782786056-7', 'Greek', 246, null, 'adventure', null);
insert into book (title, date, ISBN, language, page_num, image, keywords, summary) values ('Famous Five 10', '1782/02/25', '592215793-0', 'Greek', 178, null, 'adventure', null);
insert into book (title, date, ISBN, language, page_num, image, keywords, summary) values ('Famous Five 11', '1895/09/06', '648846545-7', 'Italian', 408, null, null, null);
insert into book (title, date, ISBN, language, page_num, image, keywords, summary) values ('Famous Five 12', '1834/05/30', '778851403-9', 'Greek', 295, null, 'adventure', null);
insert into book (title, date, ISBN, language, page_num, image, keywords, summary) values ('Famous Five 13', '1702/03/06', '571868878-8', 'Greek', 144, 'turpis.jpg', 'adventure', null);
insert into book (title, date, ISBN, language, page_num, image, keywords, summary) values ('Famous Five 14', '1994/06/20', '367304050-2', 'Norwegian', 75, 'adv.jpg', 'adventure', null);
insert into book (title, date, ISBN, language, page_num, image, keywords, summary) values ('Famous Five 15', '1983/04/25', '139957479-5', 'Georgian', 374, 'ture.jpg', null, null);
insert into book (title, date, ISBN, language, page_num, image, keywords, summary) values ('Famous Five 16', '2010/08/30', '883895164-0', 'Greek', 382, 'sem', 'adventure', null);
insert into book (title, date, ISBN, language, page_num, image, keywords, summary) values ('Famous Five 17', '1798/10/18', '852719111-3', 'Greek', 156, null, 'adventure', null);
insert into book (title, date, ISBN, language, page_num, image, keywords, summary) values ('Famous Five 18', '1846/04/17', '881348731-2', 'Greek', 222, 'consequat.jpg', 'adventure', null);
insert into book (title, date, ISBN, language, page_num, image, keywords, summary) values ('Famous Five 19', '1939/11/29', '429824786-4', 'Greek', 216, null, null, null);
insert into book (title, date, ISBN, language, page_num, image, keywords, summary) values ('Famous Five 20', '1831/12/04', '125558465-3', 'Hebrew', 237, null, 'adventure', null);
insert into book (title, date, ISBN, language, page_num, image, keywords, summary) values ('Poirot 1', '1848/11/07', '736681815-1', 'Greek', 89, null, 'detective', null);
insert into book (title, date, ISBN, language, page_num, image, keywords, summary) values ('Poirot 2', '1756/07/06', '769312989-8', 'Danish', 104, null, 'detective', 'molestie nibh in');
insert into book (title, date, ISBN, language, page_num, image, keywords, summary) values ('Poirot 3', '1877/09/09', '718149305-1', 'Greek', 383, null, 'detective', null);
insert into book (title, date, ISBN, language, page_num, image, keywords, summary) values ('Poirot 4', '1979/08/17', '830537818-7', 'Hungarian', 389, null, 'detective', null);
insert into book (title, date, ISBN, language, page_num, image, keywords, summary) values ('Poirot 5', '1753/12/06', '569955371-1', 'Belarusian', 499, null, null, null);
insert into book (title, date, ISBN, language, page_num, image, keywords, summary) values ('Poirot 6', '1917/06/04', '467723314-4', 'Greek', 442, null, 'detective', null);
insert into book (title, date, ISBN, language, page_num, image, keywords, summary) values ('Poirot 7', '1792/05/12', '808027064-3', 'Greek', 150, null, 'detective', null);
insert into book (title, date, ISBN, language, page_num, image, keywords, summary) values ('Poirot 8', '1880/08/21', '409176096-1', 'Greek', 483, null, 'detective', 'diam neque');
insert into book (title, date, ISBN, language, page_num, image, keywords, summary) values ('Poirot 9', '1883/01/13', '241734148-4', 'Greek', 132, null, 'detective', null);
insert into book (title, date, ISBN, language, page_num, image, keywords, summary) values ('Poirot 10', '1882/01/05', '364777431-6', 'Polish', 398, null, 'detective', null);
insert into book (title, date, ISBN, language, page_num, image, keywords, summary) values ('Poirot 11', '1706/10/20', '167961780-X', 'Greek', 199, null, 'detective', null);
insert into book (title, date, ISBN, language, page_num, image, keywords, summary) values ('Poirot 12', '1716/08/26', '753527802-7', 'Greek', 86, null, 'detective', null);
insert into book (title, date, ISBN, language, page_num, image, keywords, summary) values ('Poirot 13', '1887/11/01', '892269008-9', 'Greek', 365, null, 'detective', null);
insert into book (title, date, ISBN, language, page_num, image, keywords, summary) values ('Poirot 14', '1904/11/09', '060303535-3', 'Swedish', 351, 'interdum.jpg', 'detective', null);
insert into book (title, date, ISBN, language, page_num, image, keywords, summary) values ('Poirot 15', '1877/04/12', '069039214-1', 'Greek', 149, null, 'detective', null);
insert into book (title, date, ISBN, language, page_num, image, keywords, summary) values ('Poirot 16', '1779/02/27', '827001204-1', 'Greek', 391, 'nibh.jpg', 'future', null);
insert into book (title, date, ISBN, language, page_num, image, keywords, summary) values ('1984', '1763/10/22', '123381265-3', 'Hungarian', 224, null, null, null);
insert into book (title, date, ISBN, language, page_num, image, keywords, summary) values ('Ms Marple 1', '1831/08/07', '722850300-7', 'Greek', 368, null, 'crime', 'neque libero convallis');
insert into book (title, date, ISBN, language, page_num, image, keywords, summary) values ('Ms Marple 2', '1743/04/10', '545957725-X', 'Greek', 463, null, null, null);
insert into book (title, date, ISBN, language, page_num, image, keywords, summary) values ('Ms Marple 3', '1981/01/08', '700971008-2', 'Greek', 87, null, 'crime', null);
insert into book (title, date, ISBN, language, page_num, image, keywords, summary) values ('Ms Marple 4', '1934/10/03', '347807066-X', 'Greek', 125, null, null, null);
insert into book (title, date, ISBN, language, page_num, image, keywords, summary) values ('Ms Marple 5', '1979/10/26', '159117664-6', 'Greek', 270, 'nibh.jpg', 'crime', null);
insert into book (title, date, ISBN, language, page_num, image, keywords, summary) values ('Ms Marple 6', '1753/06/27', '933507452-7', 'Greek', 226, null, 'crime', null);
insert into book (title, date, ISBN, language, page_num, image, keywords, summary) values ('Ms Marple 7', '1916/07/17', '858625385-5', 'Greek', 304, null, null, null);
insert into book (title, date, ISBN, language, page_num, image, keywords, summary) values ('Ms Marple 8', '1977/11/26', '490912465-9', 'Greek', 87, null, 'crime', null);
insert into book (title, date, ISBN, language, page_num, image, keywords, summary) values ('Ms Marple 9', '1723/11/03', '002021809-5', 'Greek', 337, null, 'crime', null);
insert into book (title, date, ISBN, language, page_num, image, keywords, summary) values ('Ms Marple 10', '1871/10/04', '529630723-2', 'Greek', 270, null, 'crime', null);
insert into book (title, date, ISBN, language, page_num, image, keywords, summary) values ('Ms Marple 11', '1792/10/14', '231431227-9', 'Greek', 265, 'nulla.jpg', 'crime', null);
insert into book (title, date, ISBN, language, page_num, image, keywords, summary) values ('Ms Marple 12', '1913/10/28', '821911308-1', 'Greek', 250, null, null, null);
insert into book (title, date, ISBN, language, page_num, image, keywords, summary) values ('Ms Marple 13', '1929/02/22', '276429947-8', 'Greek', 223, null, 'crime', null);
insert into book (title, date, ISBN, language, page_num, image, keywords, summary) values ('Ms Marple 14 ', '2019/12/15', '128463551-1', 'Greek', 491, null, 'crime', null);
insert into book (title, date, ISBN, language, page_num, image, keywords, summary) values ('Ms Marple 15', '1709/02/19', '154509625-2', 'Greek', 222, null, 'crime', null);
insert into book (title, date, ISBN, language, page_num, image, keywords, summary) values ('Ms Marple 16', '2008/04/25', '986404941-0', 'Greek', 284, 'primis.jpg', 'crime', null);
insert into book (title, date, ISBN, language, page_num, image, keywords, summary) values ('Ms Marple 17', '1780/02/14', '065561787-6', 'Greek', 88, null, 'crime', null);
insert into book (title, date, ISBN, language, page_num, image, keywords, summary) values ('Ms Marple 18', '1870/12/12', '546125220-6', 'Greek', 177, null, 'crime', null);
insert into book (title, date, ISBN, language, page_num, image, keywords, summary) values ('Ms Marple 19', '1928/03/02', '778906035-X', 'Greek', 221, 'eros.jpg', null, null);
insert into book (title, date, ISBN, language, page_num, image, keywords, summary) values ('Ms Marple 20', '1879/10/14', '842889112-5', 'Greek', 450, 'eget.jpg', 'crime', null);
insert into book (title, date, ISBN, language, page_num, image, keywords, summary) values ('Sherlock Holmes 1', '1883/08/08', '116656365-0', 'Irish Gaelic', 176, 'lorem', null, null);
insert into book (title, date, ISBN, language, page_num, image, keywords, summary) values ('Sherlock Holmes 2', '1719/05/02', '337309719-3', 'Czech', 255, null, null, null);
insert into book (title, date, ISBN, language, page_num, image, keywords, summary) values ('Sherlock Holmes 3', '1961/09/28', '444382115-5', 'Catalan', 139, null, 'crime', null);
insert into book (title, date, ISBN, language, page_num, image, keywords, summary) values ('Sherlock Holmes 4', '1863/06/11', '800142433-2', 'Czech', 219, null, null, null);
insert into book (title, date, ISBN, language, page_num, image, keywords, summary) values ('Sherlock Holmes 5', '1828/03/07', '784793779-4', 'Persian', 192, null, 'crime', 'volutpat quam');
insert into book (title, date, ISBN, language, page_num, image, keywords, summary) values ('Sherlock Holmes 6', '1857/05/05', '818872717-2', 'Greek', 299, null, 'crime', null);
insert into book (title, date, ISBN, language, page_num, image, keywords, summary) values ('Sherlock Holmes 7', '1920/02/29', '817497542-X', 'Greek', 394, null, 'crime', 'sed accumsan');
insert into book (title, date, ISBN, language, page_num, image, keywords, summary) values ('Sherlock Holmes 8', '1883/08/08', '116612365-0', 'Irish Gaelic', 178, 'lorem.jpg', null, null);
insert into book (title, date, ISBN, language, page_num, image, keywords, summary) values ('Sherlock Holmes 9', '1719/05/02', '337312319-3', 'Czech', 295, null, null, null);
insert into book (title, date, ISBN, language, page_num, image, keywords, summary) values ('Sherlock Holmes 10', '1961/09/28', '444123115-5', 'Catalan', 135, null, 'crime', null);
insert into book (title, date, ISBN, language, page_num, image, keywords, summary) values ('Sherlock Holmes 11', '1863/06/11', '800123433-2', 'Czech', 299, null, null, null);
insert into book (title, date, ISBN, language, page_num, image, keywords, summary) values ('Sherlock Holmes 12', '1828/03/07', '784123779-4', 'Persian', 199, null, 'crime', 'volutpat quam');
insert into book (title, date, ISBN, language, page_num, image, keywords, summary) values ('Sherlock Holmes 13', '1857/05/05', '818123717-2', 'Greek', 399, null, 'crime', null);
insert into book (title, date, ISBN, language, page_num, image, keywords, summary) values ('Sherlock Holmes 14', '1920/02/29', '817123542-X', 'Greek', 494, null, 'crime', 'sed accumsan');

insert into global_administrator(username, password) values ('oadmin', 'strongpass');

insert into school (name, address, city, phone, email, principal_first_name, principal_last_name, admin_id)
values
    ('1o gel', '25hmartiou2', 'athens', 12345678, '1gel@sch.gr', 'anasta', 'siou', 57),
    ('2o gel', '28hoktovri5', 'athens', 12345678, '2gel@sch.gr', 'nikos', 'nikolaou', 58),
    ('3o gel', 'mpenaki7', 'athens', 12345678, '3gel@sch.gr', 'spyros', 'antoniou', 59),
    ('4o gel', 'eptanisou23', 'athens', 12345678, '4gel@gsch.gr', 'lampros', 'mpampis', 60);

INSERT INTO `category` (`id`, `name`) VALUES (NULL, 'fiction'), (NULL, 'sci-fi'), (NULL, 'non-fiction'), (NULL, 'mystery'), (NULL, 'poetry'), (NULL, 'other');



insert into user (school_id, first_name, last_name, username, password, phone, email, birth_date, role, status) values (1, 'Melissa', 'Penning', 'kpenning0', '9sNKC2IUASO', '894-193-5442', 'mpenning0@google.cn', '2021-11-04', 'student', 'active');
insert into user (school_id, first_name, last_name, username, password, phone, email, birth_date, role, status) values (1, 'Ruth', 'Murrhaupt', 'mmurrhaupt1', 'mDqVmx8wqtrw', '564-719-0272', 'gmurrhaupt1@psu.edu', '2022-05-15', 'student', 'active');
insert into user (school_id, first_name, last_name, username, password, phone, email, birth_date, role, status) values (1, 'Ocean', 'Misselbrook', 'gmisselbrook2', 'H4oV0LFEX3', '722-894-4296', 'amisselbrook2@facebook.com', '2021-06-27', 'student', 'not_active');
insert into user (school_id, first_name, last_name, username, password, phone, email, birth_date, role, status) values (1, 'Len', 'Kasparski', 'mkasparski3', 'EFTrDv', '702-307-6786', 'rkasparski3@gnu.org', '2020-11-21', 'student', 'active');
insert into user (school_id, first_name, last_name, username, password, phone, email, birth_date, role, status) values (1, 'Anais', 'Pudding', 'ppudding4', '1lkgZ6', '547-924-4307', 'jpudding4@omniture.com', '2021-07-04', 'student', 'active');
insert into user (school_id, first_name, last_name, username, password, phone, email, birth_date, role, status) values (1, 'Camelia', 'Nore', 'anore5', 'JNE4igu', '897-321-1031', 'snore5@bluehost.com', '2022-01-11', 'student', 'active');
insert into user (school_id, first_name, last_name, username, password, phone, email, birth_date, role, status) values (1, 'Adele', 'Reinbach', 'greinbach6', 'aZCQbM', '155-997-5968', 'ereinbach6@1und1.de', '2022-07-21', 'student', 'active');
insert into user (school_id, first_name, last_name, username, password, phone, email, birth_date, role, status) values (1, 'Esteve', 'Josovich', 'ajosovich7', 'LfyQts3jYf', '339-128-1576', 'bjosovich7@indiegogo.com', '2021-10-02', 'student', 'active');
insert into user (school_id, first_name, last_name, username, password, phone, email, birth_date, role, status) values (1, 'Leonore', 'Erie', 'aerie8', 'cKaeaWbCBNvp', '868-836-8544', 'berie8@bigcartel.com', '2022-02-03', 'student', 'active');
insert into user (school_id, first_name, last_name, username, password, phone, email, birth_date, role, status) values (1, 'Ruo', 'Epple', 'kepple9', '714OtNB', '942-679-6641', 'mepple9@sohu.com', '2022-01-11', 'student', 'active');
insert into user (school_id, first_name, last_name, username, password, phone, email, birth_date, role, status) values (2, 'Noemie', 'Rehn', 'brehna', 'F1SerhF', '264-106-4427', 'mrehna@mail.ru', '2021-09-30', 'student', 'active');
insert into user (school_id, first_name, last_name, username, password, phone, email, birth_date, role, status) values (2, 'Leana', 'Sewall', 'zsewallb', 'zSuP0k4ZyxsE', '390-644-1984', 'msewallb@intel.com', '2022-08-29', 'student', 'active');
insert into user (school_id, first_name, last_name, username, password, phone, email, birth_date, role, status) values (2, 'Persy', 'Rablen', 'arablenc', 'clJCEYMrfN', '714-201-4495', 'rrablenc@mac.com', '2020-11-13', 'student', 'active');
insert into user (school_id, first_name, last_name, username, password, phone, email, birth_date, role, status) values (2, 'Garcon', 'Spratling', 'aspratlingd', '9geDQJ3', '631-591-8816', 'aspratlingd@smh.com.au', '2023-03-13', 'student', 'active');
insert into user (school_id, first_name, last_name, username, password, phone, email, birth_date, role, status) values (2, 'Gaia', 'Westgarth', 'dwestgarthe', '0CPg9fP', '174-916-6415', 'dwestgarthe@cornell.edu', '2022-12-07', 'student', 'active');
insert into user (school_id, first_name, last_name, username, password, phone, email, birth_date, role, status) values (2, 'You', 'Joule', 'djoulef', 'jVyNcL3rQ', '307-519-2348', 'bjoulef@techcrunch.com', '2022-05-23', 'student', 'active');
insert into user (school_id, first_name, last_name, username, password, phone, email, birth_date, role, status) values (2, 'Alois', 'Sully', 'fsullyg', '3qVHHvS', '789-758-9722', 'lsullyg@ovh.net', '2022-09-29', 'student', 'active');
insert into user (school_id, first_name, last_name, username, password, phone, email, birth_date, role, status) values (2, 'Orjan', 'Swatheridge', 'lswatheridgeh', '53BTra', '470-900-3505', 'bswatheridgeh@furl.net', '2021-10-28', 'student', 'active');
insert into user (school_id, first_name, last_name, username, password, phone, email, birth_date, role, status) values (2, 'Ana', 'Coghlin', 'wcoghlini', 'qy2CT9leAlO', '446-117-8544', 'ccoghlini@noaa.gov', '2022-07-28', 'student', 'active');
insert into user (school_id, first_name, last_name, username, password, phone, email, birth_date, role, status) values (2, 'Tess', 'Swinford', 'lswinfordj', '42Sj6EsMQwNv', '780-529-7330', 'lswinfordj@sohu.com', '2021-08-07', 'student', 'active');
insert into user (school_id, first_name, last_name, username, password, phone, email, birth_date, role, status) values (3, 'Marie', 'Romeuf', 'nromeufk', 'axuEcpAku', '888-679-5892', 'rromeufk@hhs.gov', '2021-04-03', 'student', 'active');
insert into user (school_id, first_name, last_name, username, password, phone, email, birth_date, role, status) values (3, 'Esbjorn', 'Millam', 'pmillaml', 'BV9kN79Y4U9', '571-656-4404', 'cmillaml@sitemeter.com', '2021-09-03', 'student', 'not_active');
insert into user (school_id, first_name, last_name, username, password, phone, email, birth_date, role, status) values (3, 'Marie-therese', 'Chamberlain', 'jchamberlainm', '8a708VRY', '370-262-3567', 'dchamberlainm@flavors.me', '2022-12-28', 'student', 'active');
insert into user (school_id, first_name, last_name, username, password, phone, email, birth_date, role, status) values (3, 'Ma', 'Brayshaw', 'gbrayshawn', 'Z1QrKtTU72i', '665-180-2970', 'ebrayshawn@unicef.org', '2022-08-02', 'student', 'active');
insert into user (school_id, first_name, last_name, username, password, phone, email, birth_date, role, status) values (3, 'Bjorn', 'Habens', 'rhabenso', 'ewb5PJU', '331-324-6878', 'khabenso@walmart.com', '2022-07-09', 'student', 'active');
insert into user (school_id, first_name, last_name, username, password, phone, email, birth_date, role, status) values (3, 'Ju', 'Haselup', 'dhaselupp', '6QS3tQuHOhMr', '114-961-5997', 'dhaselupp@paginegialle.it', '2020-08-26', 'student', 'active');
insert into user (school_id, first_name, last_name, username, password, phone, email, birth_date, role, status) values (3, 'Adrianne', 'Fardon', 'mfardonq', 'kTZsY3', '684-698-4163', 'jfardonq@nydailynews.com', '2021-09-07', 'student', 'active');
insert into user (school_id, first_name, last_name, username, password, phone, email, birth_date, role, status) values (3, 'Helen', 'Toffel', 'ttoffelr', 'v2uWRsx', '998-861-9280', 'rtoffelr@merriam-webster.com', '2022-04-19', 'student', 'active');
insert into user (school_id, first_name, last_name, username, password, phone, email, birth_date, role, status) values (3, 'Amelie', 'Wandrack', 'fwandracks', 'jGhS9xD', '270-890-8980', 'fwandracks@indiatimes.com', '2021-05-05', 'student', 'active');
insert into user (school_id, first_name, last_name, username, password, phone, email, birth_date, role, status) values (3, 'Zhì', 'Pawelczyk', 'hpawelczykt', 'amvdvteOsp', '786-272-0184', 'tpawelczykt@goodreads.com', '2022-10-08', 'student', 'active');
insert into user (school_id, first_name, last_name, username, password, phone, email, birth_date, role, status) values (4, 'Meng', 'Southerill', 'ksoutherillu', '163oUN7', '936-861-4045', 'asoutherillu@google.pl', '2022-08-13', 'student', 'active');
insert into user (school_id, first_name, last_name, username, password, phone, email, birth_date, role, status) values (4, 'Melanie', 'Ilive', 'kilivev', 'LyNzJdW6xm', '360-919-4274', 'silivev@alibaba.com', '2021-06-18', 'student', 'active');
insert into user (school_id, first_name, last_name, username, password, phone, email, birth_date, role, status) values (4, 'Ron', 'Bramham', 'jbramhamw', 'kU0YOmdEc', '634-896-3159', 'tbramhamw@pinterest.com', '2020-06-27', 'student', 'active');
insert into user (school_id, first_name, last_name, username, password, phone, email, birth_date, role, status) values (4, 'Amalia', 'Staveley', 'sstaveleyx', 'YsRctkzSj', '287-920-8420', 'gstaveleyx@yelp.com', '2021-11-10', 'student', 'active');
insert into user (school_id, first_name, last_name, username, password, phone, email, birth_date, role, status) values (4, 'Judi', 'Huddles', 'khuddlesy', 'oU57XUY', '910-422-2352', 'hhuddlesy@loc.gov', '2022-11-25', 'student', 'active');
insert into user (school_id, first_name, last_name, username, password, phone, email, birth_date, role, status) values (4, 'Leane', 'Eagleton', 'geagletonz', 'VYoTYkV0', '611-362-6071', 'heagletonz@cyberchimps.com', '2021-12-06', 'student', 'active');
insert into user (school_id, first_name, last_name, username, password, phone, email, birth_date, role, status) values (4, 'Leon', 'Cubbin', 'dcubbin10', 'PeTKciCY', '366-418-6869', 'lcubbin10@nyu.edu', '2021-04-30', 'student', 'active');
insert into user (school_id, first_name, last_name, username, password, phone, email, birth_date, role, status) values (4, 'Eugenie', 'Buttery', 'mbuttery11', 'WeKT3LQl8D', '469-775-0708', 'cbuttery11@wiley.com', '2020-09-10', 'student', 'active');
insert into user (school_id, first_name, last_name, username, password, phone, email, birth_date, role, status) values (4, 'Helen', 'Lescop', 'elescop12', 'WBQOzidd89nL', '228-868-5991', 'mlescop12@goo.ne.jp', '2022-10-05', 'student', 'active');
insert into user (school_id, first_name, last_name, username, password, phone, email, birth_date, role, status) values (4, 'Anne', 'McGibbon', 'cmcgibbon13', 'hEryUhBney', '631-851-6140', 'pmcgibbon13@nhs.uk', '2022-07-21', 'student', 'active');
insert into user (school_id, first_name, last_name, username, password, phone, email, birth_date, role, status) values (1, 'Clementine', 'Piggford', 'epiggford0', 'XLN81Iq19FZu', '892-550-4315', 'bpiggford0@php.net', '1983-12-05', 'teacher', 'active');
insert into user (school_id, first_name, last_name, username, password, phone, email, birth_date, role, status) values (1, 'Rita', 'Brockhouse', 'gbrockhouse1', 'ZqGsFf0', '499-805-8870', 'dbrockhouse1@t.co', '1983-02-22', 'teacher', 'active');
insert into user (school_id, first_name, last_name, username, password, phone, email, birth_date, role, status) values (1, 'Nick', 'Ziemecki', 'eziemecki2', 'nN1dcXW', '654-284-5864', 'hziemecki2@webs.com', '1966-02-04', 'teacher', 'active');
insert into user (school_id, first_name, last_name, username, password, phone, email, birth_date, role, status) values (1, 'Tom', 'Piercy', 'spiercy3', 'zXZEQYWf0Xy', '538-713-0434', 'rpiercy3@sfgate.com', '1972-09-01', 'teacher', 'active');
insert into user (school_id, first_name, last_name, username, password, phone, email, birth_date, role, status) values (2, 'Ines', 'Reek', 'creek4', '36FCAgKNm', '541-522-5180', 'jreek4@google.nl', '1990-11-03', 'teacher', 'active');
insert into user (school_id, first_name, last_name, username, password, phone, email, birth_date, role, status) values (2, 'Angelique', 'Core', 'tcore5', 'hLr5x6nY0dP', '491-320-6740', 'hcore5@cam.ac.uk', '1990-06-24', 'teacher', 'active');
insert into user (school_id, first_name, last_name, username, password, phone, email, birth_date, role, status) values (2, 'Tom', 'Kalinsky', 'kkalinsky6', 'TBXv8nOZuo', '585-390-1894', 'kkalinsky6@ucsd.edu', '1979-06-24', 'teacher', 'active');
insert into user (school_id, first_name, last_name, username, password, phone, email, birth_date, role, status) values (2, 'Marlene', 'Heelis', 'dheelis7', 'iGV8mMivnrjR', '829-803-8699', 'bheelis7@bigcartel.com', '1975-01-12', 'teacher', 'active');
insert into user (school_id, first_name, last_name, username, password, phone, email, birth_date, role, status) values (3, 'Melodie', 'Rouke', 'vrouke8', 'pbNMm3eNnF', '890-635-1953', 'jrouke8@surveymonkey.com', '1988-03-28', 'teacher', 'active');
insert into user (school_id, first_name, last_name, username, password, phone, email, birth_date, role, status) values (3, 'Amelie', 'Millery', 'amillery9', 'zlfidqg', '959-253-0192', 'kmillery9@sphinn.com', '1967-04-24', 'teacher', 'active');
insert into user (school_id, first_name, last_name, username, password, phone, email, birth_date, role, status) values (3, 'Ruth', 'Hymor', 'ahymora', '65XwxC13NP', '898-393-3891', 'thymora@ask.com', '1982-05-19', 'teacher', 'active');
insert into user (school_id, first_name, last_name, username, password, phone, email, birth_date, role, status) values (3, 'Cindy', 'Greave', 'mgreaveb', 'AUEtGfqA', '245-131-9783', 'agreaveb@npr.org', '1960-12-20', 'teacher', 'active');
insert into user (school_id, first_name, last_name, username, password, phone, email, birth_date, role, status) values (4, 'Jen', 'Dmiterko', 'mdmiterkoc', 'mhEW2MEW', '427-636-9218', 'kdmiterkoc@bloglines.com', '1971-06-25', 'teacher', 'active');
insert into user (school_id, first_name, last_name, username, password, phone, email, birth_date, role, status) values (4, 'Felicia', 'Medeway', 'vmedewayd', 'afsKSd8PN', '345-813-8684', 'cmedewayd@canalblog.com', '1986-01-16', 'teacher', 'active');
insert into user (school_id, first_name, last_name, username, password, phone, email, birth_date, role, status) values (4, 'Ophelia', 'Baglow', 'ibaglowe', 'qaDoPRjEIk', '996-167-4834', 'ebaglowe@github.io', '1964-09-08', 'teacher', 'active');
insert into user (school_id, first_name, last_name, username, password, phone, email, birth_date, role, status) values (4, 'Marylene', 'Parkyn', 'lparkynf', '4Fx8OP0y26V', '329-741-2127', 'nparkynf@google.it', '1966-05-09', 'teacher', 'active');
insert into user (school_id, first_name, last_name, username, password, phone, email, birth_date, role, status) values (1, 'thanos', 'retsas', 'thanret', 'pass', '329-741-2768', 'ego@google.it', '1966-05-09', 'local_admin', 'active');
insert into user (school_id, first_name, last_name, username, password, phone, email, birth_date, role, status) values (2, 'thanos2', 'retsas2', 'thanret2', 'pass', '329-741-2790', 'ego2@google.it', '1966-05-05', 'local_admin', 'active');
insert into user (school_id, first_name, last_name, username, password, phone, email, birth_date, role, status) values (3, 'thanos3', 'retsas3', 'thanret3', 'pass', '329-741-2799', 'ego3@google.it', '1966-05-09', 'local_admin', 'active');
insert into user (school_id, first_name, last_name, username, password, phone, email, birth_date, role, status) values (4, 'thanos4', 'retsas4', 'thanret4', 'pass', '329-741-2798', 'ego4@google.it', '1966-05-12', 'local_admin', 'active');

INSERT INTO author (first_name, last_name)
VALUES
    ('John', 'Smith'),
    ('Mary', 'Johnson'),
    ('Robert', 'Williams'),
    ('Jennifer', 'Brown'),
    ('Michael', 'Jones'),
    ('Linda', 'Davis'),
    ('William', 'Miller'),
    ('Karen', 'Wilson'),
    ('David', 'Moore'),
    ('Susan', 'Taylor'),
    ('James', 'Anderson'),
    ('Jessica', 'Thomas'),
    ('Joseph', 'Jackson'),
    ('Michelle', 'White'),
    ('Daniel', 'Harris'),
    ('Sarah', 'Clark'),
    ('Christopher', 'Lewis'),
    ('Ashley', 'Lee'),
    ('Matthew', 'Walker'),
    ('Emily', 'Hall'),
    ('Andrew', 'Young'),
    ('Amanda', 'Allen'),
    ('Brian', 'Green'),
    ('Stephanie', 'Baker'),
    ('Joshua', 'King'),
    ('Melissa', 'Adams'),
    ('Kevin', 'Scott'),
    ('Rebecca', 'Campbell'),
    ('Thomas', 'Nelson'),
    ('Laura', 'Mitchell'),
    ('Jason', 'Robinson'),
    ('Patricia', 'Wright'),
    ('Mark', 'Turner'),
    ('Angela', 'Parker'),
    ('Ryan', 'Collins'),
    ('Elizabeth', 'Carter'),
    ('Johnathan', 'Phillips'),
    ('Amy', 'Stewart'),
    ('Charles', 'Morris'),
    ('Stephan', 'Cook'),
    ('Heather', 'Morgan');


insert into book_author (book_id, author_id) values (7, 1);
insert into book_author (book_id, author_id) values (8, 1);
insert into book_author (book_id, author_id) values (9, 1);
insert into book_author (book_id, author_id) values (10, 1);
insert into book_author (book_id, author_id) values (11, 1);
insert into book_author (book_id, author_id) values (12, 1);
insert into book_author (book_id, author_id) values (13, 1);
insert into book_author (book_id, author_id) values (14, 1);
insert into book_author (book_id, author_id) values (15, 1);
insert into book_author (book_id, author_id) values (16, 1);
insert into book_author (book_id, author_id) values (17, 1);
insert into book_author (book_id, author_id) values (18, 1);
insert into book_author (book_id, author_id) values (46, 9);
insert into book_author (book_id, author_id) values (35, 7);
insert into book_author (book_id, author_id) values (43, 6);
insert into book_author (book_id, author_id) values (47, 6);
insert into book_author (book_id, author_id) values (45, 8);
insert into book_author (book_id, author_id) values (49, 10);
insert into book_author (book_id, author_id) values (43, 3);
insert into book_author (book_id, author_id) values (34, 10);
insert into book_author (book_id, author_id) values (35, 6);
insert into book_author (book_id, author_id) values (31, 5);
insert into book_author (book_id, author_id) values (30, 3);
insert into book_author (book_id, author_id) values (48, 4);
insert into book_author (book_id, author_id) values (38, 3);
insert into book_author (book_id, author_id) values (46, 4);
insert into book_author (book_id, author_id) values (38, 6);
insert into book_author (book_id, author_id) values (44, 7);
insert into book_author (book_id, author_id) values (31, 7);
insert into book_author (book_id, author_id) values (37, 6);
insert into book_author (book_id, author_id) values (30, 9);
insert into book_author (book_id, author_id) values (31, 5);
insert into book_author (book_id, author_id) values (23, 4);
insert into book_author (book_id, author_id) values (44, 10);
insert into book_author (book_id, author_id) values (25, 4);
insert into book_author (book_id, author_id) values (36, 2);
insert into book_author (book_id, author_id) values (22, 8);
insert into book_author (book_id, author_id) values (30, 10);
insert into book_author (book_id, author_id) values (43, 8);
insert into book_author (book_id, author_id) values (37, 5);
insert into book_author (book_id, author_id) values (47, 3);
insert into book_author (book_id, author_id) values (25, 7);
insert into book_author (book_id, author_id) values (23, 9);
insert into book_author (book_id, author_id) values (74, 16);
insert into book_author (book_id, author_id) values (58, 18);
insert into book_author (book_id, author_id) values (52, 29);
insert into book_author (book_id, author_id) values (62, 14);
insert into book_author (book_id, author_id) values (76, 31);
insert into book_author (book_id, author_id) values (88, 30);
insert into book_author (book_id, author_id) values (80, 30);
insert into book_author (book_id, author_id) values (83, 19);
insert into book_author (book_id, author_id) values (71, 16);
insert into book_author (book_id, author_id) values (86, 23);
insert into book_author (book_id, author_id) values (71, 33);
insert into book_author (book_id, author_id) values (64, 27);
insert into book_author (book_id, author_id) values (90, 26);
insert into book_author (book_id, author_id) values (85, 36);
insert into book_author (book_id, author_id) values (82, 22);
insert into book_author (book_id, author_id) values (83, 32);
insert into book_author (book_id, author_id) values (60, 25);
insert into book_author (book_id, author_id) values (75, 28);
insert into book_author (book_id, author_id) values (56, 30);
insert into book_author (book_id, author_id) values (56, 37);
insert into book_author (book_id, author_id) values (56, 26);
insert into book_author (book_id, author_id) values (55, 26);
insert into book_author (book_id, author_id) values (78, 25);
insert into book_author (book_id, author_id) values (82, 19);
insert into book_author (book_id, author_id) values (88, 12);
insert into book_author (book_id, author_id) values (83, 16);
insert into book_author (book_id, author_id) values (85, 37);
insert into book_author (book_id, author_id) values (82, 36);
insert into book_author (book_id, author_id) values (77, 38);
insert into book_author (book_id, author_id) values (75, 26);
insert into book_author (book_id, author_id) values (54, 21);
insert into book_author (book_id, author_id) values (66, 14);
insert into book_author (book_id, author_id) values (88, 17);
insert into book_author (book_id, author_id) values (69, 39);
insert into book_author (book_id, author_id) values (69, 29);
insert into book_author (book_id, author_id) values (90, 29);
insert into book_author (book_id, author_id) values (80, 17);
insert into book_author (book_id, author_id) values (74, 17);
insert into book_author (book_id, author_id) values (90, 16);
insert into book_author (book_id, author_id) values (59, 22);
insert into book_author (book_id, author_id) values (104, 5);
insert into book_author (book_id, author_id) values (95, 31);
insert into book_author (book_id, author_id) values (91, 39);
insert into book_author (book_id, author_id) values (93, 26);
insert into book_author (book_id, author_id) values (104, 7);
insert into book_author (book_id, author_id) values (108, 27);
insert into book_author (book_id, author_id) values (107, 11);
insert into book_author (book_id, author_id) values (96, 26);
insert into book_author (book_id, author_id) values (97, 22);
insert into book_author (book_id, author_id) values (95, 18);
insert into book_author (book_id, author_id) values (106, 40);
insert into book_author (book_id, author_id) values (94, 20);
insert into book_author (book_id, author_id) values (107, 23);
insert into book_author (book_id, author_id) values (93, 29);
insert into book_author (book_id, author_id) values (91, 14);
insert into book_author (book_id, author_id) values (97, 18);
insert into book_author (book_id, author_id) values (102, 37);
insert into book_author (book_id, author_id) values (108, 30);
insert into book_author (book_id, author_id) values (92, 22);
insert into book_author (book_id, author_id) values (110, 5);
insert into book_author (book_id, author_id) values (104, 21);
insert into book_author (book_id, author_id) values (111, 29);
insert into book_author (book_id, author_id) values (95, 28);
insert into book_author (book_id, author_id) values (103, 26);
insert into book_author (book_id, author_id) values (99, 10);
insert into book_author (book_id, author_id) values (103, 18);
insert into book_author (book_id, author_id) values (100, 17);
insert into book_author (book_id, author_id) values (102, 19);
insert into book_author (book_id, author_id) values (105, 26);
insert into book_author (book_id, author_id) values (96, 38);



insert into book_category (book_id, category_id) values (37, 6);
insert into book_category (book_id, category_id) values (13, 4);
insert into book_category (book_id, category_id) values (110, 4);
insert into book_category (book_id, category_id) values (90, 6);
insert into book_category (book_id, category_id) values (13, 2);
insert into book_category (book_id, category_id) values (109, 4);
insert into book_category (book_id, category_id) values (9, 3);
insert into book_category (book_id, category_id) values (35, 6);
insert into book_category (book_id, category_id) values (80, 2);
insert into book_category (book_id, category_id) values (50, 1);
insert into book_category (book_id, category_id) values (61, 5);
insert into book_category (book_id, category_id) values (102, 3);
insert into book_category (book_id, category_id) values (8, 2);
insert into book_category (book_id, category_id) values (47, 3);
insert into book_category (book_id, category_id) values (92, 2);
insert into book_category (book_id, category_id) values (69, 1);
insert into book_category (book_id, category_id) values (62, 6);
insert into book_category (book_id, category_id) values (32, 1);
insert into book_category (book_id, category_id) values (90, 3);
insert into book_category (book_id, category_id) values (21, 4);
insert into book_category (book_id, category_id) values (18, 4);
insert into book_category (book_id, category_id) values (33, 1);
insert into book_category (book_id, category_id) values (96, 3);
insert into book_category (book_id, category_id) values (76, 5);
insert into book_category (book_id, category_id) values (91, 3);
insert into book_category (book_id, category_id) values (64, 3);
insert into book_category (book_id, category_id) values (52, 5);
insert into book_category (book_id, category_id) values (91, 3);
insert into book_category (book_id, category_id) values (108, 1);
insert into book_category (book_id, category_id) values (96, 2);
insert into book_category (book_id, category_id) values (7, 3);
insert into book_category (book_id, category_id) values (18, 6);
insert into book_category (book_id, category_id) values (7, 4);
insert into book_category (book_id, category_id) values (41, 1);
insert into book_category (book_id, category_id) values (62, 3);
insert into book_category (book_id, category_id) values (67, 6);
insert into book_category (book_id, category_id) values (36, 4);
insert into book_category (book_id, category_id) values (61, 1);
insert into book_category (book_id, category_id) values (13, 3);
insert into book_category (book_id, category_id) values (18, 1);
insert into book_category (book_id, category_id) values (83, 5);
insert into book_category (book_id, category_id) values (69, 2);
insert into book_category (book_id, category_id) values (23, 4);
insert into book_category (book_id, category_id) values (9, 3);
insert into book_category (book_id, category_id) values (42, 4);
insert into book_category (book_id, category_id) values (55, 4);
insert into book_category (book_id, category_id) values (89, 1);
insert into book_category (book_id, category_id) values (63, 1);
insert into book_category (book_id, category_id) values (65, 5);
insert into book_category (book_id, category_id) values (45, 3);
insert into book_category (book_id, category_id) values (62, 2);
insert into book_category (book_id, category_id) values (19, 6);
insert into book_category (book_id, category_id) values (61, 6);
insert into book_category (book_id, category_id) values (58, 3);
insert into book_category (book_id, category_id) values (36, 5);
insert into book_category (book_id, category_id) values (14, 6);
insert into book_category (book_id, category_id) values (74, 5);
insert into book_category (book_id, category_id) values (76, 5);
insert into book_category (book_id, category_id) values (78, 1);
insert into book_category (book_id, category_id) values (70, 1);
insert into book_category (book_id, category_id) values (64, 2);
insert into book_category (book_id, category_id) values (81, 3);
insert into book_category (book_id, category_id) values (65, 1);
insert into book_category (book_id, category_id) values (11, 3);
insert into book_category (book_id, category_id) values (107, 6);
insert into book_category (book_id, category_id) values (31, 1);
insert into book_category (book_id, category_id) values (75, 5);
insert into book_category (book_id, category_id) values (89, 4);
insert into book_category (book_id, category_id) values (27, 1);
insert into book_category (book_id, category_id) values (60, 5);
insert into book_category (book_id, category_id) values (72, 4);
insert into book_category (book_id, category_id) values (41, 6);
insert into book_category (book_id, category_id) values (92, 2);
insert into book_category (book_id, category_id) values (63, 4);
insert into book_category (book_id, category_id) values (92, 1);
insert into book_category (book_id, category_id) values (75, 2);
insert into book_category (book_id, category_id) values (67, 3);
insert into book_category (book_id, category_id) values (97, 4);
insert into book_category (book_id, category_id) values (21, 1);
insert into book_category (book_id, category_id) values (101, 4);
insert into book_category (book_id, category_id) values (81, 5);
insert into book_category (book_id, category_id) values (11, 1);
insert into book_category (book_id, category_id) values (25, 1);
insert into book_category (book_id, category_id) values (43, 4);
insert into book_category (book_id, category_id) values (104, 5);
insert into book_category (book_id, category_id) values (38, 5);
insert into book_category (book_id, category_id) values (53, 6);
insert into book_category (book_id, category_id) values (63, 6);
insert into book_category (book_id, category_id) values (59, 3);
insert into book_category (book_id, category_id) values (71, 5);
insert into book_category (book_id, category_id) values (39, 3);
insert into book_category (book_id, category_id) values (66, 3);
insert into book_category (book_id, category_id) values (15, 3);
insert into book_category (book_id, category_id) values (100, 2);
insert into book_category (book_id, category_id) values (43, 5);
insert into book_category (book_id, category_id) values (66, 6);
insert into book_category (book_id, category_id) values (7, 5);
insert into book_category (book_id, category_id) values (39, 5);
insert into book_category (book_id, category_id) values (9, 6);
insert into book_category (book_id, category_id) values (84, 2);
insert into book_category (book_id, category_id) values (10, 1);
insert into book_category (book_id, category_id) values (100, 3);
insert into book_category (book_id, category_id) values (75, 6);
insert into book_category (book_id, category_id) values (25, 5);
insert into book_category (book_id, category_id) values (30, 3);
insert into book_category (book_id, category_id) values (67, 4);
insert into book_category (book_id, category_id) values (93, 3);
insert into book_category (book_id, category_id) values (45, 6);
insert into book_category (book_id, category_id) values (110, 6);
insert into book_category (book_id, category_id) values (103, 3);
insert into book_category (book_id, category_id) values (73, 5);
insert into book_category (book_id, category_id) values (83, 4);
insert into book_category (book_id, category_id) values (27, 3);
insert into book_category (book_id, category_id) values (108, 1);
insert into book_category (book_id, category_id) values (34, 1);
insert into book_category (book_id, category_id) values (63, 5);
insert into book_category (book_id, category_id) values (70, 6);
insert into book_category (book_id, category_id) values (52, 5);
insert into book_category (book_id, category_id) values (17, 1);
insert into book_category (book_id, category_id) values (51, 3);
insert into book_category (book_id, category_id) values (48, 5);
insert into book_category (book_id, category_id) values (20, 2);
insert into book_category (book_id, category_id) values (34, 5);
insert into book_category (book_id, category_id) values (33, 3);
insert into book_category (book_id, category_id) values (24, 1);
insert into book_category (book_id, category_id) values (23, 4);
insert into book_category (book_id, category_id) values (98, 2);
insert into book_category (book_id, category_id) values (12, 1);
insert into book_category (book_id, category_id) values (76, 2);
insert into book_category (book_id, category_id) values (73, 6);
insert into book_category (book_id, category_id) values (70, 3);
insert into book_category (book_id, category_id) values (82, 4);
insert into book_category (book_id, category_id) values (16, 1);
insert into book_category (book_id, category_id) values (61, 4);
insert into book_category (book_id, category_id) values (96, 4);

insert into book_school (book_id, school_id, copies, copies_available) values (1, 1, 1, 1);
insert into book_school (book_id, school_id, copies, copies_available) values (2, 1, 2, 2);
insert into book_school (book_id, school_id, copies, copies_available) values (3, 1, 3, 3);
insert into book_school (book_id, school_id, copies, copies_available) values (4, 1, 1, 1);
insert into book_school (book_id, school_id, copies, copies_available) values (5, 1, 2, 2);
insert into book_school (book_id, school_id, copies, copies_available) values (6, 1, 3, 3);
insert into book_school (book_id, school_id, copies, copies_available) values (7, 1, 1, 1);
insert into book_school (book_id, school_id, copies, copies_available) values (8, 1, 2, 2);
insert into book_school (book_id, school_id, copies, copies_available) values (9, 1, 3, 3);
insert into book_school (book_id, school_id, copies, copies_available) values (10, 1, 1, 1);
insert into book_school (book_id, school_id, copies, copies_available) values (11, 1, 2, 2);
insert into book_school (book_id, school_id, copies, copies_available) values (12, 1, 3, 3);
insert into book_school (book_id, school_id, copies, copies_available) values (13, 1, 1, 1);
insert into book_school (book_id, school_id, copies, copies_available) values (14, 1, 2, 2);
insert into book_school (book_id, school_id, copies, copies_available) values (15, 1, 3, 3);
insert into book_school (book_id, school_id, copies, copies_available) values (16, 1, 1, 1);
insert into book_school (book_id, school_id, copies, copies_available) values (17, 1, 2, 2);
insert into book_school (book_id, school_id, copies, copies_available) values (18, 1, 3, 3);
insert into book_school (book_id, school_id, copies, copies_available) values (19, 1, 1, 1);
insert into book_school (book_id, school_id, copies, copies_available) values (20, 1, 2, 2);
insert into book_school (book_id, school_id, copies, copies_available) values (21, 1, 3, 3);
insert into book_school (book_id, school_id, copies, copies_available) values (22, 1, 1, 1);
insert into book_school (book_id, school_id, copies, copies_available) values (23, 1, 2, 2);
insert into book_school (book_id, school_id, copies, copies_available) values (24, 1, 3, 3);
insert into book_school (book_id, school_id, copies, copies_available) values (25, 1, 1, 1);
insert into book_school (book_id, school_id, copies, copies_available) values (26, 1, 2, 2);
insert into book_school (book_id, school_id, copies, copies_available) values (27, 1, 3, 3);
insert into book_school (book_id, school_id, copies, copies_available) values (28, 1, 1, 1);
insert into book_school (book_id, school_id, copies, copies_available) values (29, 1, 2, 2);
insert into book_school (book_id, school_id, copies, copies_available) values (30, 1, 3, 3);
insert into book_school (book_id, school_id, copies, copies_available) values (29, 2, 1, 1);
insert into book_school (book_id, school_id, copies, copies_available) values (30, 2, 2, 2);
insert into book_school (book_id, school_id, copies, copies_available) values (31, 2, 3, 3);
insert into book_school (book_id, school_id, copies, copies_available) values (32, 2, 1, 1);
insert into book_school (book_id, school_id, copies, copies_available) values (33, 2, 2, 2);
insert into book_school (book_id, school_id, copies, copies_available) values (34, 2, 3, 3);
insert into book_school (book_id, school_id, copies, copies_available) values (35, 2, 1, 1);
insert into book_school (book_id, school_id, copies, copies_available) values (36, 2, 2, 2);
insert into book_school (book_id, school_id, copies, copies_available) values (37, 2, 3, 3);
insert into book_school (book_id, school_id, copies, copies_available) values (38, 2, 1, 1);
insert into book_school (book_id, school_id, copies, copies_available) values (39, 2, 2, 2);
insert into book_school (book_id, school_id, copies, copies_available) values (40, 2, 3, 3);
insert into book_school (book_id, school_id, copies, copies_available) values (41, 2, 1, 1);
insert into book_school (book_id, school_id, copies, copies_available) values (42, 2, 2, 2);
insert into book_school (book_id, school_id, copies, copies_available) values (43, 2, 3, 3);
insert into book_school (book_id, school_id, copies, copies_available) values (44, 2, 1, 1);
insert into book_school (book_id, school_id, copies, copies_available) values (45, 2, 2, 2);
insert into book_school (book_id, school_id, copies, copies_available) values (46, 2, 3, 3);
insert into book_school (book_id, school_id, copies, copies_available) values (47, 2, 1, 1);
insert into book_school (book_id, school_id, copies, copies_available) values (48, 2, 2, 2);
insert into book_school (book_id, school_id, copies, copies_available) values (49, 2, 3, 3);
insert into book_school (book_id, school_id, copies, copies_available) values (50, 2, 1, 1);
insert into book_school (book_id, school_id, copies, copies_available) values (51, 2, 2, 2);
insert into book_school (book_id, school_id, copies, copies_available) values (52, 2, 3, 3);
insert into book_school (book_id, school_id, copies, copies_available) values (53, 2, 1, 1);
insert into book_school (book_id, school_id, copies, copies_available) values (54, 2, 2, 2);
insert into book_school (book_id, school_id, copies, copies_available) values (55, 2, 3, 3);
insert into book_school (book_id, school_id, copies, copies_available) values (56, 2, 1, 1);
insert into book_school (book_id, school_id, copies, copies_available) values (57, 2, 2, 2);
insert into book_school (book_id, school_id, copies, copies_available) values (58, 2, 3, 3);
insert into book_school (book_id, school_id, copies, copies_available) values (59, 2, 1, 1);
insert into book_school (book_id, school_id, copies, copies_available) values (60, 2, 2, 2);
insert into book_school (book_id, school_id, copies, copies_available) values (61, 2, 3, 3);
insert into book_school (book_id, school_id, copies, copies_available) values (62, 2, 1, 1);
insert into book_school (book_id, school_id, copies, copies_available) values (63, 2, 2, 2);
insert into book_school (book_id, school_id, copies, copies_available) values (64, 2, 3, 3);
insert into book_school (book_id, school_id, copies, copies_available) values (65, 2, 1, 1);
insert into book_school (book_id, school_id, copies, copies_available) values (66, 2, 2, 2);
insert into book_school (book_id, school_id, copies, copies_available) values (67, 2, 3, 3);
insert into book_school (book_id, school_id, copies, copies_available) values (68, 2, 1, 1);
insert into book_school (book_id, school_id, copies, copies_available) values (69, 2, 2, 2);
insert into book_school (book_id, school_id, copies, copies_available) values (70, 2, 3, 3);
insert into book_school (book_id, school_id, copies, copies_available) values (69, 3, 1, 1);
insert into book_school (book_id, school_id, copies, copies_available) values (70, 3, 2, 2);
insert into book_school (book_id, school_id, copies, copies_available) values (71, 3, 3, 3);
insert into book_school (book_id, school_id, copies, copies_available) values (72, 3, 1, 1);
insert into book_school (book_id, school_id, copies, copies_available) values (73, 3, 2, 2);
insert into book_school (book_id, school_id, copies, copies_available) values (74, 3, 3, 3);
insert into book_school (book_id, school_id, copies, copies_available) values (75, 3, 1, 1);
insert into book_school (book_id, school_id, copies, copies_available) values (76, 3, 2, 2);
insert into book_school (book_id, school_id, copies, copies_available) values (77, 3, 3, 3);
insert into book_school (book_id, school_id, copies, copies_available) values (78, 3, 1, 1);
insert into book_school (book_id, school_id, copies, copies_available) values (79, 3, 2, 2);
insert into book_school (book_id, school_id, copies, copies_available) values (80, 3, 3, 3);
insert into book_school (book_id, school_id, copies, copies_available) values (81, 3, 1, 1);
insert into book_school (book_id, school_id, copies, copies_available) values (82, 3, 2, 2);
insert into book_school (book_id, school_id, copies, copies_available) values (83, 3, 3, 3);
insert into book_school (book_id, school_id, copies, copies_available) values (84, 3, 1, 1);
insert into book_school (book_id, school_id, copies, copies_available) values (85, 3, 2, 2);
insert into book_school (book_id, school_id, copies, copies_available) values (86, 3, 3, 3);
insert into book_school (book_id, school_id, copies, copies_available) values (87, 3, 1, 1);
insert into book_school (book_id, school_id, copies, copies_available) values (88, 3, 2, 2);
insert into book_school (book_id, school_id, copies, copies_available) values (89, 3, 3, 3);
insert into book_school (book_id, school_id, copies, copies_available) values (90, 3, 1, 1);
insert into book_school (book_id, school_id, copies, copies_available) values (91, 3, 2, 2);
insert into book_school (book_id, school_id, copies, copies_available) values (92, 3, 3, 3);
insert into book_school (book_id, school_id, copies, copies_available) values (93, 3, 1, 1);
insert into book_school (book_id, school_id, copies, copies_available) values (94, 3, 2, 2);
insert into book_school (book_id, school_id, copies, copies_available) values (95, 3, 3, 3);
insert into book_school (book_id, school_id, copies, copies_available) values (96, 3, 1, 1);
insert into book_school (book_id, school_id, copies, copies_available) values (97, 3, 2, 2);
insert into book_school (book_id, school_id, copies, copies_available) values (98, 3, 3, 3);
insert into book_school (book_id, school_id, copies, copies_available) values (99, 3, 1, 1);
insert into book_school (book_id, school_id, copies, copies_available) values (100, 3, 2, 2);
insert into book_school (book_id, school_id, copies, copies_available) values (95, 4, 1, 1);
insert into book_school (book_id, school_id, copies, copies_available) values (96, 4, 2, 2);
insert into book_school (book_id, school_id, copies, copies_available) values (97, 4, 3, 3);
insert into book_school (book_id, school_id, copies, copies_available) values (98, 4, 1, 1);
insert into book_school (book_id, school_id, copies, copies_available) values (99, 4, 2, 2);
insert into book_school (book_id, school_id, copies, copies_available) values (100, 4, 3, 3);
insert into book_school (book_id, school_id, copies, copies_available) values (101, 4, 1, 1);
insert into book_school (book_id, school_id, copies, copies_available) values (102, 4, 2, 2);
insert into book_school (book_id, school_id, copies, copies_available) values (103, 4, 3, 3);
insert into book_school (book_id, school_id, copies, copies_available) values (104, 4, 1, 1);
insert into book_school (book_id, school_id, copies, copies_available) values (105, 4, 2, 2);



insert into reservation(book_school_id, user_id, reserve_date, status)
values
    (105, 31, '2023-5-29', 'active'),
    (106, 32, '2023-5-30', 'active'),
    (107, 33, '2023-5-31', 'active'),
    (108, 34, '2023-6-01', 'active'),
    (109, 35, '2023-6-02', 'active'),
    (110, 36, '2023-6-03', 'active'),
    (111, 53, '2023-6-04', 'active'),
    (112, 54, '2023-5-29', 'active'),
    (111, 55, '2023-5-30', 'active'),
    (110, 56, '2023-5-31', 'active'),
    (77, 23, '2023-5-29', 'active'),
    (89, 27, '2023-5-30', 'active'),
    (73, 25, '2023-5-31', 'active'),
    (102, 21, '2023-6-01', 'active'),
    (77, 49, '2023-6-02', 'active'),
    (81, 52, '2023-6-03', 'active'),
    (77, 26, '2023-6-04', 'active'),
    (102, 50, '2023-5-29', 'active'),
    (84, 29, '2023-5-30', 'active'),
    (104, 51, '2023-5-31', 'active'),
    (70, 19, '2023-6-04', 'active'),
    (35, 12, '2032-5-29', 'active'),
    (44, 45, '2023-6-03', 'active'),
    (71, 15, '2023-5-30', 'active'),
    (44, 47, '2023-6-02', 'active'),
    (63, 16, '2023-5-31', 'active'),
    (67, 12, '2023-6-01', 'active'),
    (36, 19, '2023-5-29', 'active'),
    (70, 20, '2023-6-04', 'active'),
    (63, 45, '2023-6-02', 'active'),
    (7, 9, '2023-6-03', 'active'),
    (30, 2, '2023-5-30', 'active'),
    (7, 5, '2023-5-29', 'active'),
    (11, 5, '2023-6-02', 'active'),
    (23, 42, '2023-5-29', 'active'),
    (30, 3, '2023-6-04', 'active'),
    (5, 42, '2023-6-01', 'active'),
    (3, 44, '2023-6-03', 'active'),
    (17, 8, '2023-6-04', 'active'),
    (7, 41, '2023-6-01', 'active');




insert into loan (book_school_id, user_id, local_admin_id, loan_date, due_date, return_date)
values
    (1, 1, 57, '2022-11-20', '2022-11-27', '2022-11-25'),
    (2, 1, 57, '2023-04-12', '2023-04-19', '2023-04-19'),
    (5, 3, 57, '2022-12-15', '2022-12-22', '2022-12-17'),
    (12, 6, 57, '2023-06-03', '2023-06-10', null),
    (15, 7, 57, '2023-05-10', '2023-05-17', '2023-05-15'),
    (15, 8, 57, '2023-05-16', '2023-05-23', '2023-05-20'),
    (20, 9, 57, '2022-11-15', '2022-11-22', '2022-11-20'),
    (22, 9, 57, '2022-11-15', '2022-11-22', '2022-11-22'),
    (24, 9, 57, '2023-02-10', '2023-02-17', '2023-02-16'),
    (4, 9, 57, '2023-03-20', '2023-03-27', '2023-03-29'),
    (6, 9, 57, '2023-04-14', '2023-04-21', '2023-04-23'),
    (5, 10, 57, '2023-03-12', '2023-03-19', '2023-03-25'),
    (25, 10, 57, '2023-04-04', '2023-04-11', '2023-04-11'),
    (28, 10, 57, '2023-05-25', '2023-06-01', null),
    (29, 42, 57, '2023-06-01', '2023-06-08', null),  
    (31, 11, 58, '2022-09-20', '2022-09-27', '2022-09-25'),
    (35, 11, 58, '2023-04-11', '2023-04-18', '2023-04-18'),
    (37, 11, 58, '2022-12-15', '2022-12-22', '2022-12-18'),
    (35, 13, 58, '2023-06-02', '2023-06-09', null),
    (35, 15, 58, '2023-04-08', '2023-04-15', '2023-04-16'),
    (49, 15, 58, '2023-05-16', '2023-05-23', '2023-05-20'),
    (50, 17, 58, '2022-10-15', '2022-10-22', '2022-10-20'),
    (52, 18, 58, '2022-11-15', '2022-11-22', '2022-11-18'),
    (56, 18, 58, '2023-05-22', '2023-05-29', null),
    (57, 19, 58, '2023-05-26', '2023-06-02', null),
    (32, 20, 58, '2023-04-14', '2023-04-21', '2023-04-23'),
    (50, 20, 58, '2023-04-12', '2023-04-19', '2023-04-25'),
    (58, 20, 58, '2023-05-10', '2023-05-17', '2023-05-12'),
    (58, 20, 58, '2023-05-25', '2023-06-01', null),
    (60, 45, 58, '2023-04-14', '2023-04-21', '2023-04-23'),
    (31, 45, 58, '2023-03-12', '2023-03-19', '2023-03-22'),
    (70, 47, 58, '2023-02-04', '2023-02-11', '2023-02-11'),
    (44, 48, 58, '2023-05-25', '2023-06-01', null),	
    (76, 21, 59, '2022-09-21', '2022-09-28', '2022-09-25'),
    (76, 22, 59, '2023-04-11', '2023-04-18', '2023-04-18'),
    (78, 22, 59, '2022-11-15', '2022-11-22', '2022-11-19'),
    (80, 22, 59, '2023-06-02', '2023-06-09', null),
    (80, 23, 59, '2023-06-01', '2023-06-08', null),
    (81, 24, 59, '2023-05-16', '2023-05-23', null),
    (85, 24, 59, '2023-05-31', '2022-06-07', null),
    (87, 25, 59, '2022-11-15', '2022-11-22', '2022-11-18'),
    (88, 26, 59, '2023-05-23', '2023-05-30', null),
    (90, 27, 59, '2023-05-28', '2023-06-04', null),
    (93, 27, 59, '2023-05-14', '2023-05-21', null),
    (95, 49, 59, '2023-06-03', '2023-06-19', null),
    (96, 50, 59, '2023-06-03', '2023-06-10', null),
    (98, 51, 59, '2023-05-25', '2023-06-01', null),  
    (100, 52, 59, '2023-04-14', '2023-04-21', '2023-04-23'),
    (96, 31, 60, '2022-12-21', '2022-12-28', '2022-12-27'),
    (98, 33, 60, '2023-04-12', '2023-04-19', '2023-04-18'),
    (100, 35, 60, '2022-11-16', '2022-11-23', '2022-11-23'),
    (100, 37, 60, '2023-06-02', '2023-06-09', null),
    (102, 39, 60, '2023-06-01', '2023-06-08', null),
    (104, 54, 60, '2023-05-16', '2023-05-23', '2023-05-23'),
    (105, 55, 60, '2023-06-01', '2022-06-08', null),
    (110, 55, 60, '2022-11-03', '2022-11-10', '2022-11-09');
Footer
© 2023 GitHub, Inc.
Footer navigation

    Terms
    Privacy
    Security
    Status
    Docs
    Contact GitHub
    Pricing
    API
    Training
    Blog
    About

LibraryDatabase/insert_into_library_db.sql at master · thanosretsas/LibraryDatabase · GitHub
