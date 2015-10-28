# phprouting

##Configuración Apache2

RewriteEngine On
%{REQUEST_FILENAME} !-f
RewriteRule ^ index.php [QSA,L]

##Configuracion nginx

location / { try_files $uri $uri/ /index.php?$query_string; }
