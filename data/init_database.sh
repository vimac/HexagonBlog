#!/bin/bash

dbname="HexagonBlog.sqlite"
if [ ! -e "$dbname" ]; then
    sqlite3 "$dbname" < hexagonblog.sql
    exit $?
else
    echo "There is a db file already"
    exit 1
fi
