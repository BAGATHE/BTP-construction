psql -U postgres

postgresl2
-- Créer un utilisateur avec un mot de passe
CREATE USER btpconstruction WITH PASSWORD 'btpconstruction';

-- Créer une base de données
CREATE DATABASE btpconstruction;

-- Attribuer tous les privilèges sur la base de données à l'utilisateur
GRANT ALL PRIVILEGES ON DATABASE btpconstruction TO btpconstruction;

\connect btpconstruction


Maison_travaux::create([
    'type_maison'=>'TOKYO',
    'description'=>' Maison contemporaine avec de grandes fenÛtres et des finitions elegantes.',
    'surface'=>120,
    'code_travaux'=>'102',
    'type_travaux'=>'beton armée',
    'unite'=>'m3',
    'prix_unitaire'=>573215.8,
    'quantite'=>18.4,
    'duree_travaux'=>90,
]);

Maison_travaux::create([
    'type_maison'=>'TOKYO',
    'description'=>' Maison contemporaine avec de grandes fenÛtres et des finitions elegantes.',
    'surface'=>120,
    'code_travaux'=>'103',
    'type_travaux'=>'Armature en beton',
    'unite'=>'kg',
    'prix_unitaire'=>8500,
    'quantite'=>781,
    'duree_travaux'=>90,
]);

Maison_travaux::create([
    'type_maison'=>'TOKYO',
    'description'=>' Maison contemporaine avec de grandes fenÛtres et des finitions elegantes.',
    'surface'=>120,
    'code_travaux'=>'104',
    'type_travaux'=>'remblais ouvrage',
    'unite'=>'m3',
    'prix_unitaire'=>37563.26,
    'quantite'=>15.59,
    'duree_travaux'=>90,
]);

Maison_travaux::create([
    'type_maison'=>'TOKYO',
    'description'=>' Maison contemporaine avec de grandes fenÛtres et des finitions elegantes.',
    'surface'=>120,
    'code_travaux'=>'201',
    'type_travaux'=>'maconnerie moellons',
    'unite'=>'m3',
    'prix_unitaire'=>172114.40,
    'quantite'=>9.62,
    'duree_travaux'=>90,
]);

Maison_travaux::create([
    'type_maison'=>'TOKYO',
    'description'=>' Maison contemporaine avec de grandes fenÛtres et des finitions elegantes.',
    'surface'=>120,
    'code_travaux'=>'203',
    'type_travaux'=>'remblais technique',
    'unite'=>'m3',
    'prix_unitaire'=>37563.26,
    'quantite'=>15.59,
    'duree_travaux'=>90,
]);


Maison_travaux::create([
    'type_maison'=>'TOKYO',
    'description'=>' Maison contemporaine avec de grandes fenÛtres et des finitions elegantes.',
    'surface'=>120,
    'code_travaux'=>'204',
    'type_travaux'=>'herrissonnage',
    'unite'=>'m3',
    'prix_unitaire'=>73245.40,
    'quantite'=>7.80,
    'duree_travaux'=>90,
]);

Maison_travaux::create([
    'type_maison'=>'TOKYO',
    'description'=>' Maison contemporaine avec de grandes fenÛtres et des finitions elegantes.',
    'surface'=>120,
    'code_travaux'=>'205',
    'type_travaux'=>'beton ordinaire',
    'unite'=>'m3',
    'prix_unitaire'=>487815.80,
    'quantite'=>5.46,
    'duree_travaux'=>90,
]);

Maison_travaux::create([
    'type_maison'=>'TOKYO',
    'description'=>' Maison contemporaine avec de grandes fenÛtres et des finitions elegantes.',
    'surface'=>120,
    'code_travaux'=>'206',
    'type_travaux'=>'chape',
    'unite'=>'m3',
    'prix_unitaire'=>33566.26,
    'quantite'=>77,97,
    'duree_travaux'=>90,
]);
