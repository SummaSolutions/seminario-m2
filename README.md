# Instalar docker 17.09.0-ce (>= 1.13.0)

Instalar repositorio de paquetes
```bash
    sudo apt-get update
    sudo apt-get install apt-transport-https ca-certificates curl software-properties-common
    curl -fsSL https://download.docker.com/linux/ubuntu/gpg | sudo apt-key add -
    sudo apt-key fingerprint 0EBFCD88
    sudo add-apt-repository "deb [arch=amd64] https://download.docker.com/linux/ubuntu $(lsb_release -cs) stable"
```

Para Linux Mint, reemplazar la última línea por:
```bash
    sudo add-apt-repository "deb [arch=amd64] https://download.docker.com/linux/ubuntu xenial stable"
```

Agregar paquete
```bash
    sudo apt-get update
    sudo apt-get install docker-ce
```

Verificar versión
```bash
    test:
    docker --version
```

Más detalles y opciones de instalación
[https://docs.docker.com/engine/installation/linux/docker-ce/ubuntu/#if-you-need-to-use-aufs](https://docs.docker.com/engine/installation/linux/docker-ce/ubuntu/#if-you-need-to-use-aufs)

# Intalar docker-compose 1.17.0

Agregar paquete
```bash
    sudo curl -L https://github.com/docker/compose/releases/download/1.17.0/docker-compose-`uname -s`-`uname -m` -o /usr/local/bin/docker-compose
    sudo chmod +x /usr/local/bin/docker-compose
    sudo ln -s /usr/local/bin/docker-compose /usr/bin/docker-compose

```

Verificar versión
```bash
    docker-compose --version
```

Más detalles y opciones de instalación
[https://docs.docker.com/compose/install/#install-compose](https://docs.docker.com/compose/install/#install-compose)

**Reiniciar la sesión de usuario de Linux.**

# Clonar repositorio de git
```bash
git clone git@github.com:SummaSolutions/seminario-m2.git
```

# Setup de ambiente
```bash
cd seminario-m2
docker-compose run --rm setup
```

# Correr ambiente
```bash
docker-compose up
```

Visitar [http://m2.localhost:8000/](http://m2.localhost:8000/)

# Detener ambiente
```bash
docker stop magento2dockercompose_app_1 magento2dockercompose_phpfpm_1 magento2dockercompose_db_1
```

# Ingresar al bash del web server
```bash
docker exec -it magento2dockercompose_app_1 /bin/bash
```


Para más información ver documentación de [Magento 2 Docker Composer](https://github.com/mageinferno/magento2-docker-compose)
