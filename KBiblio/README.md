# Bibliotecnologica

¡Bienvenido a **Bibliotecnologica**! Una sencilla aplicación web para gestionar tu colección de libros. Permite añadir, ver, buscar y eliminar libros de una manera fácil e intuitiva.

## 📚 Características

-   **Gestión de Libros**: Añade nuevos libros con título, autor y categoría.
-   **Visualización**: Muestra todos los libros en una tabla clara.
-   **Búsqueda Avanzada**: Busca libros por título, autor, categoría o una búsqueda general en todos los campos.
-   **Eliminación de Libros**: Elimina libros de tu colección.
-   **Persistencia de Datos**: Tus libros se guardan en la sesión, por lo que no los perderás al recargar la página (hasta que cierres el navegador o reinicies la biblioteca).
-   **Soporte Multilingüe**: Interfaz disponible en Español e Inglés.
-   **Tema Oscuro/Claro**: Cambia fácilmente entre el tema claro y oscuro para una mejor experiencia visual.
-   **Reiniciar Biblioteca**: Opción para borrar todos los libros y empezar de nuevo.

## 🚀 Instalación

Para poner en marcha Bibliotecnologica en tu máquina local, sigue estos pasos:

1.  **Clona el repositorio:**
    ```bash
    git clone <URL_DEL_REPOSITORIO>
    cd KBiblio
    ```
    (Reemplaza `<URL_DEL_REPOSITORIO>` con la URL real de tu repositorio de GitHub).

2.  **Asegúrate de tener PHP instalado** (versión 7.4 o superior es recomendable).

3.  **Instala Composer** si aún no lo tienes. Puedes descargarlo desde [getcomposer.org](https://getcomposer.org/).

4.  **Instala las dependencias de PHP:**
    ```bash
    composer install
    ```

5.  **Configura un servidor web** (como Apache o Nginx) para que apunte la raíz del documento a la carpeta `public/`.
    Alternativamente, puedes usar el servidor web incorporado de PHP para desarrollo:
    ```bash
    php -S localhost:8000 -t public/
    ```

6.  **Accede a la aplicación** en tu navegador web, usualmente en `http://localhost:8000` o la dirección que hayas configurado en tu servidor web.

## 📖 Uso

-   **Añadir un libro**: Utiliza el formulario de la izquierda para introducir el título, autor y categoría del libro, y haz clic en "Agregar Libro".
-   **Buscar un libro**: Usa la barra de búsqueda en la parte superior derecha. Puedes seleccionar si quieres buscar por "Título", "Autor", "Categoría" o "Otro" (que busca en todos los campos).
-   **Eliminar un libro**: Haz clic en el botón "Eliminar" junto al libro que deseas quitar de la lista.
-   **Cambiar idioma**: Usa el selector de idioma en la barra de navegación superior.
-   **Cambiar tema**: Usa el icono de sol/luna en la barra de navegación superior para alternar entre el tema claro y oscuro.
-   **Reiniciar**: El botón "Reiniciar Biblioteca" eliminará todos los libros y restaurará la aplicación a su estado inicial.

## 🛠️ Tecnologías Utilizadas

-   **PHP**: Lenguaje de programación backend.
-   **Composer**: Administrador de dependencias para PHP.
-   **HTML5**: Estructura de la página web.
-   **CSS (Tailwind CSS)**: Para estilos y diseño responsivo.
-   **Flowbite**: Componentes UI basados en Tailwind CSS y JavaScript.
-   **JavaScript**: Para interactividad del lado del cliente (cambio de tema, desplegables).

## 🤝 Contribuciones

¡Las contribuciones son bienvenidas! Si tienes ideas para mejorar Bibliotecnologica, no dudes en:

1.  Hacer un "fork" del repositorio.
2.  Crear una nueva rama (`git checkout -b feature/nueva-funcionalidad`).
3.  Realizar tus cambios y confirmarlos (`git commit -m 'feat: Añadir nueva funcionalidad X'`).
4.  Subir tus cambios (`git push origin feature/nueva-funcionalidad`).
5.  Abrir un "Pull Request".

## 📄 Licencia

