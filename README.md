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
mkdir /var/www/databases
mkdir /var/www/downloads
mkdir /var/www/finished
```

Download pre-formated [SWeeP Databases](http://sweep.appsbio.info/sweep_browse.php) and run appropriate SQL scripts from download sql folder.

Adjust sweepd.conf with paths, user and password to alow read and save uploaded files from taks submitted.

### Dependencies

Check if the follow commands was executed in your instalation or if the respective services are working fine:

```bash
sudo yum update
sudo yum -y install lzip qhull-devel pcre-devel gnuplot texinfo bison byacc flex zlib-devel hdf5-devel fftw-devel glpk-devel libcurl-devel freetype-devel blas-devel lapack-devel gcc-c++ pcre-devel qrupdate-devel suitesparse-devel arpack-devel ncurses-devel readline-devel gperf mesa-libOSMesa-devel fontconfig-devel fltk-devel gl2ps-devel java-1.8.0-openjdk-devel qt-devel qscintilla-devel bzip2-devel atlas-devel libsndfile-devel portaudio-devel GraphicsMagick-c++-devel libXft-devel  llvm-devel java-devel
sudo ln -s /usr/lib64/atlas/libtatlas.so /usr/lib64/libatlas.so
wget ftp://ftp.gnu.org/gnu/octave/octave-5.1.0.tar.xz
tar xvfJ octave-5.1.0.tar.xz
cd octave-5.1.0
export JAVA_HOME=/usr/lib/jvm/java-1.8.0-openjdk
./configure --prefix=/usr/local/OCTAVE/5.1.0
make
make install

sudo yum install postgresql postgresql-server postgresql-devel postgresql-contrib 
sudo postgresql-setup initdb
sudo systemctl enable postgresql.service
sudo systemctl start postgresql.service
sudo su – postgres –c 'psql -c "alter user postgres with encrypted password ''choose_a_password''"'
sudo vi /var/lib/pgsql/data/postgresql.conf #sdjustmens if necessary
sudo vi /var/lib/pgsql/data/pg_hba.conf # local all postgres md5
sudo service postgresql restart

sudo cat > /etc/profile.d/octave.sh
export PAYH=$PATH:/usr/local/OCTAVE/5.1.0/bin/
^D
sudo chmod +x /etc/profile.d/octave.sh
sudo octave
> pkg -forge install struct
> pkg -forge install database

yum install nmap
sudo yum install httpd
sudo systemctl start httpd.service
sudo systemctl enable httpd.service
```

Finally, insert in crontab root user the line to wake-up sweepd deamon every minute:

```bash
crontab -e
* * * * * /bin/bash -l -c 'cd /var/sweepd/; ./sweepd.sh >> /var/log/sweepd.log' >> /dev/null 2>&1
```
