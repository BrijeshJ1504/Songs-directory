-- -------------Database creation-------------------------

create database Songs_directory;

-- -------------Artist table------------------------------

create or replace table artist(
artist_id int(20)  primary key auto_increment not null,
artist_name  text not null
);  

-- ------------Album table---------------------------------
create table album(
album_id int(20)  primary key auto_increment not null,
album_name  text not null
);

-- ------------Song table----------------------------------

create or replace table song(
id int(20)  primary key auto_increment not null,
song_name text not null,
song varchar(100) not null,
images text not null,
artist int(20) not null,
album int(20) not null,
yor int(30) not null,
duration int(30) not null,
p_left varchar(20) not null,
keywords varchar(50) not null
);

-- -------------insertion of data ------------------------------------  
-- -------------artist table------------------------------------------
insert into artist(artist_name) values
('B Praak'),
('Yasser Desai'),
('Asees Kaur'),
('Yo Yo Honey Singh'),
('Tulsi Kumar'),
('Darshan Raval'),
('Dhvani Bhanushali'),
('Jubin Nautiyal'),
('Samira Koppikar'),
('Jonita Gandhi'),
('Guru Randhawa'),
('Abhi Dutt');

-- ----------------album table -----------------------------------------

insert into album(album_name) values
('DM Desi Melodies'),
('Zee Music Company'),
('T-Series'),
('BLive Music');

-- ---------------song table--------------------------------------------
insert into song(song_name,song,images,artist,album,yor,duration,p_left,keywords) values
('baarish ki jaye','Baarish Ki Jaaye.mp3','baarish ki jaye.jpg',1,1,2021,304,'130px','baarish ki jaye,B Praak,DM Desi Melodies'),
('Dhadkanein Meri','Dhadkanein Meri.mp3','dhadkane meri.jpg',2,2,2019,272,'120px','Dhadkanein Meri,Zee Music Company,Yasser Desai'),
('Dheere Dheere Se Meri Zindagi','Dheere Dheere Se.mp3','dheere dheere.jpeg',4,3,2015,303,'75px','Dheere Dheere Se,Yo Yo Honey Singh, tseries'),
('FILHALL','FILHALL.mp3','filhaal.jpg',1,1,2019,330,'150px','filhall,DM Desi Melodies,B Praak'),
('Is Qadar','Is Qadar.mp3','Is Qadar.jpg',6,3,2021,230,'150px','is qadar,Darshan Raval,T-Series,tseries'),
('Leja Re','Leja Re.mp3','leja re.jpg',7,3,2018,260,'160px','leja re,T-Series,tseries,Dhvani Bhanushali'),
('Lut Gaye','Lut Gaye.mp3','lut gaye.jpg',8,3,2021,297,'150px','lut gaye,T-Searies,tseries,Jubin Nautiyal'),
('Main Jis Din Bhulaa Du','Main Jis Din Bhulaa Du.mp3','main jis din bhulaa du.jpg',8,3,2021,360,'100px','Main Jis Din Bhulaa Du,tseries,Jubin Nautiyal'),
('Meherma','Meherma.mp3','Meherma.jpg',10,2,2021,226,'150px','meherma,Jonita Gandhi,Zee Music Company'),
('Mehendi Wale Haath','Mehendi Wale Haath.mp3','mehndi wale hath.jpg',11,3,2021,219,'120px','mehendi wale haath,Guru Randhawa,T-Series,tseries'),
('Meri Aashiqui','Meri Aashiqui.mp3','meri aashiqui.jpg',8,3,2020,307,'140px','meri aashiqui,Jubin Nautiyal,T-Series,tseries'),
('Teri Aadat','Teri Aadat.mp3','teri aadat.jpg',12,4,2021,249,'150px','teri aadat,Abhi Dutt,BLive Music');