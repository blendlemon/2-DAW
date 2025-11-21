| Característica                          | **GET**                                                    | **POST**                                                    |
| --------------------------------------- | ---------------------------------------------------------- | ----------------------------------------------------------- |
| **Visibilidad**                         | ✅ Visible en la URL                                        | ❌ No visible en la URL                                      |
| **Historial del navegador**             | ✅ Se guardan los parámetros                                | ❌ No se guardan                                             |
| **Reenvío de datos (refrescar página)** | ⚠️ Puede causar reenvío automático sin aviso               | ✅ Navegador advierte antes de reenviar                      |
| **Tamaño de datos**                     | ❌ Limitado (~2048 caracteres según navegador/servidor)     | ✅ Sin límite teórico                                        |
| **Tipos de datos**                      | ❌ Solo texto (ASCII)                                       | ✅ Texto y archivos (incluye binarios)                       |
| **Codificación (enctype)**              | `application/x-www-form-urlencoded`                        | `application/x-www-form-urlencoded` o `multipart/form-data` |
| **Seguridad**                           | ❌ Menos seguro: datos en URL, historial, logs del servidor | ✅ Más seguro: no se expone en URL ni historial              |
| **Uso recomendado**                     | ✅ Búsquedas, filtros, navegación                           | ✅ Formularios con datos sensibles (login, registro, pago)   |
| **Cacheable**                           | ✅ Sí, se puede almacenar en caché                          | ❌ No, no se debe cachear                                    |
| **Hackeo (manipulación)**               | ❌ Fácil de alterar (incluso por script kiddies)            | ✅ Más difícil de manipular                                  |
| **Restricciones de caracteres**         | ❌ Solo caracteres ASCII válidos en URL                     | ✅ Permite cualquier tipo de dato (incluye binarios)         |
