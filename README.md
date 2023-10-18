Application Template
===============================

# What is Open 2.0?

Open 2.0 is a Community Application with a large set of modules for Collaborative Work, Project Management, News/Newsletter, Documents, Polls, and Many More useful things

> Read More About [https://www.open2.0.regione.lombardia.it/](https://www.open2.0.regione.lombardia.it/)

Questa applicazione è composta da 3 servizi, backend, frontend e console, è studiata per lo sviluppo multi-ambiente, questo semplifica le fasi i sviluppo e test e il lavoro in team

Struttura delle Directory
-------------------

```
common
    config/              contiene le configurazioni comuni ai 3 servizi
    mail/                contiene viste specifiche per il mailer
    models/              contiene i modelli comuni per i 3 servizi
console
    config/              contiene configurazioni specifiche per il sevizio console
    controllers/         contiene controllers specifici per il sevizio console
    migrations/          contiene database migrations
    models/              contiene modelli specifici per il sevizio console
    runtime/             contiene files generati dinamicamente in runtime
backend
    config/              contiene configurazioni specifiche per il sevizio backend
    controllers/         contiene controllers specifici per il sevizio backend
    models/              contiene modelli specifici per il sevizio backend
    runtime/             contiene files generati dinamicamente in runtime
    assets/              contiene application assets come il JavaScript e CSS
    views/               contiene viste specifiche per i controller di backend
    web/                 contiene contiene files pubblici e gli script per servire l'applicazione di backend
frontend
    config/              contiene configurazioni specifiche per il sevizio frontend
    controllers/         contiene controllers specifici per il sevizio frontend
    models/              contiene modelli specifici per il sevizio frontend
    runtime/             contiene files generati dinamicamente in frontend
    assets/              contiene application assets come il JavaScript e CSS
    views/               contiene viste specifiche per i controller di frontend
    web/                 contiene contiene files pubblici e gli script per servire l'applicazione di frontend
vendor/                  contiene dipendenze e pacchetti di terze parti
environments/            contiene set di configurazioni divisi per ambiente di lavoro
tests                    contiene test di vario genere per l'applicazione
```

Requisiti
-------------------

I requisiti qui esposti sono intesi per un'ambiente di sviluppo o con bassa affluenza di utenti

#### Hardware

- 2 Core
- 2GB Ram
- 2GB Disco
  - Lo storage va dimensionato in base alla mole di dati e allegati che si vuole gestire



Installazione con Docker
-------------------
E' possibile avviare l'applicativo sotto forma di container utilizzando Docker in pochi step e a patto di posserede le risorse hardware adatte

Il metodo consigliato per l'installazione in un'ambiente di sviluppo &eacute; mediante __docker compose__ e bastano i seguenti passaggi

- Copiare il file __.env.sample__ in __.env__ modificandolo secondo le proprie preferenze e seguendo le indicazioni sulle variabili d'ambiente in questo documento
- Pacchettizzare il container applicativo con il comando __docker compose build__
- Avviare il cluster con il comando __docker compose up -d__ (-d consente di avviare il cluster di container in background)

_* Il file docker-compose.yml contiene la definizione del cluster applicativo che verrà avviato con i comandi sopra indicati e contiene varia software a supporto dell'applicazione Open 2.0 come un Database MySQL, un'Antivirus, un motore di ricerca e un pannello di gestione del database_

Variabili D'ambiente
-------------------

Si può personalizzare la propria installazione modificando il valore delle seguenti variabili d'ambiente

#### DOMAIN_FRONTEND,DOMAIN_BACKEND
Rappresentano i domini di "backend" e "frontend" per applicazioni multi-ambiente

#### ENC_KEY
Chiave di cifratura per configurazioni e informazioni applicative

#### ENABLE_CRON
Imposta a "true" per abilitare la CRONTAB nel container applicativo (Default: true)

#### ENABLE_APACHE
Imposta a "true" per abilitare il Webserver nel container applicativo (Default: true)

#### ENABLE_PHP
Imposta a "true" per abilitare l'interprete PHP nel container applicativo (Default: true)

#### DB_HOST
Host del Database MySQL

#### DB_NAME
Nome del database da utilizzare per l'applicazione

#### DB_USER
Username dell'utente usato per connettersi al database

#### DB_PASS
Password dell'utente usato per connettersi al database

Installazione Manuale Applicativo
-------------------

L'applicazione prevede solo un processo di installazione manuale per personale esperto, non è quindi presente un'interfaccia web poichè l'architettura per consentire un'elevata flessibilità nella gestione delle configurazioni richiede una certa preparazione hardware e software

#### Requisiti Software

- PHP: >= 8.2
    - APC
    - GD
    - MemCached
    - Imagick
    - Intl
    - SMTP
    - SOAP
    - MCrypt
    - BCMath
    - MBString
    - XML
    - Zip
    - Curl
- MySQL >= 5.6

#### Configurazione
Gli step minimi per l'installazione prevedono la configurazione del database e l'esecuzione delle migrazion (o nella maggior parte dei casi d'uso, l'importazione di un dump del set di dati di sviluppo nel database dove lo si vuole rendere operativo)

- Inizializzazione del set di configurazioni per l'ambiente specifico su cui si desidera lavorare, per eseguire questa procedura si lavorerà con l'eseguibile __init__ (in ambiente windows è possibile utilizzare __init.bat__)
    - __php init__ consente di iniziare la procedura guidata in cui verranno chieste alcune informazioni riguardanti la procedura stessa
        - è possibile automatizzare questa procedura usando i seguenti argomenti
            - __--env="NOME_ENV"__ questo argomento indica il nome dell'environment da utilizzare
            - __--overwrite=All__ questo argomento richiede allo script di sovrascrivere i files senza chiedere conferma
- Configurazione del database (se diverso dai dati predefiniti)
    - La configurazione del database va eseguita nel file __/common/config/main-local.php__ e i parametri da alterare sono i seguenti
        - __dsn__ contiene la stringa di connessione al database in cui va indicato
            - __host__ indirizzo o IP del server MySQL a cui connettersi
            - __dbname__ il nome del database da utilizzare
        - __username__ il nome utente per accedere al database applicativo
        - __password__ la password per il medesimo utente
- Esecuzione delle migration (se non si sceglie di importare un dump di dati già esistente)
    - Posizionandosi nella root del progetto sarà presente l'eseguibile per la Linea di Comando chiamato __yii__ (in ambiente Windows è possibile usare __yii.bat__)
        - __php yii migrate up__ avvia la procedura guidata di migrazione per creare la struttura del database ed installare il set minimo di dati per il funzionamento applicativo
        - __php yii migrate down__ consente di annullare l'ultima migration eseguita secondo l'ordinamento numerico delle stesse
- Installazione Componente CMS
    - Per procedere all'abilitazione del componente CMS sarà necessario eseguire alcune azioni da riga di comando
      - __php vendor/bin/luya migrate__ eseguirà le migration di competenza del CMS, per consentirne il funzionamento
      - __php vendor/bin/luya import__ si occupa di allineare un set di informazioni base sulla base di moduli e componenti abilitati
      - __php vendor/bin/luya admin/setup__ da eseguire esclusivamente alla prima installazione, e consente di definire le credenzioni e la definizione iniziale dell'applicazione CMS

Altre Configurazioni
-------------------

Una volta fatta l'installazione base dell'applicativo e verificata l'operatività dello stesso è possibile personalizzare le altre configurazioni

Alcune delle principali componenti da configurare sono le seguenti

- __Mailer__
    - Il mailer è il componente che si occupa dell'invio delle mail all'interno della piattaforma, sarà necessario per l'uso di questa componente applicativa la configurazione dei seguenti parametri
        - __host__ l'hostname del servizio SMTP da utilizzare
        - __username__ il nome utente del mailer
        - __password__ la password per il medesimo utente
        - __port__ la porta del servizio
        - __encryption__ il protocollo di cifratura (se presente) per la connessione al servizio di posta
- __Caches__
    - I componenti per la gestione della cache (di cui possono esserci istanze multiple che differiscono per scopo e configurazione), la principale istanza è chiamata __cache__ all'interno dei componenti
        - Il principale valore di configurazione su cui agire è __class__ che indica quale tipologia di cache è implementata, le principali implementazioni disponibili sono le seguenti
            - __yii\caching\DummyCache__ Questa implementazione impedisce del tutto l'uso della cache, utile nello sviluppo ma sconsigliato in ambienti di produzione
            - __yii\caching\FileCache__ Cache su Filesystem
            - __yii\caching\DbCache__ Cache su Database
            - __yii\caching\MemCache__ Cache in Memoria usando MemCached
- __Logging__
    - La definizione della gestione dei log applicativi può essere fatta mediante il componente __log__
        - Per definire la cofigurazione dei log bisognerà quindi agire sul componente __log__ dove è possibile definire uno o più __targets__ che rappresenteranno la destinazione dei log stessi

