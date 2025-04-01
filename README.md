# ImpulsaLATAM: Donaciones

<p align="center">
  <img src="public/img/logo.png" alt="Logo ImpulsaLATAM" width="300">
</p>

## Concepto

ImpulsaLATAM es una organización que desarrolla soluciones tecnológicas innovadoras para enfrentar desafíos sociales en América Latina. Uno de sus proyectos principales, "ImpulsaLATAM: Donaciones", es una plataforma peer-to-peer que conecta directamente a personas con necesidades médicas con potenciales donantes, sin intermediarios.
La plataforma permite a los solicitantes crear perfiles detallados sobre sus necesidades médicas, subir evidencias para verificar la autenticidad de sus casos, y especificar exactamente qué insumos, medicamentos o equipos requieren. Los donantes pueden explorar estos casos, contactar directamente con los solicitantes y realizar donaciones que son verificadas mediante comprobantes, actualizando así las barras de progreso de cada caso.

A diferencia de otras plataformas, ImpulsaLATAM: Donaciones no recibe ni administra dinero o donaciones directamente - funciona exclusivamente como un puente transparente entre solicitantes y donantes.

## Características Principales

- Creación de perfiles detallados para solicitantes de insumos médicos
- Subida de evidencias médicas para verificar la autenticidad de casos
- Sistema geolocalizado que muestra casos por país dentro de América Latina
- Barras de progreso que indican el avance de cada solicitud
- Verificación de donaciones mediante comprobantes
- Comunicación directa entre donantes y solicitantes
- Agregación de necesidades similares para mostrar demanda total
- Cierre automático de casos cuando se completan las donaciones requeridas

## Misión y Visión

ImpulsaLATAM surge al observar las urgentes necesidades diarias de personas que enfrentan barreras para acceder a la atención médica adecuada. Los hospitales a lo largo de América Latina afrontan una severa escasez de recursos médicos que impacta a millones de personas en toda la región.

La visión es convertir a ImpulsaLATAM en una iniciativa que unifique esfuerzos para resolver nuestros propios desafíos a través de la colaboración entre personas con y sin formación técnica, el sector privado y organizaciones, trabajando juntos para apoyar a quienes más lo necesitan.

La misión es crear un ecosistema de apoyo médico transparente, donde las donaciones lleguen DIRECTAMENTE a sus destinatarios, eliminando intermediarios y costos administrativos. Esta plataforma está diseñada para garantizar credibilidad y transparencia en cada fase del proceso.


## Requisitos previos

Para utilizar esta aplicación, necesitarás:

- PHP 8.4.x
- Composer 2.0
- Node.js 18.0
- NPM 10.5.x o superior
- MySQL 8.0 o MariaDB 10.5 o superior

## Instrucciones de instalación

### Paso 1: Clonar el repositorio

```bash
git clone https://github.com/impulsalatam/donaciones.impulsalatam.org.git
cd donaciones.impulsalatam.org
```

### Paso 2: Instalar dependencias

```bash
composer install
npm install
```

### Paso 3: Configurar el entorno

```bash
cp .env.example .env
php artisan key:generate
```

Edita el archivo `.env` con la configuración de tu base de datos y otras variables de entorno necesarias.

### Paso 4: Configurar la base de datos

```bash
php artisan migrate
php artisan db:seed
```

### Paso 5: Compilar los assets

```bash
npm run dev
```

### Paso 6: Iniciar el servidor

```bash
php artisan serve
```

La aplicación estará disponible en `http://localhost:8000`.

Se recomienda utilizar Laravel Herd para tener acceso al dominio en local:
`donaciones.impulsalatam.org.test`

## Stack Tecnológico

### Backend
- **Laravel 12**: Framework PHP robusto y elegante
- **MySQL/MariaDB**: Sistema de gestión de bases de datos
- **PHP 8.4+**: Lenguaje de programación del lado del servidor

### Frontend
- **Tailwind CSS 4**: Framework CSS utility-first
- **Vite**: Herramienta de construcción frontend moderna

## Contribución

Agradecemos tu interés en contribuir a ImpulsaLATAM: Donaciones. Para participar en el desarrollo:

1. Haz un fork del repositorio
2. Crea una nueva rama para tu funcionalidad (`git checkout -b feature/nueva-funcionalidad`)
3. Realiza tus cambios y haz commit (`git commit -m 'Añade nueva funcionalidad'`)
4. Sube tus cambios a tu fork (`git push origin feature/nueva-funcionalidad`)
5. Crea un Pull Request

### Guías de contribución

- Sigue las convenciones de codificación del proyecto
- Asegúrate de que tus cambios pasen todas las pruebas
- Documenta adecuadamente cualquier nueva funcionalidad
- Mantén un enfoque en la accesibilidad y la experiencia de usuario

Para reportar errores o solicitar nuevas funcionalidades, por favor utiliza la sección de Issues en GitHub.

## Licencia

Este proyecto está licenciado bajo [MIT License](LICENSE).

---

© 2025 ImpulsaLATAM.
