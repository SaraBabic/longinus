#!/usr/bin/env bash

# Usage: sh backup-files.sh longinus.rs "gn-master-backups/Servers/GN Digital/live-pp/longinus.rs/files/";

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
tar -zcf "/var/www/$1/$1-$suffix.tar.gz" --exclude='css' --exclude='js' --exclude='php' --exclude='styles' -C "/var/www/$1/sites/default/files/" .
aws s3 cp "/var/www/$1/$1-$suffix.tar.gz" "s3://$2"
rm "/var/www/$1/$1-$suffix.tar.gz"
