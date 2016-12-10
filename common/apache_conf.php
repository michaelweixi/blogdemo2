<VirtualHost *:80>
       ServerName blogdemo2.com
       DocumentRoot "/Users/michaelweixi/WWWRoot/blogdemo2/frontend/web/"

       <Directory "/Users/michaelweixi/WWWRoot/blogdemo2/frontend/web/">
           # use mod_rewrite for pretty URL support
           RewriteEngine on
           # If a directory or a file exists, use the request directly
           RewriteCond %{REQUEST_FILENAME} !-f
           RewriteCond %{REQUEST_FILENAME} !-d
           # Otherwise forward the request to index.php
           RewriteRule . index.php

           # use index.php as index file
           DirectoryIndex index.php

           # ...other settings...
       </Directory>
   </VirtualHost>

   <VirtualHost *:80>
       ServerName admin.blogdemo2.com
       DocumentRoot "/Users/michaelweixi/WWWRoot/blogdemo2/backend/web/"

       <Directory "/Users/michaelweixi/WWWRoot/blogdemo2/backend/web/">
           # use mod_rewrite for pretty URL support
           RewriteEngine on
           # If a directory or a file exists, use the request directly
           RewriteCond %{REQUEST_FILENAME} !-f
           RewriteCond %{REQUEST_FILENAME} !-d
           # Otherwise forward the request to index.php
           RewriteRule . index.php

           # use index.php as index file
           DirectoryIndex index.php

           # ...other settings...
       </Directory>
   </VirtualHost>