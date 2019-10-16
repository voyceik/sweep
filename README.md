# SWeeP Application Tools for representation of large biological sequences datasets in compact vectors

This is the SWeeP implementation project for [SWeeP Application Tools for representation of large biological sequences datasets in compact vectors](http://sweep.appsbio.info/). It includes the PHP, Octave and aditional files for you.

## Installation

To use this tools, your computer needs a Linux compatible operational system, like Centos, Debian, Ubuntu, or other Linux like, preferably in the last version; local installation of Octave or Matlab and Apache2 HTTP server, MySql RDBMS (MariaDB) and PHP Suite (LAMP), and some configurations to integrate these services.

### Setup

To manually set up this tools, first download it with Git:

```bash
git clone https://github.com/voyceik/sweep
```

Then move the folder html to default www folder of your apache (httpd) instalation, and sweepd to var folder:

```bash
mv html /var/www
mv sweepd /var
```

Download pre-formated [SWeeP Databases](http://sweep.appsbio.info/sweep_browse.php) and run appropriate SQL scripts from download sql folder.

Adjust sweepd.conf with paths, user and password to alow read and save uploaded files from taks submitted.

Finally, insert in crontab root user the line to wake-up sweepd deamon every minute:

```bash
crontab -e
* * * * * /bin/bash -l -c 'cd /var/sweepd/; ./sweepd.sh >> /var/log/sweepd.log' >> /dev/null 2>&1
```
