# LIBRARY
 
This system is about the simple Library, with the next caracteristics:

# SPECIFICATIONS

- A book has: name, author, category (select with
autocomplete), published date, user (person that
borrowed a book).
- A category has: name, description, manybooks.
- You have to be able to do the following things with
the books:
- Show a paginated list/table with all the books.
- Filter the list/table mentioned above.
- Create a book.
- Edit a book.
- Delete a Book.
- Be able to know if a user borrowed a book or if it
still available.
- Be able to change the status from available to
not available (use a modal for this feature).

# INSTALATION

For you can install this project you need to take the next:

- PHP v 7.1 or superior
- MySQL or other type of BD. (You shold consider the installation at PHP)
- Apache (You can use Xampp)

The Steps are the next:

Onece you have all of that, you can beging to install.
- You put to this project at the folder where you can deployed the projects of PHP.
  (Usually in C:\Apache\htdocs if you are in windows, if you are in Linux the route are /etc/apache/htdocs)
- You neet to configure the file of .env, that file is in the principal directory.
And you have to looking this lines of code:
```php
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=libreria
    DB_USERNAME=root
    DB_PASSWORD=
```
There you have to put your configuration of connecton to database, you most be created before a database with this name "libareria" or the other if you want.
(In this case, i am using MySQL by default)
- You shuld to move to this rout: "our_server\Library\" or "Our_server/Library/" at the console or terminal of your serve.
and write the next comands:

```sh
    php artisan migrate:refresh --seed 

```

And the next for prove this proyect

```sh
    php artisan serve

```
 and you shold go tho this rout of yout browser "127.0.0.1:8000" and the proyect will be deployed now.
