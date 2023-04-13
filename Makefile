RED		= \033[0;31m
GREEN	= \033[0;32m
YELLOW	= \033[0;33m
BLUE	= \033[0;34m
PURPLE	= \033[0;35m
CYAN	= \033[0;36m
NC		= \033[0m

SL := vendor/bin/sail

prt:
	@echo "$(CYAN)Printing variables...$(NC)"
	@echo "$(RED)RED$(NC)"
	@echo "$(GREEN)GREEN$(NC)"
	@echo "$(YELLOW)YELLOW$(NC)"
	@echo "$(BLUE)done$(NC)"

up:
	@echo "$(CYAN)Starting services...$(NC)"
	$(SL) up -d 																			# get services running		
	@echo "$(GREEN)Services started!$(NC)"

artisan:
	@echo "$(CYAN)Running artisan command: $(filter-out $@,$(MAKECMDGOALS))$(NC)"
	$(SL) artisan $(filter-out $@,$(MAKECMDGOALS))											# Run artisan command
	@echo "$(GREEN)Command executed!$(NC)"
												
stop:
	@echo "$(CYAN)Stopping services...$(NC)"
	$(SL) stop																				# stop services
	@echo "$(GREEN)Services stopped!$(NC)"

restart:
	@echo "$(CYAN)Restarting services...$(NC)"
	$(SL) stop																				# stop services
	$(SL) up -d 																			# get services running
	@echo "$(GREEN)Services restarted!$(NC)"

rm:
	@echo "$(CYAN)Removing services...$(NC)"
	$(SL) rm -f																				# remove services
	@echo "$(GREEN)Services removed!$(NC)"

rmi:
	@echo "$(CYAN)Removing images...$(NC)"
	$(SL) rmi -f																			# remove images
	@echo "$(GREEN)Images removed!$(NC)"
	
logs:
	@echo "$(CYAN)Showing logs...$(NC)"
	$(SL) logs sanedny-api/app -f															# show logs
	@echo "$(GREEN)Logs shown!$(NC)"

exec:
	@echo "$(CYAN)Executing command: $(filter-out $@,$(MAKECMDGOALS))$(NC)"
	$(SL) exec -it sanedny-api/app /bin/sh													# execute command
	@echo "$(GREEN)Command executed!$(NC)"

clean:
	@echo "$(CYAN)Cleaning docker...$(NC)"
	docker system prune -a -f																# clean docker
	@echo "$(GREEN)Docker cleaned!$(NC)"

install:
	@echo "$(CYAN)Installing dependencies...$(NC)"
	$(SL) composer install 																	# install dependencies
	$(SL) npm install				 														# install dependencies
	$(SL) artisan key:generate 																# generate application key
	$(SL) artisan storage:link 																# create symbolic link
	@echo "$(GREEN)Dependencies installed!$(NC)"

dev:
	@echo "$(CYAN)Running development...$(NC)"
	$(SL) npm run dev --watch 																# run development
	@echo "$(GREEN)Development run!$(NC)"

migrate:
	@echo "$(CYAN)Running migrations and seeders...$(NC)"
	$(SL) artisan migrate:fresh --seed 														# run migrations and seeders
	@echo "$(GREEN)Migrations and seeders run!$(NC)"

update:
	@echo "$(CYAN)Updating dependencies...$(NC)"
	$(SL) composer update 																	# update dependencies
	$(SL) npm install && npm run dev 														# update dependencies
	@echo "$(GREEN)Dependencies updated!$(NC)"

save:
	@echo "$(CYAN)Saving image...$(NC)"
	docker save sanedny-api/app:latest > sanedny-api.tar									# save image
	@echo "$(GREEN)Image saved!$(NC)"

load:
	@echo "$(CYAN)Loading image...$(NC)"
	docker load < sanedny-api.tar															# load image
	@echo "$(GREEN)Image loaded!$(NC)"

run:
	@echo "$(CYAN)Running image...$(NC)"
	docker run -it --rm --name sanedny-api -p 80:80 sanedny-api/app							# run image
	@echo "$(GREEN)Image run!$(NC)"

build:
	@echo "$(CYAN)Building image...$(NC)"
	$(SL) build --no-cache																	# build image
	@echo "$(GREEN)Image built!$(NC)"

push:
	@echo "$(CYAN)Pushing image...$(NC)"
	docker push sanedny-api/app																# push image
	@echo "$(GREEN)Image pushed!$(NC)"

pull:
	@echo "$(CYAN)Pulling image...$(NC)"
	docker pull sanedny-api/app																# pull image
	@echo "$(GREEN)Image pulled!$(NC)"

test:
	@echo "$(CYAN)Running tests...$(NC)"
	$(SL) artisan test																		# run tests
	@echo "$(GREEN)Tests run!$(NC)"

clear:
	@echo "$(CYAN)Clearing cache...$(NC)"
	$(SL) artisan cache:clear																# clear cache
	$(SL) artisan config:clear																# clear config
	$(SL) artisan route:clear																# clear route
	$(SL) artisan view:clear																# clear view
	$(SL) artisan optimize																	# optimize
	$(SL) artisan optimize:clear															# clear optimize
	$(SL) artisan clear																		# clear
	@echo "$(GREEN)Cache cleared!$(NC)"
storage_link:
	@echo "$(CYAN)Creating symbolic link...$(NC)"
	$(SL) artisan storage:link																# create symbolic link
	@echo "$(GREEN)Symbolic link created!$(NC)"
backup:
	@echo "$(CYAN)Backing up database...$(NC)"
	$(SL) artisan backup:run																# backup database
	@echo "$(GREEN)Database backed up!$(NC)"

backupproject:
	@echo "$(CYAN)Backing up project...$(NC)"
	$(SL) artisan backup:run --only-files													# backup project
	@echo "$(GREEN)Project backed up!$(NC)"


db_backup:
	@echo "$(CYAN)Backing up database...$(NC)"
	$(SL) artisan backup:run --only-db														# backup database
	@echo "$(GREEN)Database backed up!$(NC)"

aws:
	@echo "$(CYAN)Pushing image...$(NC)"
	aws ecr-public get-login-password --region us-east-1 | docker login --username AWS --password-stdin public.ecr.aws/h8v3n3e4
	docker build -t sanedny-api .
	docker tag sanedny-api:latest public.ecr.aws/h8v3n3e4/sanedny-api:latest
	docker push public.ecr.aws/h8v3n3e4/sanedny-api:latest
	@echo "$(GREEN)Image pushed!$(NC)"

key:
	@echo "$(CYAN)Generating application key...$(NC)"
	$(SL) artisan key:generate																# generate application key
	@echo "$(GREEN)Application key generated!$(NC)"

help:
	@echo "$(CYAN)Available commands:$(NC)"
	@echo "$(CYAN)make up$(NC) - start services"
	@echo "$(CYAN)make artisan$(NC) - run artisan command"
	@echo "$(CYAN)make stop$(NC) - stop services"
	@echo "$(CYAN)make restart$(NC) - restart services"
	@echo "$(CYAN)make rm$(NC) - remove services"
	@echo "$(CYAN)make rmi$(NC) - remove images"
	@echo "$(CYAN)make logs$(NC) - show logs"
	@echo "$(CYAN)make exec$(NC) - execute command"
	@echo "$(CYAN)make clean$(NC) - clean docker"
	@echo "$(CYAN)make install$(NC) - install dependencies"
	@echo "$(CYAN)make dev$(NC) - run development"
	@echo "$(CYAN)make migrate$(NC) - run migrations and seeders"
	@echo "$(CYAN)make update$(NC) - update dependencies"
	@echo "$(CYAN)make save$(NC) - save image"
	@echo "$(CYAN)make load$(NC) - load image"
	@echo "$(CYAN)make run$(NC) - run image"
	@echo "$(CYAN)make build$(NC) - build image"
	@echo "$(CYAN)make push$(NC) - push image"
	@echo "$(CYAN)make pull$(NC) - pull image"
	@echo "$(CYAN)make test$(NC) - run tests"
	@echo "$(CYAN)make clear$(NC) - clear cache"
	@echo "$(CYAN)make storage_link$(NC) - create symbolic link"
	@echo "$(CYAN)make backup$(NC) - backup database"
	@echo "$(CYAN)make backupproject$(NC) - backup project"
	@echo "$(CYAN)make db_backup$(NC) - backup database"
	@echo "$(CYAN)make aws$(NC) - push image to AWS"
	@echo "$(CYAN)make help$(NC) - show help"
