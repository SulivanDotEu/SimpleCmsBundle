SimpleCmsBundle
===============

A simple CMS that provide block content and a few strategy (by country, by language, etc...) to manage the content of your website (or more).

Installation
------------

test

* add the code inyour project : `git submodule add https://github.com/SulivanDotEu/SimpleCmsBundle.git src/Walva/SimpleCmsBundle`
* add the bundle to your appkernel : `new Walva\SimpleCmsBundle\WalvaSimpleCmsBundle()`
* 

Getting started
---------------

* Create a block
* Create the content (a document)
* link the content to the block
* include the block : {{ cms_inclodeBlock('home.greetings', {"country" : app.request.get('country')})|raw }}