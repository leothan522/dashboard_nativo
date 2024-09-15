
# Crear enlaces simbólicos

### EN WINDOWS

* Buscar el CMD y ejecutar como administrador.

* Ejecutar el comando [mklink /j]() indicando:

    * Primero, entre comillas dobles la ruta para el enlace que se va a crear.

      ["ruta_destino_del_enlace"]()

    * Luego, separado por un espacio e igual entre comillas dobles la ruta de la carpeta a la que se quiere llegar con el enlace.

      ["ruta_de_origen_path"]()

      Ejemplo:

      mklink /j "{path}\public\storage" "{path}\storage\public"

  En el ejemplo anterior se debe reemplazar {path} por la ruta del proyecto.

        Ejemplo real:
        mklink /j "D:\laragon\www\dashboard\nativo\public\storage" "D:\laragon\www\dashboard\nativo\storage\public"   

### EN LINUX

* Abrir consola.
* El comando utilizado para crear el enlace simbólico de carpeta es:

  [ln -s [Specific file/directory] [symlink name]]()

  Por ejemplo, para vincular el directorio /user/local/downloads/logo a la carpeta /devisers, usa el siguiente comando:

        ln -s /user/local/downloads/logo /devisers

  Una vez que se crea un enlace simbólico y se adjunta a la carpeta /devisers, te llevará a /user/local/downloads/logo. 



