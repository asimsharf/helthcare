public.ecr.aws/h8v3n3e4/expressapp

aws ecr-public get-login-password --region us-east-1 | docker login --username AWS --password-stdin public.ecr.aws/h8v3n3e4

docker build -t expressapp .

docker tag expressapp:latest public.ecr.aws/h8v3n3e4/expressapp:latest

docker push public.ecr.aws/h8v3n3e4/expressapp:latest
