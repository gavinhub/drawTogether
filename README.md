drawTogether
============
It's an excise that I did while learning PHP.

By simple clicks, people from different places can create or modify the same picture at the same time.

Here is the Demo:

* [ZhuJiWu](http://www.gmy.asia/drawTheMap "lll")
* [FreehostingEu](http://www.gavinblog.net/drawTheMap "have a try")

The project was sql-free at the first, but I added a database for UserStatistics.

If you are intrested in this, you can simply get it work:

1. Download the code.
+ Change some data in file: define.php
+ Create a table named 'webstat' in your database with four columns:
> + time   int(11)
> + ipaddr varchar(16)
> + ua     text
> + others varchar(50)

Have fun!
