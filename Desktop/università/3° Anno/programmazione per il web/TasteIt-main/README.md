## Taste It

![alt text](https://www.scattidigusto.it/wp-content/uploads/2021/06/ristoranti-di-mare-Lazio.jpg)

  Questo progetto è stato realizzato con lo scopo di aiutare il ristorante Taste It ad avere un propria applicazione web,
  attraverso la quale poter far conoscere i suoi prodotti a tutti coloro che amano la cucina italiana.
  Gli utenti potranno facilmente ordinare i propri piatti preferiti per poterli gustare comodamente dalla propria casa.
  

## Tipologie di utenti

- Utenti non registrati: 
  possono avere accesso alla home per visualizzare i prodotti offerti e leggere informazioni sul ristorante,
  possono registrarsi per usufruire delle funzionalità degli utenti registrati
  
- Utenti registrati: 
  Hanno accesso a tutte le funzionalità dell'utente non registrato ed in più avere accesso al proprio carrello,
  alla lista dei preferiti, effettuare e visualizzare ordini. I clienti più fedeli avranno anche a
  disposizione dei coupon da utilizzare sulla spesa effettuata

- Ristorante:
  Gestisce i prodotti in vendita, i coupon da inviare e gli ordini effettuati
  
## Struttura

  Questa applicazione è distribuita su tre livelli (data managment, application layer, presentation layer) ed è progettata
  in modo da avere un'interfaccia responsive.

## Requisiti

- Linguaggio PHP(versione 7.1)
- DBMS: MariaDb(versione 10.4.19)
- Server Apache (versione 2.4)
- Web: HTML + CSS + Javascript

## Intallazione

  Per l'installazione è necessario:
 
- decomprimere la cartella TasteIt ed inserirla all'interno della directory htdocs 
  oppure public_html (in questo caso bisogna, per il reindirizzamento, aggiornare il
  file .htaccess con il proprio nome utente in (RewriteRule) ed indicare ad Apache 
  la directory che ospita il progetto tramite l'apposita direttiva in httpd.conf:
  
  ```bash
  <IfModule mod_userdir.c>
  UserDir public_html
  </IfModule>
  ```

- Controllare i diritti di accesso alla cartella
  In ambiente LINUX bisogna spostare la cartella in /opt/lampp/htdocs e per abilitare
  i permessi di lettura su tutta la cartella TasteIt scrivendo i seguenti comandi sul terminale: 

  ```bash
  $ sudo chmod 777 /opt/lampp/htdocs/TasteIt

  ```
- Porre le credenziali del proprio database in configDatabase.php
  
- Per inizializzare e popolare il database in locale, sul terminale, bisogna portarsi sulla directory "script" dove sono presenti i file "tasteit.sql" e "scriptDb.php" ed eseguire il comando:

  ```bash
  php .\scriptDb.php name password

  ```
  (dove name: il nome utente del proprio db e password: la password del proprio db)
  
  
- Per avere tutte le dipendenze, scaricare composer su:
  [Composer](https://getcomposer.org/) e
  una volta aperto il progetto su un IDE, digitare i comandi (nel terminale del corrispondente): 

  ```bash
  composer install
  composer update

  ```
    
- Controllare l'abilitazione dei cookie sul proprio browser. Se non dovessero essere attivi uscirà un avviso
  che invita ad abilitarli.

- Per usufruire dello spazio dedicato al ristoratore, durante la login inserire queste credenziali : 
  ```bash
  email: tasteit@gmail.com
  password: secret
  ```
  
## Team di sviluppo

 Marco Silveri
 Antonio Devastatore e
 Mohamed Ossama Mohamed Mohamed 
 

  
