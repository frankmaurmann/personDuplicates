Installationsanleitung:

Voraussetzungen:
Folgende Software muss installiert sein:
- git (https://git-scm.com/book/en/v2/Getting-Started-Installing-Git)
- composer (https://getcomposer.org/download/)
- docker (https://docs.docker.com/engine/install/)

Installation:
1. Repository auschecken
  - git clone git@github.com:frankmaurmann/personDuplicates.git oder 
  - git clone https://github.com/frankmaurmann/personDuplicates.git
2. docker-compose up --build
3. composer install
4. SQL Demo Datei master.sql ins Projektverzeichnis kopieren
5. Neues Terminal öffnen
6. docker ps (um Datenbank Containernamen zu bekommen z.B. personduplicates-database-1)
7. docker cp master.sql personduplicates-database-1:/master.sql  
8. docker exec -it personduplicates-database-1 bash
9. mariadb --user='db' --password='db' db < 'master.sql'
10. exit
11. symfony serve -d
12. Browser öffnen und Api Request aufrufen: http://127.0.0.1:8000/dubletten
13. Api Request mit verschiedenen Parametern aufrufen 
  - Mögliche Parameter: name, vorname, strasse, plz, ort (name, vorname werden per Default immer gesetzt)
  - Bsp: http://127.0.0.1:8000/dubletten?fields=ort,plz
