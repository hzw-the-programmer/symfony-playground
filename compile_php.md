cd ~/build
tar -xvf ../zips/httpd-2.4.27.tar.bz2
cd httpd-2.4.27
vi INSTALL
mkdir ../httpd-2.4.27-build
./configure --prefix=/home/hzw/build/httpd-2.4.27-build
cd ..
tar -xvf ../zips/apr-1.6.2.tar.gz
cp -r apr-1.6.2/ httpd-2.4.27/srclib/apr
tar -xvf ../zips/apr-util-1.6.0.tar.gz
cp -r apr-util-1.6.0/ httpd-2.4.27/srclib/apr-util
cd httpd-2.4.27
./configure --prefix=/home/pageask/build/httpd-2.4.27-build
make
make install
sudo ../httpd-2.4.27-build/bin/apachectl start
sudo ../httpd-2.4.27-build/bin/apachectl stop

cd ..
tar -xvf ../zips/php-7.1.9.tar.bz2
cd php-7.1.9/
vi INSTALL
./configure --prefix=/home/pageask/build/php-7.1.9-build --with-apxs2=/home/pageask/build/httpd-2.4.27-build/bin/apxs --with-mysql
cd ..
tar -xvf ../zips/libxml2-2.9.4.tar.gz
cd libxml2-2.9.4/
vi INSTALL
./configure --prefix=/home/pageask/build/libxml2-2.9.4-build
make
make install
ls ../libxml2-2.9.4-build/
cd ../php-7.1.9/
./configure --help | grep "libxml2"
./configure --prefix=/home/pageask/build/php-7.1.9-build --with-apxs2=/home/pageask/build/httpd-2.4.27-build/bin/apxs --with-libxml-dir=/home/pageask/build/libxml2-2.9.4-build
make
make install
./configure --prefix=/home/pageask/build/php-7.1.9-build --with-apxs2=/home/pageask/build/httpd-2.4.27-build/bin/apxs --with-libxml-dir=/home/pageask/build/libxml2-2.9.4-build --with-pdo-mysql
make
make install
