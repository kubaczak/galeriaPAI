CREATE TABLE tag(id SERIAL PRIMARY KEY, name VARCHAR(255));
CREATE TABLE tag_photo(id_tag INT, id_photo INT, PRIMARY KEY(id_tag, id_photo));
CREATE TABLE photo(id SERIAL PRIMARY KEY, reference TEXT, likes INT, dislikes INT, views INT, title VARCHAR(255), description TEXT, location VARCHAR(255));
CREATE TABLE comment(id SERIAL PRIMARY KEY, photo_id INT, user VARCHAR(255), content TEXT, date DATETIME);
CREATE TABLE album(id SERIAL PRIMARY KEY, name VARCHAR(255));