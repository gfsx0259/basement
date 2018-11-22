# Docker and Kubernetes demo project

Проект с примером инфраструктуры php проекта. 
## Зависимости:
- dapp
- minikube
- docker
- docker-compose

## Полезные команды:

Собрать образы и отправить в регистр:
```bash
dapp dimg bp --tag master reg.bigln.ru/basement --build-dir ~/dapp_build/basement
```
Запустить проект в minikube:
```bash
helm install --name=ss ./k8s
```
Просмотреть логи контейнера:
```bash
kubectl logs basement-0 -c nginx-basement
kubectl logs basement-0 -c php-basement
```

Перейти в контейнер:
```bash
kubectl exec -it basement-0 -c=php-basement sh
kubectl exec -it basement-0 -c=nginx-basement sh
```

Просмотреть информацию о релизе:
```bash
helm status ss
```

Удалить релиз:
```bash
helm delete ss --purge
```

Просмотреть информацию о поде:
```bash
kubectl describe pod/basement-0
```

Также можно запустить приложение с помощью docker-compose:
```bash
docker-compose up -d
docker-compose down
```

Для доступа через ingress выполните:
```bash
echo "$(minikube ip) basement.app" | sudo tee -a /etc/hosts
```

Просмотреть конфигурацию ingress:
```bash
kubectl describe ingress basement-ingress
```