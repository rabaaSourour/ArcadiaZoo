-- Insertion des utilisateurs
INSERT INTO
    users (email, password, role)
VALUES
    (
        'jose.zooarcadia@gmail.com',
        '**********',
        'admin'
    );

INSERT INTO
    users (email, password, role)
VALUES
    (
        'vetetinaire.zooarcadia@hotmail.com',
        '*********',
        'veterinaire'
    );

INSERT INTO
    users (email, password, role)
VALUES
    (
        'employe.zooarcadia@hotmail.com',
        '*********',
        'employe'
    );

-- Insertion des habitats
INSERT INTO
    habitats (name, description, image)
VALUES
    (
        'Jungle',
        'La jungle, une forêt tropicale dense et luxuriante, abrite une biodiversité exceptionnelle et joue un rôle vital dans la régulation climatique et la préservation de la biodiversité. Cependant, elle est confrontée à des menaces telles que la déforestation et le changement climatique. La conservation de cet habitat crucial est essentielle pour maintenir l\'équilibre écologique de la planète.',
        '/public/asset/images/Jungle.png'
    );

INSERT INTO
    habitats (name, description, image)
VALUES
    (
        'Savane',
        'La savane est un lieu qui recrée l\'écosystème de la savane de manière durable pour abriter et exposer une diversité d\'animaux. Elle met l\'accent sur la conservation, l\'éducation et la recherche, tout en favorisant une observation respectueuse des animaux.',
        '/public/asset/images/savane.png'
    );

INSERT INTO
    habitats (name, description, image)
VALUES
    (
        'Marais',
        'Le Marais est un habitat écologique typique des zones humides, caractérisé par une grande diversité biologique. Il comprend des marécages, des étangs, des tourbières et des zones de végétation dense. Ces écosystèmes fournissent un habitat vital pour de nombreuses espèces de plantes et d\'animaux. Le Marais agit également comme un important réservoir de biodiversité et contribue à la régulation du cycle de l\'eau et à la filtration des polluants. Sa préservation est essentielle pour maintenir l\'équilibre écologique et protéger la vie sauvage.',
        '/public/asset/images/Marais.png'
    );

-- Insertion des animaux
INSERT INTO
    animals (name, breed, image, habitat_id)
VALUES
    (
        'Panthera onca',
        'Le plus grand félin des Amériques, le jaguar est un prédateur solitaire puissant. Il est reconnaissable à son pelage tacheté.',
        '/public/asset/images/jaguar.png',
        1
    ),
    (
        'Alouatta',
        'Connu pour ses cris puissants qui peuvent être entendus à plusieurs kilomètres, ces singes vivent en groupes sociaux.',
        '/public/asset/images/singe.png',
        1
    ),
    (
        'Ramphastos',
        'Reconnaissable à son grand bec coloré, le toucan est un oiseau sociable qui vit en petits groupes.',
        '/public/asset/images/toucan.png',
        1
    ),
    (
        'Bradypus',
        'Cet animal lent passe la plupart de son temps accroché aux branches des arbres, où il se nourrit et dort.',
        '/public/asset/images/paresseux.png',
        1
    ),
    (
        'Panthera leo',
        'Le roi de la savane, le lion est un grand félin social qui vit en groupes appelés hardes.',
        '/public/asset/images/lion.png',
        2
    ),
    (
        'Loxodonta',
        'Le plus grand animal terrestre, les éléphants sont connus pour leur intelligence, leur mémoire exceptionnelle et leurs structures sociales complexes.',
        '/public/asset/images/elephant.png',
        2
    ),
    (
        'Acinonyx jubatus',
        'Le mammifère terrestre le plus rapide, capable d\'atteindre des vitesses allant jusqu\'à 100 km/h en courtes rafales.',
        '/public/asset/images/guepard.png',
        2
    ),
    (
        'Equus quagga',
        'Connu pour ses rayures distinctives, chaque zèbre a un motif unique. Ils vivent en groupes et migrent sur de longues distances pour trouver de l\'eau et des pâturages.',
        '/public/asset/images/zebre.png',
        2
    ),
    (
        'Alligator mississippiensis',
        'Reptile imposant, l\'alligator est un prédateur apex des marais d\'Amérique du Nord.',
        '/public/asset/images/alligator.png',
        3
    ),
    (
        'Ardea herodias',
        'Grand oiseau échassier, le héron bleu est connu pour sa silhouette élancée et son vol majestueux.',
        '/public/asset/images/heron.png',
        3
    ),
    (
        'Apalone spinifera',
        'Une tortue d\'eau douce avec une carapace souple et un long cou, adaptée à la vie aquatique.',
        '/public/asset/images/tortue.png',
        3
    ),
    (
        'Lithobates catesbeianus',
        'Une des plus grandes grenouilles d\'Amérique du Nord, connue pour son croassement puissant.',
        '/public/asset/images/grenouille.png',
        3
    );

