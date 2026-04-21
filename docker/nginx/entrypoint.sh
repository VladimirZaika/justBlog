#!/usr/bin/env sh
set -e

CERT_DIR="/etc/nginx/certs"
CRT_FILE="${CERT_DIR}/just-blog.local.crt"
KEY_FILE="${CERT_DIR}/just-blog.local.key"

if [ ! -f "${CRT_FILE}" ] || [ ! -f "${KEY_FILE}" ]; then
  echo "Generating self-signed certificate for just-blog.local..."
  openssl req -x509 -nodes -days 3650 -newkey rsa:2048 \
    -keyout "${KEY_FILE}" \
    -out "${CRT_FILE}" \
    -subj "/C=RU/ST=Local/L=Local/O=Course One/OU=Dev/CN=just-blog.local"
fi

exec nginx -g "daemon off;"
