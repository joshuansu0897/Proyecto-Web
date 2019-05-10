# Public View
nada mas puede leer y ver los articulos.

![public index](https://i.imgur.com/lDjJsnn.png)

![public category](https://i.imgur.com/cuwHhNS.png)

# Creator View
puede ver, editar, crear y eliminar articulos, siempre y cuando
el sea el autor de esos articulos.

![creator category](https://i.imgur.com/M4K9nAY.png)

![creator create article](https://i.imgur.com/eJ2PqLL.png)

![creator created article](https://i.imgur.com/aY7QXry.png)

# Admin View
puedes ver, editar, crear y eliminar todos los articulos.
puede crear mas usuarios con el rol de creador o administrador.
puede crear nuevas categorias (solo crear).

![admin category](https://i.imgur.com/zdRBIt0.png)

![admin usuarios](https://i.imgur.com/JD1gI6v.png)

![admin create category](https://i.imgur.com/MJiNSub.png)

# Docker

para correr este proyecto con docker

```
docker run --name web-app -p 41061:22 -p 41062:80 -d -v $PWD:/www tomsik68/xampp
```

ir a ```http://localhost:41062/phpmyadmin/``` importar ```web_proyecto.sql```

## Necesario
Tienes que ir a la tabla ```Usuario``` y agregar un nuevo usuario con los siguientes datos.
##### Funciona asi porque fue lo que se solicito

```
id: 1
username: admin
password: $2y$10$91b0qlbJ13mYtWtI.O9UxOknavcbaZXDE2hcBP39ia7O2XHqaqkpi
level: 2
```

query
```
INSERT INTO `Usuario` (`id`, `username`, `password`, `level`) VALUES ('1', 'admin', '$2y$10$91b0qlbJ13mYtWtI.O9UxOknavcbaZXDE2hcBP39ia7O2XHqaqkpi', '2')
```

Listo. ya puedes navegar a ```http://localhost:41062/www/public/```

#### Credenciales
el **password** del usuario ```admin``` es ```admin```, lo que se guarda en la DataBase es el hash
```
user:password
admin:admin
```