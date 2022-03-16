# portal-compose
docker-compose repository for MaRDI

## Local installation
```
git clone --recurse-submodules git@github.com:MaRDI4NFDI/portal-compose.git
cd portal-compose
cp ./mediawiki/template.env ./.env
```

Change parameters for your local installation in .env as required, this file will not be committed.
Change at least the passwords and secret to any password for local usage:
```
MW_SECRET_KEY=some-secret-key
MW_ADMIN_PASS=change-this-password
DB_PASS=change-this-sqlpassword
```
Add the following lines at the end of your .env file, edit as required
```
# Local settings
WIKIBASE_HOST=localhost
WIKIBASE_PORT=8080    
WDQS_FRONTEND_PORT=8834
QUICKSTATEMENTS_HOST=localhost
QUICKSTATEMENTS_PORT=8840
RESTART=no
```

The local install has 2 additional containers:
* Selenium for running tests
* Openrefine for data manipulation

The local install also has open ports, so that the services can be accessed without using the reverse proxy
* Wikibase, http://localhost:8080
* WDQS Frontend, http://localhost:8834
* Quickstatements, http://localhost:8840
* OpenRefine, http://localhost:3333

Note that the containers for local development are set to not restart, 
so that they do not start automatically when you start your computer.

Some containers are pulled from special MaRDI images:
* wikibase and wikibase_jobrunner are pulled from https://github.com/MaRDI4NFDI/docker-wikibase 
* backup is pulled from https://github.com/MaRDI4NFDI/docker-backup
* quickstatements is pulled from https://github.com/MaRDI4NFDI/docker-quickstatements

## Start up the containers
Start-up the containers from the docker-compose file for development:
```
docker-compose -f docker-compose.yml -f docker-compose-dev.yml up -d
```
Stop the containers:
```
docker-compose -f docker-compose.yml -f docker-compose-dev.yml down
```

(Tipp: add these two commands to your `~/.bash_aliases`)

## Test locally
1. Start up the containers locally as explained above
2. Run the tests: `bash ./run_tests.sh`

## Develop locally

Create a docker-compose.override.yml like this
```docker-compse
version: '3.4'

services:
  wikibase:
      image: "ghcr.io/mardi4nfdi/docker-wikibase:dev"
    environment:
      XDEBUG_CONFIG: "remote_host=host.docker.internal"
    volumes:
     - ~/git/mediawiki/MathSearch:/var/www/html/extensions/MathSearch
```
Here `~/git/mediawiki/MathSearch` is the path of your local development checkout of the extension, you modify.

Eventually, add the docker-compose.override.yml file to your startup command:

Adjust host.docker.internal on linux as [described.](https://www.jetbrains.com/help/phpstorm/configuring-xdebug.html#configure-xdebug-wsl)
```bash
docker-compose -f docker-compose.yml -f docker-compose-dev.yml -f docker-compose.override.yml up -d
```
## Build on CI 
The containers will be built and tested automatically by GitHub after each commit on the main branch. The CI steps are defined in `.github/workflows/main.yml`.

Preparations **this has already been done on GitHub**:
* create a [GitHub environment](https://docs.github.com/en/actions/deployment/targeting-different-environments/using-environments-for-deployment) 
* call it "staging" (specified in .github/workflows/main.yml)
* set (required) these to test passwords:
```
MW_SECRET_KEY=some-secret-key
MW_ADMIN_PASS=change-this-password
DB_PASS=change-this-sqlpassword
```
* also set these environment variables:
```
WIKIBASE_HOST=localhost
WIKIBASE_PORT=8080

WDQS_FRONTEND_HOST=localhost
WDQS_FRONTEND_PORT=8834

QUICKSTATEMENTS_HOST=localhost
QUICKSTATEMENTS_PORT=8840

WB_PUBLIC_HOST_AND_PORT=localhost:8080
QS_PUBLIC_HOST_AND_PORT=localhost:8840

MW_ELASTIC_HOST=localhost
MW_ELASTIC_PORT=9200
```
## Deploy on the MaRDI server
* create a .env file (the defaults should be OK for the MaRDI server)
```
cp ./mediawiki/template.env ./.env
```
* set the passwords and key to real passwords in the .env file:
```
MW_SECRET_KEY=some-secret-key
MW_ADMIN_PASS=change-this-password
DB_PASS=change-this-sqlpassword
```
