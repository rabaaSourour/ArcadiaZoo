-- Insertion des utilisateurs
INSERT INTO users (email, password, role) VALUES ('jose.zooarcadia@gmail.com','Jose/1960&','admin');
INSERT INTO users (email, password, role) VALUES ('vetetinaire.zooarcadia@hotmail.com','Vete/zoo&','veterinaire');
INSERT INTO users (email, password, role) VALUES ('employe.zooarcadia@hotmail.com','Empl/zoo&','employee');

-- Insertion des habitats
INSERT INTO habitats (name, description, image) VALUES ('Jungle', 'A dense forest with high humidity and lots of vegetation.', 'Jungle.png');
INSERT INTO habitats (name, description, image) VALUES ('Savana', 'A large open space with grass and a few trees.', 'savan.png');
INSERT INTO habitats (name, description, image) VALUES ('Marais', 'A dense forest with high humidity and lots of vegetation.', 'Marais.png');

-- Insertion des animaux
INSERT INTO animals (name, species, image, habitat_id) VALUES ('Lion', 'Panthera leo', 'lion.jpg', 1);
INSERT INTO animals (name, species, image, habitat_id) VALUES ('Tiger', 'Panthera tigris', 'tiger.jpg', 2);

-- Insertion des services
INSERT INTO services (name, description, image_path, category) VALUES
('Le Jardin des Épices', 'Le Jardin des Épices est un havre de paix et de saveurs au cœur de la ville. Le décor luxuriant et les parfums d\'épices transportent immédiatement les convives en Inde. Le menu propose une variété de plats traditionnels riches en épices et en saveurs, allant du poulet Tikka Masala aux biryanis parfumés. Chaque plat est soigneusement préparé pour offrir une expérience culinaire authentique et mémorable.', '/public/asset/images/spices.png', 'Cuisine indienne'),
('Jardin de Sakura', 'Sakura Garden offre une véritable évasion dans le raffinement et la sérénité du Japon. Le décor épuré et élégant invite à la détente, tandis que le menu propose une variété de sushis, sashimis et autres spécialités japonaises préparées avec soin par des chefs expérimentés. Le restaurant met un point d\'honneur à utiliser des ingrédients de première qualité pour une expérience culinaire inoubliable.', '/public/asset/images/sushi.png', 'Cuisine Japonaise'),
('Le Jardin Gourmand', 'Le Jardin Gourmand est un havre de paix pour les amateurs de cuisine végétarienne. Ce restaurant élégant et accueillant offre une expérience culinaire raffinée, mettant en valeur les saveurs naturelles des légumes frais et des produits de saison. Le menu est une célébration de la diversité végétale, proposant des plats créatifs et savoureux qui raviront les papilles les plus exigeantes avec des ingrédients biologiques et locaux pour créer des plats innovants. Le décor du restaurant, inspiré par la nature, avec des plantes verdoyantes et une ambiance lumineuse et aérée.', '/public/asset/images/vegetarien.png', 'Cuisine végétarienne'),
('Savanaa Snacks', 'Savanna Snacks est un restaurant de fast food unique en son genre. Inspiré par les vastes plaines africaines, ce restaurant offre une expérience culinaire rapide tout en respectant des pratiques durables et respectueuses de l\'environnement. Les visiteurs peuvent déguster des repas préparés avec des ingrédients locaux et biologiques. Le menu propose une variété de plats savoureux et faits maison. Savanna Snacks s\'engage à minimiser son empreinte écologique en utilisant des emballages compostables et en promouvant le recyclage.', '/public/asset/images/burguer.png', 'Fast food');
INSERT INTO services (title, description, category, image_path) VALUES
('Visite des habitats', 'Découvrez les secrets de la faune avec notre guide expert ! Plongez au cœur de la vie sauvage et laissez-vous guider à travers les habitats exotiques de notre zoo. Notre équipe de guides passionnés vous invite à une aventure inoubliable, où chaque pas vous rapproche de la majesté de la nature.', 'visite', '/public/asset/images/guide.jpg'),
('Visite du zoo en train', 'Embarquez pour une aventure écologique inoubliable au cœur de la nature sauvage ! Notre Safari Écologique en Train vous invite à découvrir les merveilles de notre zoo d\'une manière respectueuse de l\'environnement. Laissez-vous transporter à travers des paysages spectaculaires tout en contribuant à la préservation de notre planète.', 'visite', '/public/asset/images/train.png');


-- Insertion des avis
INSERT INTO reviews (user_id, review, isValid) VALUES (1, 'Great place to visit!', TRUE);
INSERT INTO reviews (user_id, review, isValid) VALUES (2, 'The animals are well cared for.', TRUE);

-- Insertion des horaires d'ouverture
INSERT INTO openinghours (day, openingTime, closingTime) VALUES ('Lundi', '09:00:00', '18:00:00');
INSERT INTO openinghours (day, openingTime, closingTime) VALUES ('Mardi', '09:00:00', '18:00:00');
INSERT INTO openinghours (day, openingTime, closingTime) VALUES ('Mercredi', '09:00:00', '18:00:00');
INSERT INTO openinghours (day, openingTime, closingTime) VALUES ('Jeudi', '09:00:00', '18:00:00');
INSERT INTO openinghours (day, openingTime, closingTime) VALUES ('Vendredi', '09:00:00', '18:00:00');
INSERT INTO openinghours (day, oopeningTime, closingTime) VALUES ('Samedi', '09:00:00', '20:00:00');
INSERT INTO openinghours (day, openingTime, closingTime) VALUES ('Dimanche', '09:00:00', '20:00:00');
