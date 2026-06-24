#!/usr/bin/env bash

read -p "Введите первое слагаемое: " oneNum

if [[ ! "$oneNum" =~ ^[-+]?[0-9]+([.,][0-9]+)?$ ]]; then
    echo "Ошибка: $oneNum НЕ является числом!" >&2
    exit 1
fi

read -p "Введите второе слагаемое: " twoNum

if [[ ! "$twoNum" =~ ^[-+]?[0-9]+([.,][0-9]+)?$ ]]; then
    echo "Ошибка: $twoNum НЕ является числом!" >&2
    exit 1
fi

num1=${oneNum//,/.}
num2=${twoNum//,/.}

result=$(awk -v n1="$num1" -v n2="$num2" 'BEGIN { print n1 + n2 }')

clean_result=$(printf "%g" "$result")

echo "Результат сложения: $clean_result"