-- Insertion des services
INSERT INTO
    services (name, description, category, image)
VALUES
    (
        'Le Jardin des Épices',
        'Le Jardin des Épices est un havre de paix et de saveurs au cœur de la ville. Le décor luxuriant et les parfums d\'épices transportent immédiatement les convives en Inde. Le menu propose une variété de plats traditionnels riches en épices et en saveurs, allant du poulet Tikka Masala aux biryanis parfumés. Chaque plat est soigneusement préparé pour offrir une expérience culinaire authentique et mémorable.',
        'restaurant',
        '/public/asset/images/spices.png'
    ),
    (
        'Jardin de Sakura',
        'Sakura Garden offre une véritable évasion dans le raffinement et la sérénité du Japon. Le décor épuré et élégant invite à la détente, tandis que le menu propose une variété de sushis, sashimis et autres spécialités japonaises préparées avec soin par des chefs expérimentés. Le restaurant met un point d\'honneur à utiliser des ingrédients de première qualité pour une expérience culinaire inoubliable.',
        'restaurant',
        '/public/asset/images/sushi.png'
    ),
    (
        'Le Jardin Gourmand',
        'Le Jardin Gourmand est un havre de paix pour les amateurs de cuisine végétarienne. Ce restaurant élégant et accueillant offre une expérience culinaire raffinée, mettant en valeur les saveurs naturelles des légumes frais et des produits de saison. Le menu est une célébration de la diversité végétale, proposant des plats créatifs et savoureux qui raviront les papilles les plus exigeantes avec des ingrédients biologiques et locaux pour créer des plats innovants. Le décor du restaurant, inspiré par la nature, avec des plantes verdoyantes et une ambiance lumineuse et aérée.',
        'restaurant',
        '/public/asset/images/vegetarien.png'
    ),
    (
        'Savanaa Snacks',
        'Savanna Snacks est un restaurant de fast food unique en son genre. Inspiré par les vastes plaines africaines, ce restaurant offre une expérience culinaire rapide tout en respectant des pratiques durables et respectueuses de l\'environnement. Les visiteurs peuvent déguster des repas préparés avec des ingrédients locaux et biologiques. Le menu propose une variété de plats savoureux et faits maison. Savanna Snacks s\'engage à minimiser son empreinte écologique en utilisant des emballages compostables et en promouvant le recyclage.',
        'restaurant',
        '/public/asset/images/burguer.png'
    );

INSERT INTO
    services (title, description, category, image)
VALUES
    (
        'Visite des habitats',
        'Découvrez les secrets de la faune avec notre guide expert ! Plongez au cœur de la vie sauvage et laissez-vous guider à travers les habitats exotiques de notre zoo. Notre équipe de guides passionnés vous invite à une aventure inoubliable, où chaque pas vous rapproche de la majesté de la nature.',
        'visite',
        '/public/asset/images/guide.jpg'
    ),
    (
        'Visite du zoo en train',
        'Embarquez pour une aventure écologique inoubliable au cœur de la nature sauvage ! Notre Safari Écologique en Train vous invite à découvrir les merveilles de notre zoo d\'une manière respectueuse de l\'environnement. Laissez-vous transporter à travers des paysages spectaculaires tout en contribuant à la préservation de notre planète.',
        'visite',
        '/public/asset/images/train.png'
    );

-- Insertion des avis
INSERT INTO
    reviews (pseudo, review, isValid)
VALUES
    (
        'alice',
        'Super endroit pour une sortie en famille!',
        '1'
    );

INSERT INTO
    reviews (pseudo, review, isValid)
VALUES
    (
        'Bob',
        'Les animaux sont très bien soignés et le personnel.',
        '1'
    );

INSERT INTO
    reviews (pseudo, review, isValid)
VALUES
    (
        'Charline',
        'Incroyable expérience, à ne pas manquer !',
        '0'
    );

INSERT INTO
    reviews (pseudo, review, isValid)
VALUES
    (
        'Diana',
        'L’endroit est propre et bien entretenu.',
        '1'
    );

