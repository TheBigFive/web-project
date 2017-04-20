README was clean

# git commando's 
## veranderen branch
git checkout -b naam

## updaten van git
git add .
git commit -m 'tekst'
git push origin naam

## afhalen van git
git pull origin master

## git master naar eigen branch
git rebase master
git merge origin/master

## indien probleem met laravel (whoops, there seems to be ...)
## of link naar database veranderd
.env file lokaal aanpassen/bijwerken

# databank .env file
DB_CONNECTION=mysql
DB_HOST=mysql137.hosting.combell.com
DB_PORT=3306
DB_DATABASE=ID211210_thebigf
DB_USERNAME=ID211210_thebigf
DB_PASSWORD=thebigfive123