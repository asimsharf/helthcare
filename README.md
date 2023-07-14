```bash
public.ecr.aws/h8v3n3e4/expressapp
aws ecr-public get-login-password --region us-east-1 | docker login --username AWS --password-stdin public.ecr.aws/h8v3n3e4
docker build -t expressapp .
docker tag expressapp:latest public.ecr.aws/h8v3n3e4/expressapp:latest
docker push public.ecr.aws/h8v3n3e4/expressapp:latest
```
```bash
Available commands in helthcare project (make help):
make up - start services
make artisan - run artisan command
make stop - stop services
make restart - restart services
make rm - remove services
make rmi - remove images
make logs - show logs
make exec - execute command
make clean - clean docker
make install - install dependencies
make dev - run development
make migrate - run migrations and seeders
make update - update dependencies
make save - save image
make load - load image
make run - run image
make build - build image
make push - push image
make pull - pull image
make test - run tests
make clear - clear cache
make storage_link - create symbolic link
make backup - backup database
make backupproject - backup project
make db_backup - backup database
make aws - push image to AWS
make help - show help
```