HexagonBlog
===========
A demo application created based by HexagonFramework


Requirement
===========
- PHP 5.4+ Required
- Need mcrypt, pdo, pdo-sqlite


Basic Install
===========
- extract
- run data/init_database.sh for start
- configure nginx, see example below


Nginx Example
===========
	
	server {
	    
	    listen       80;
	    server_name  hexagon.demo;
	
	    #charset koi8-r;
	
	    #access_log  logs/host.access.log  main;

	    root /Users/mac/git/HexagonBlog;
	
	    location / {
	        root   /Users/mac/git/HexagonBlog;
	        index  index.php index.html;
	        if (!-f $request_filename) {
	            rewrite ^.*$ /index.php last;
	        }
	    }

	    # pass the PHP scripts to FastCGI server listening on 127.0.0.1:9000
	    #
	    location ~* \.php {
	        fastcgi_pass    unix:/opt/run/php.socket;
	        include     fastcgi_params;
	        fastcgi_index               index.php;
	        fastcgi_split_path_info         ^(.+\.php)(.*)$;
	        fastcgi_param SCRIPT_FILENAME   $document_root$fastcgi_script_name;
	        fastcgi_param PATH_INFO         $fastcgi_path_info;
	    }
	
	    location ~ \.(zip|rar|jsp|asp|aspx|bak|mdb|yaml)$ {
	        error_log /dev/null crit;
	        deny all;
	    }
	
	    location ~ /\.nginxaccess {
	        deny all;
	    }
	
	    location /none {
	        deny all;
	        error_log /dev/null crit;
	    }
	}
