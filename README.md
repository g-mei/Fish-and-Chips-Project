# Fish and Chips Website

<p align="center"><img src="https://user-images.githubusercontent.com/86360050/178400829-5dfef2ee-7a2f-4615-9a48-fc619fa0ed06.png" alt="homepage of fish and chips"></p>

## Project Description
A Laravel food ordering website that utilises packages, such as Jetstream and Tailwind.
<h3>Features</h3>
<h4>Customer side:</h4>
<ul>
<li>Make order</li>
<li>View active orders</li>
<ul>
<li>View status of the order</li>
</ul>
<li>View past orders</li>
</ul>

<h4>Admin side:</h4>
<ul>
<li>Menu management</li>
	<ul>
<li>Manage categories</li>
<li>Manage foods & packs</li>
<li>Manage orders, view order history</li>
	</ul>
</ul>

## Requirements
<ul>
	<li>Laravel 9</li>
<li>PHP 8.0.8</li>
<li>Composer v2.1.3</li>
</ul>

## Installation
<ol>
<li>Clone the respository</li>

```
git clone https://github.com/g-mei/Fish-and-Chips-Project.git
```

<li>Install the composer packages</li>

```
composer install
```

<li>Copy the environment file and edit it accordingly</li>

```
cp .env.example .env
```
<li>Generate an application key</li>

```
php artisan key:generate
```

<li>Create the database by migrating and adding the seeders</li>

```
php artisan migrate --seed
```

<li>Link the storage folder to public</li>

```
php artisan storage:link
```

<li>Run the npm command and compile all the assets</li>

```
npm install
```

<li>Run the application server and see the website live</li>

```
php artisan serve
```

</ol>

## Login Details
### Admin Details
<p><b>Email:</b> admin@fishandchips.com</p>
<p><b>Password:</b> admin</p>

### Customer Details
<p><b>Email:</b> customer@test.com</p>
<p><b>Password:</b> password</p>
