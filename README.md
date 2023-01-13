# Is PROJE.Tk

## UPDATE:

This is a very old and insecure system whose code I wrote in my early days of learning PHP. Not sure how you've stumbled upon it, but here you are. Do not use the code contained herein, unless it is for learning purposes, as it is vulnerable to just about all web exploits known :).

I am just leaving it here as a museum of sorts.

End update.

<hr>

This repos holds the code for [http://isproje.tk](http://isproje.tk) (Update: domain no longer works).

It contains code for a functioning user authentication system, complete with email confirmation.

## Getting started

To use it, clone the repo:

```
git clone https://github.com/markmuthii/isprojetk
```

Open the project in your favourite text editor. I like sublime text:

```
subl .
```

Change the configurations found in `db/config.php` to your server settings and upload the folder contents to your root directory in the server.

Import the sql file found in the `mysql/` to your database, and enjoy.

If you run into any issues, reach out on Twitter [@muthiimm](https://twitter.com/muthiimm).

Some of the functionalities in this project require it to be hosted. For a reliable hosting provider, I recommend [Bluehost](https://bluehost.com/track/markmuthii) _(affiliate link)_, whose hosting packages come with a free domain.

NOTE: This code has not been sensitized to protect against attacks such as XSS.
