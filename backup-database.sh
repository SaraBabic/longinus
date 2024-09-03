#!/usr/bin/env bash

# Usage: sh backup-database.sh longinus.rs "gn-master-backups/Servers/GN Digital/live-pp/longinus.rs/databases/";

if [ -z "$1" ]
  then
    echo "Please provide backup name."
    exit 1
fi

if [ -z "$2" ]
  then
    echo "Please provide S3 path."
    exit 1
fi

suffix=$(date '+%Y-%m-%d_%H-%M-%S')
"/var/www/$1/bin/drush" sql-dump --gzip --structure-tables-key=common > "/var/www/$1/$1-$suffix.sql.gz"
aws s3 cp "/var/www/$1/$1-$suffix.sql.gz" "s3://$2"
rm "/var/www/$1/$1-$suffix.sql.gz"
