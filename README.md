https://www.positronx.io/laravel-file-upload-with-validation/

public to access image
php artisan storage:link required to create symbolic link to storage/app/

for large file upload
  php.ini

  ; Maximum allowed size for uploaded files.
  upload_max_filesize = 40M

  ; Must be greater than or equal to upload_max_filesize
  post_max_size = 40M

change default page after logon in
  RouteServiceProvider
