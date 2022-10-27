# Requirements
```
	PHP 7.4
	Laravel 8
	Mysql 5.7.36
```


# Installation

1. Clone this repo

```
git clone https://github.com/mohrahmatullah/ukur-test-backend-rest-api.git
```


2. Setup

```
$ cd ukur-test-backend-rest-api
$ composer install
$ php artisan key:generate
$ copy .env.example .env

put database credentials in .env file
```

3. Migrate and insert records

```
$ php artisan migrate
```

atau bisa import database dari folder
```
	sql/ukur-test-backend-rest-api.sql
```

4. Insomnia

```
	- Silahkan Import file json insomnia ke aplikasi insomnia untuk melihat formatnya insomnia collection
	- filenya ada di folder
	
	insomnia/insomnia..

```


## User Registration.

![register](register.png)

## User Login.

![login](login.png)

## User Logout.

![logout](logout.png)

## Save Member To Database FROM file sample.json With Token and BALANCE kurang dari 10.000.

![save_member_from_sample_json](save_member_from_sample_json.png)

## List Member from database With Token, data dari sample json yang BALANCE kurang dari 10.000.

![list_member](list_member.png)