-- Insertion de raport veterinaire 
INSERT INTO
    `veterinary_reports` (
        `status`,
        `food`,
        `food_quantity`,
        `details`,
        `last_check`,
        `animals_id`,
        `users_id`
    )
VALUES
    (
        'En bonne santé générale, léger surpoids observé',
        'viande de boeuf, poisson, supplément en taurine.',
        '4kg par jour.',
        'Léger surplus de poids, recommandé d\'augmenter l\'activité physique et ajuster la ration alimentaire. Pas de blessures ou signes de maladie. Examen sanguin : Paramètres normaux, fonction rénale et hépatique en bon état.',
        '2024-06-15',
        1,
        2
    );

INSERT INTO
    `veterinary_reports` (
        `status`,
        `food`,
        `food_quantity`,
        `details`,
        `last_check`,
        `animals_id`,
        `users_id`
    )
VALUES
    (
        'En bonne santé générale, comportement alerte et actif',
        'fruits variés (bananes, pommes, oranges), légumes (carottes, poivrons), supplément en calcium',
        '500g par jour.',
        'Aucune blessure apparente, membres en bonne condition. Bien hydraté, pas de signe de stress ou d\'anxiété apparents.',
        '2024-06-15',
        2,
        2
    );

INSERT INTO
    `veterinary_reports` (
        `status`,
        `food`,
        `food_quantity`,
        `details`,
        `last_check`,
        `animals_id`,
        `users_id`
    )
VALUES
    (
        'En bonne santé générale, plumage vif et intact.',
        'fruits variés (papaye, mangue, banane), insectes (grillons, vers de farine), granulés spécialisés pour oiseaux',
        '200g par jour.',
        'Excellente condition physique générale, recommandé de maintenir la diversité alimentaire pour assurer l\'apport nutritionnel complet. Bonne musculature, pas de signes de blessures ou d\'infections.',
        '2024-06-15',
        3,
        2
    );

INSERT INTO
    `veterinary_reports` (
        `status`,
        `food`,
        `food_quantity`,
        `details`,
        `last_check`,
        `animals_id`,
        `users_id`
    )
VALUES
    (
        'En bonne santé générale, léger ralentissement de la motricité observé',
        'feuilles variées (cécropia, figuier), fruits (pomme, poire), légumes (carottes, patates douces)',
        '300g par jour.',
        'Digestif en bon état, bon appétit. Hydratation adéquate. Recommandé de surveiller régulièrement pour éviter la déshydratation et les problèmes digestifs.',
        '2024-06-15',
        4,
        2
    );

INSERT INTO
    `veterinary_reports` (
        `status`,
        `food`,
        `food_quantity`,
        `details`,
        `last_check`,
        `animals_id`,
        `users_id`
    )
VALUES
    (
        'En bonne santé générale, léger vieillissement observé.',
        'Viande de bœuf, poulet, lapin, supplément en taurine',
        '7 kg par jour.',
        'Léger vieillissement observé dans la démarche, recommandé de surveiller les articulations et la mobilité. Musculature bien développée, pas de blessures apparentes.',
        '2024-06-15',
        5,
        2
    );

INSERT INTO
    `veterinary_reports` (
        `status`,
        `food`,
        `food_quantity`,
        `details`,
        `last_check`,
        `animals_id`,
        `users_id`
    )
VALUES
    (
        'Bon. Aucune maladie grave signalée.',
        'Herbe, feuilles, écorce, fruits, et parfois des racines',
        '150 kg par jour.',
        'La peau est épaisse et résistante, sans lésions visibles. Les plis profonds sont caractéristiques mais ne montrent aucun signe d\'infection.',
        '2024-06-15',
        6,
        2
    );

INSERT INTO
    `veterinary_reports` (
        `status`,
        `food`,
        `food_quantity`,
        `details`,
        `last_check`,
        `animals_id`,
        `users_id`
    )
VALUES
    (
        'Bon. Aucune blessure majeure ou maladie détectée.',
        'Principalement viande fraîche de proies comme les gazelles, les antilopes.',
        '3 kg par jour.',
        'Pelage brillant et en bon état. Aucune anomalie détectée lors de l\'examen physique.',
        '2024-06-15',
        7,
        2
    );

INSERT INTO
    `veterinary_reports` (
        `status`,
        `food`,
        `food_quantity`,
        `details`,
        `last_check`,
        `animals_id`,
        `users_id`
    )
