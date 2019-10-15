# Clonar repositorio de git
```bash
git clone https://github.com/SummaSolutions/seminario-m2.git
```

# Instalar docker y docker-compose 17.09.0-ce (>= 1.13.0)

Instalar repositorio de paquetes
```bash
    cd seminario-m2
    chmod +x install_docker.sh
    sudo ./install_docker.sh
```

Verificar versión
```bash
    docker --version
    docker-compose --version
```

Más detalles y opciones de instalación docker Windows
[https://docs.docker.com/docker-for-windows/install/](https://docs.docker.com/docker-for-windows/install/)

Más detalles y opciones de instalación Mac 
[https://docs.docker.com/docker-for-mac/install/](https://docs.docker.com/docker-for-mac/install/)

Más detalles y opciones de instalación docker-compose
[https://docs.docker.com/compose/install/#install-compose](https://docs.docker.com/compose/install/#install-compose)

**Reiniciar la sesión de usuario de Linux.**

# Setup de ambiente
```bash
bin/download 2.3.1
bin/setup
```

# Correr ambiente
```bash
bin/start
```

Visitar [https://local.magento2.com/](https://local.magento2.com/)

# Detener ambiente
```bash
bin/stop
```

# Eliminar ambiente
```bash
bin/down
```

# Ingresar al contenedor
```bash
bin/bash
```

# Ejecutar comandos de consola de Magento
```bash
bin/magento
```

# Instalar Magento
```bash
bin/magento setup:install --backend-frontname=admin --db-host=mysql --db-name=magento2 --db-user=magento2 --db-password=magento2 --base-url=https://local.magento2.com/ --use-secure-admin=0 --admin-user=admin --admin-password=admin --admin-email=admin@admin.net --admin-firstname=Dev --use-sample-data --admin-lastname=Dev --use-rewrites="1" --language="es_AR"
```

# Instalar Magento Automatico
```bash
bin/setup
```