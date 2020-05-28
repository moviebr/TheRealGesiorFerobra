## PREMIUM GESIOR BY RICARDO SOUZA 

> Esse é um fork destinado a servidores 8.60 que utilizam as versões mais atuais do TFS/OTX.
> Caso queira fazer uma correção faça um PR ou sugira alguma correção pelo issues.

Confira o projeto em [Ferobra](https://ferobraglobal.com) 
> **Lembrando que esse repositório não está com a ultima versão do Ferobra.**
### Entre em contato
> +55 (62) 9 9934-0570. ![whatsapp](https://cdn.icon-icons.com/icons2/373/PNG/32/Whatsapp_37229.png) <br>
> Ricardo Souza#8938 Discord

#### PT-BR
* Bem vindo ao tutorial de instalação desse lindo website feito com amor e carinho pra vcs meus queridos tibianos.
* Lembrando que o Projeto todo em si não é de minha autoria ele tem diversos participantes.
* Essa se trata de uma versão Estável do produto, isso não a deixa livre de bugs.
* Se encontrar bugs ou tiver interesse que seja desenvolvido alguma nova funcionalidade fique a vontade para abrir um Issue.
* sem mais delongas segue o tutorial.

#### EN
* Welcome to the installation tutorial of this beautiful website made with love and care for you my dear Tibians.
* Remembering that the Project itself is not my own, it has several participants.
* This is a Stable version of the product, this does not leave it free of bugs.
* If you find bugs or are interested in developing some new functionality feel free to open an Issue.
* without further ado follows the tutorial.
 
 
## Installation

### Requirements

* [Apache](http://www.apache.org/) with [mod_rewrite](http://httpd.apache.org/docs/current/mod/mod_rewrite.html) enabled + [PHP](http://php.net) Version 5.6 or newer

### How to install

* Clone the Ferobra Premium Gesior From Github.
* change the permission for write in /cache.

```bash
sudo chmod -R 777 /cache
```


### Tips and Tricks

* This website have some security implements, here you can use apache2 to apply them.
* run these commands to maximize your security.
````bash
sudo a2enmod headers
sudo a2enmod rewrite 
````
* on ubuntu 16.06 or 14.04 go to apache folder and edit your config.
* run:
````bash
sudo vim /etc/apache2/apache2.conf 
````
and search for something like this: 
```markdown
<Directory PATH_TO_YOUR_WEBSITE>
        Options Indexes FollowSymLinks
        AllowOverride All
        Require all granted         
</Directory>
```

* and add something like this /\

### PHP NEEDS THAT FOLLOWING
```bash
sudo apt-get install php5-gd
sudo apt-get install php5-curl
```

Make sure curl is enabled in the php.ini file. For me it's in /etc/php5/apache2/php.ini, if you can't find it, this line might be in /etc/php5/conf.d/curl.ini. Make sure the line :
extension=curl.so

now restart apache.:
```bash
sudo /etc/init.d/apache2 restart
```
or
```bash
sudo service apache2 restart
```

## Install composer

```bash
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
php -r "if (hash_file('sha384', 'composer-setup.php') === 'e0012edf3e80b6978849f5eff0d4b4e4c79ff1609dd1e613307e16318854d24ae64f26d17af3ef0bf7cfb710ca74755a') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
php composer-setup.php
php -r "unlink('composer-setup.php');"
mv composer.phar /usr/local/bin/composer

```
Depois disso no terminal entre na pasta do site e rode o commando
```bash
composer install
```

## Main Dev
@riicksouzaa

## credits
@gesior <br>
@Felipe Monteiro <br>
@marcoma <br>
And more developers

## License
* Open Source
