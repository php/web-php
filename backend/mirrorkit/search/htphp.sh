#!/bin/sh

HTBINDIR=/usr/local/htdig/bin

QUERY_STRING="$@"
REQUEST_METHOD=GET
export QUERY_STRING REQUEST_METHOD

$HTBINDIR/htsearch
