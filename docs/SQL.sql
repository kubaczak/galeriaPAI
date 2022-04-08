CREATE TABLE album(id SERIAL PRIMARY KEY, name VARCHAR(255));
CREATE TABLE photo(
    id SERIAL PRIMARY KEY,
    album_id BIGINT UNSIGNED,
    reference TEXT,
    likes INT UNSIGNED,
    dislikes INT UNSIGNED,
    views INT UNSIGNED,
    title VARCHAR(255),
    description TEXT,
    location VARCHAR(255),
    FOREIGN KEY(album_id) REFERENCES album(id)
);
CREATE TABLE comment(
    id SERIAL PRIMARY KEY,
    photo_id BIGINT UNSIGNED,
    user VARCHAR(255),
    content TEXT,
    date DATETIME,
    FOREIGN KEY(photo_id) REFERENCES photo(id)
);
CREATE TABLE tag(id SERIAL PRIMARY KEY, name VARCHAR(255));
CREATE TABLE tag_photo(
    id_tag BIGINT UNSIGNED,
    id_photo BIGINT UNSIGNED,
    PRIMARY KEY(id_tag, id_photo),
    FOREIGN KEY(id_tag) REFERENCES tag(id),
    FOREIGN KEY(id_photo) REFERENCES photo(id)
);
