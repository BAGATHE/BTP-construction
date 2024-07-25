psql -U postgres

postgresl2
-- Créer un utilisateur avec un mot de passe
CREATE USER btpconstruction WITH PASSWORD 'btpconstruction';

-- Créer une base de données
CREATE DATABASE btpconstruction;

-- Attribuer tous les privilèges sur la base de données à l'utilisateur
GRANT ALL PRIVILEGES ON DATABASE btpconstruction TO btpconstruction;

\connect btpconstruction

