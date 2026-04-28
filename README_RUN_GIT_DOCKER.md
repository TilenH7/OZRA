# OZRA aplikacija — zagon, Docker, Git

## Kam daš datoteke

Celoten projekt naj izgleda takole:

```txt
OZRA/
├── Dockerfile
├── docker-compose.yml
├── apache.conf
├── db/
│   └── init.sql
└── app/
    ├── composer.json
    ├── config/
    │   └── app_local.php
    ├── src/
    ├── templates/
    └── webroot/
        └── css/
            └── ozra.css
```

Če že imaš svoj `OZRA` folder, samo skopiraj datoteke iz tega ZIP-a čez obstoječe datoteke.

## Zagon z Dockerjem

V terminalu pojdi v root folder projekta, torej tja, kjer je `docker-compose.yml`:

```bash
cd OZRA
```

Prvi zagon:

```bash
docker compose up --build
```

Potem odpri:

```txt
http://localhost:8080
```

Zagon v ozadju:

```bash
docker compose up -d --build
```

Ustavi aplikacijo:

```bash
docker compose down
```

Ustavi aplikacijo in pobriši tudi MySQL podatke:

```bash
docker compose down -v
```

Če spremeniš `db/init.sql` in hočeš, da se baza ponovno naloži, moraš uporabiti `down -v`, ker Docker drugače obdrži star volumen baze.

## Composer ukazi

Če želiš ročno zagnati composer v containerju:

```bash
docker compose exec web composer install
```

CakePHP shell:

```bash
docker compose exec web bin/cake
```

## Git commit

Preveri spremembe:

```bash
git status
```

Dodaj vse datoteke:

```bash
git add .
```

Naredi commit:

```bash
git commit -m "Dodaj OZRA dizajn in Docker zagon"
```

Pošlji na GitHub:

```bash
git push origin main
```

Če ti napiše, da veja ni `main`, preveri:

```bash
git branch
```

in uporabi ime svoje veje, npr.:

```bash
git push origin master
```

## Uporabni Docker debug ukazi

Logi web aplikacije:

```bash
docker compose logs -f web
```

Logi baze:

```bash
docker compose logs -f db
```

Vstop v web container:

```bash
docker compose exec web bash
```

Vstop v MySQL:

```bash
docker compose exec db mysql -u programski_dostop -p kuharji
```

Geslo je:

```txt
geslo123
```
