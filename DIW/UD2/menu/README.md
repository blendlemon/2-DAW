# README - menú (resumen de cambios)

Archivos modificados

- `menu.html`
  - Añadido `onclick` en el botón **Start Adventure** para abrir un vídeo de YouTube en nueva pestaña (autoplay y muted):

    Antes:
    ```html
    <button class="btn is-active" role="menuitem">Start Adventure</button>
    ```

    Ahora:
    ```html
    <button class="btn is-active" role="menuitem" onclick="window.open('https://www.youtube.com/embed/uSGIPIAikZU?autoplay=1&mute=1','_blank')">Start Adventure</button>
    ```

  - Añadido `onclick` en **Exit** para intentar cerrar la ventana:

    Antes:
    ```html
    <button class="btn" role="menuitem">Exit</button>
    ```

    Ahora:
    ```html
    <button class="btn" role="menuitem" onclick="window.close()">Exit</button>
    ```

  - Añadido un botón extra: `Boton a mayores`.

- `styles.css`
  - Eliminada la propiedad `aspect-ratio: 1 / 1;` en `.container` (antes el contenedor forzaba una proporción cuadrada).
  - Color del texto en `.btn` cambiado de `#f5e6d3` a `white`.
  - En `:hover` del botón se añadió una `background-image` (una imagen remota), lo que cambia el aspecto al pasar el ratón.

Fragmentos relevantes (estilos)

Antes (extracto):
```css
.container {
  width: 360px;
  aspect-ratio: 1 / 1;
  padding: 24px;
  border-radius: 48px;
}

.btn { color: #f5e6d3; }

.btn:hover { /* gradiente y sombras */ }
```

Ahora (extracto):
```css
.container {
  width: 360px;
  padding: 24px;
  border-radius: 48px;
}

.btn { color: white; }

.btn:hover {
  background-image: url(https://wallpapercave.com/wp/wp11022584.jpg);
}