VALUES
    (
        'Bon. Aucune blessure grave ou maladie rapportée.',
        'Herbes, feuilles, écorce et parfois des fruits et des racines.',
        '10 kg par jour.',
        'Pelage rayé bien entretenu, dents en bon état.',
        '2024-06-15',
        8,
        2
    );

INSERT INTO
    `veterinary_reports` (
        `status`,
        `food`,
        `food_quantity`,
        `details`,
        `last_check`,
        `animals_id`,
        `users_id`
    )
VALUES
    (
        'Bon. Aucun signe d\'infection, de blessure ou de déshydratation.',
        'Poissons, oiseaux, mammifères aquatiques et parfois des petits mammifères terrestres.',
        '3 kg par jour.',
        'Peau en bon état, écailles lisses et bien conservées, bonne vitalité et activité.',
        '2024-06-15',
        9,
        2
    );

INSERT INTO
    `veterinary_reports` (
        `status`,
        `food`,
        `food_quantity`,
        `details`,
        `last_check`,
        `animals_id`,
        `users_id`
    )
VALUES
    (
        'Bon. Aucune blessure ou signe d\'infection détecté.',
        'poissons, insectes aquatiques',
        '200 g par jour.',
        'Carapace plate et souple, pas de signes de fissures ni d\'abrasions.',
        '2024-06-15',
        10,
        2
    );

INSERT INTO
    `veterinary_reports` (
        `status`,
        `food`,
        `food_quantity`,
        `details`,
        `last_check`,
        `animals_id`,
        `users_id`
    )
VALUES
    (
        'Bon. Pas de signes de blessures ou d\'infections. Plumes en bon état.',
        'Poissons, amphibiens, petits mammifères et insectes.',
        '300g par jour.',
        'Aucune blessure ni infection détectée lors de l\'examen physique. Plumes en excellent état.',
        '2024-06-15',
        11,
        2
    );

INSERT INTO
    `veterinary_reports` (
        `status`,
        `food`,
        `food_quantity`,
        `details`,
        `last_check`,
        `animals_id`,
        `users_id`
    )
VALUES
    (
        'Bon. Pas de signes d\'infection ou de blessures. La peau est saine sans anomalies.',
        'Herbes, feuilles, écorce et parfois des racines.',
        '10 insectes par jour.',
        'Réagit bien aux stimuli et montre un comportement normal. Bonne santé générale.',
        '2024-06-15',
        12,
        2
    );

-- Insertion food des animaux 
INSERT INTO
    animal_foods (users_id, animal_id, food, quantity, last_check)
VALUES
    (3, 1, 'Viande', '5kg', '2024-11-04 08:30:00'),
    (3, 2, 'Légume', '500g', '2024-11-04 09:00:00'),
    (3, 3, 'Fruits', '200g', '2024-11-04 10:00:00'),
    (3, 4, 'Feuilles', '200g', '2024-11-04 08:00:00'),
    (3, 5, 'Poulet', '4kg', '2024-11-04 09:30:00'),
    (3, 6, 'Fruits', '250g', '2024-11-04 11:00:00'),
    (3, 7, 'Boeuf', '3kg', '2024-11-04 12:30:00'),
    (3, 8, 'Herbes', '9kg', '2024-11-04 14:00:00'),
    (3, 9, 'Poissons', '3kg', '2024-11-04 07:30:00'),
    (3, 10, 'Insectes', '200g', '2024-11-04 16:00:00'),
    (3,11,'Petits poissons','300g','2024-11-04 15:00:00'),
    (3, 12, 'écorce', '150g', '2024-11-04 13:00:00')
    
    -- Insertion des horaires d\'ouverture
INSERT INTO
    openinghours (day, openingTime, closingTime)
VALUES
    ('Lundi', '09:00:00', '18:00:00');

INSERT INTO
    openinghours (day, openingTime, closingTime)
VALUES
    ('Mardi', '09:00:00', '18:00:00');

INSERT INTO
    openinghours (day, openingTime, closingTime)
VALUES
    ('Mercredi', '09:00:00', '18:00:00');

INSERT INTO
    openinghours (day, openingTime, closingTime)
VALUES
    ('Jeudi', '09:00:00', '18:00:00');

INSERT INTO
    openinghours (day, openingTime, closingTime)
VALUES
    ('Vendredi', '09:00:00', '18:00:00');

INSERT INTO
    openinghours (day, oopeningTime, closingTime)
VALUES
    ('Samedi', '09:00:00', '20:00:00');

INSERT INTO
    openinghours (day, openingTime, closingTime)
VALUES
    ('Dimanche', '09:00:00', '20:00:00');