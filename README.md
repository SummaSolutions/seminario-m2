# Clonar repositorio de git
```bash
git clone https://github.com/SummaSolutions/seminario-m2.git
```

# Instalar docker

## Linux
Instalar repositorio de paquetes
```bash
    cd seminario-m2
    chmod +x install_docker.sh
    sudo ./install_docker.sh
```

**Reiniciar la sesión de usuario de Linux.**

## Windows
Más detalles y opciones de instalación docker Windows
[https://docs.docker.com/docker-for-windows/install/](https://docs.docker.com/docker-for-windows/install/)

## Mac
Más detalles y opciones de instalación Mac 
[https://docs.docker.com/docker-for-mac/install/](https://docs.docker.com/docker-for-mac/install/)



Verificar versión
```bash
    docker --version
    docker-compose --version
```

# Instalar Magento
```bash
bin/setup
```

## Configurar hosts file

## Linux y Mac
Editar el archivo `/etc/hosts`

Y agregar la siguiente linea al final:
```
127.0.0.1   magento2.localhost
```

## Windows
Seguir las instrucciones de [aquí](https://www.howtogeek.com/howto/27350/beginner-geek-how-to-edit-your-hosts-file/)

Y agregar la siguiente linea al final:
```
127.0.0.1   magento2.localhost
```


Visitar [https://magento2.localhost/](https://magento2.localhost/)

# Otros comandos útiles

## Prender ambiente
```bash
bin/start
```
## Detener ambiente
```bash
bin/stop
```

## Eliminar ambiente
```bash
bin/down
```

## Ingresar al contenedor
```bash
bin/bash
```

## Ejecutar comandos de consola de Magento
```bash
bin/magento
```

## Instalar Magento
```bash
bin/magento setup:install --backend-frontname=admin --db-host=mysql --db-name=magento2 --db-user=magento2 --db-password=magento2 --base-url=https://local.magento2.com/ --use-secure-admin=0 --admin-user=admin --admin-password=admin --admin-email=admin@admin.net --admin-firstname=Dev --use-sample-data --admin-lastname=Dev --use-rewrites="1" --language="es_AR"
```

