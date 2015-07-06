Installation

Install dependencies

Dependencies are defined in package.json

	cd path/to/theme/
	npm install

create a .htaccess file in your Wordpress root folder containing:

<IfModule mod_rewrite.c>
	RewriteEngine On
	RewriteBase /
	RewriteRule ^index\.php$ - [L]
	RewriteCond %{REQUEST_FILENAME} !-f
	RewriteCond %{REQUEST_FILENAME} !-d
	RewriteRule . /index.php [L]
</IfModule>

*********************************
*
* CSS Stylsheets
*
*********************************

Stylesheets are located in the library/less Folder

Use Grunt to render the changes you have made in the .less files to .css
(You need to do that to see any changes you have made)

	grunt dev
