#!/usr/bin/env bash

mysql --user=root --password="$MYSQL_ROOT_PASSWORD" <<-EOSQL
    CREATE DATABASE IF NOT EXISTS vokke;
    GRANT ALL PRIVILEGES ON \`vokke%\`.* TO '$MYSQL_USER'@'%';
EOSQL
