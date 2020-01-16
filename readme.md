![Mere Logo](assets/images/logo.jpg)
# Mere

> Being nothing more nor better than.

You will see that this project is exactly that. 

I'm not a php developer but I wanted to find something that would allow me to host my client's basic static sites without booting up a wordpress site for 8 pages or less content that would rarely if ever change. Wordress has a lot of attackers and hijackers and requires regular maintenance. For simple sites, this is unnecessary; so I started searching for a static or flat file cms. There are plenty of options, some great ideas, but again, overkill. So, I started playing. 

The criteria was it needed to be simple and work out of the box with minimal config. Pages can be saved in the root but are currently in a "pages" folder to be found easily. Twig works for php and html as well its own extension ".twig". 

Choose any html template from [BootstrapMade](https://bootstrapmade.com) or [ThemeWagon](https://themewagon.com) etc and start incorporating twig and your content pages will only ever need to be 'merely' content, not requiring any html.

I'll try to convert a few html templates as time goes on for those that just want to download something at get started hosting. 

```
composer install
```


Includes: 

* twig
* phpmailer
* michelf/php-markdown - TODO


Thanks to:
* [BootstrapCDN](https://www.bootstrapcdn.com/)
* [Start Bootstrap](https://startbootstrap.com)
* [BootstrapMade](https://bootstrapmade.com)
* [ThemeWagon](https://themewagon.com)
* [Romain Moro](https://github.com/c4ilus)

## CHANGELOG
* 20200108 - Couldn't get form to process from within twig (will work on this later.) Was able to get it working by breaking contact into it's own php file for processing.