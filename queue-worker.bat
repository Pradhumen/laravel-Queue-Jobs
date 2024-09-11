@echo off
cd C:\xampp\htdocs\eeeeeee
C:\xampp\\php\php.exe artisan queue:work --sleep=3 --tries=3 >> queue-worker.log 2>&1
