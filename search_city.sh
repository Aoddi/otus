#!/usr/bin/env bash

FILE="users.csv"

if [ ! -f "$FILE" ]; then
    echo "Ошибка: файл $FILE не найден!"
    exit 1
fi

awk -F, 'NR > 1 {print $3}' "$FILE" | sort | uniq -c | sort -rn | head -n 3