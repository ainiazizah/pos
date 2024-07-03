migrate:
	php artisan migrate:fresh

seeder:
	php artisan db:seed --class=CategorySeeder
	php artisan db:seed --class=DatabaseSeeder
	php artisan db:seed --class=ProductSeeder
	php artisan db:seed --class=UserSeeder

serve:
	php artisan serve

debug:
	sudo mysqldump --add-drop-table --no-data -u root db_dummy | grep 'DROP TABLE'

reset:
	sudo mysql -u root db_dummy < reset.sql
