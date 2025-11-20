# Evolución histórica de Internet
- **1969**: ARPANET (primera red)
- **1972**: Correo electrónico
- **1974**: TCP/IP se convierte en estándar
- **1983**: TCP/IP se convierte en estándar
- **1984**: DNS (Sistema de Nombre de Domino)
- **1989**: Tim Berners-Lee inventa la WWW
- **1990**: Primer servidor (httpd) y navegador (WorldWideWeb)
- **1993**: Navegador Mosaic
- **1994**: W3C (World Wide Web Consortiun)
---
# Modelo de Capas de internet

1. **Acceso a red (físico)**: Ethernet, Wi-Fi, DSL, FTTH, WiMAX
2. **Red**: IP (IPv4/IPv6), NAT
3. **Transporte**: TCP (fiable), UDP (no fiable)
4. **Aplicación**: HTTP, SMTP, FTP, DNS, BitTorrent, etc.
---
# Protocolos de Acceso a Red

- **Ethernet**: LAN, 10Mbps a 10Gbps
- **Wi-Fi**: IEEE 802.11 (a, b, g, n)
- **DSL/ADSL**: sobre línea telefónica
- **FTTH**: fibra óptica hasta el hogar
- **WiMAX**: acceso inalámbrico de largo alcance
---
# Protocolo IP (Nivel de Red)

- **IPv4**: 32 bits (~4.3 mil millones de direcciones)
- **IPv6**: 128 bits (cantidad masiva de direcciones)
- **NAT**: permite compartir IPs públicas
	- **NAPT**: traduce IP + puerto
	- **Port forwarding**: abre puertos específicos
---
# Protocolos de transporte

- **TCP**: orientado a conexión, fiable, con control de flujo
- **UDP**M: sin conexión, no fiable, ligero, ideal para redes locales o tiempo real
---
# Protocolos de Aplicación

**Servicios tradicionales:**

- **DNS**: resuelve nombres a IPs
- **SMTP / POP / IMAP**: correo electrónico
- **FTP / TFTP**: transferencia de archivos
- **Telnet / SSH**: acceso remoto
- **HTTP**: web
- **NTP**: sincronización de tiempo
- **BitTorrent**: P2P
- **RPC / JAVA RMI / CORBA**: comunicación entre aplicaciones
---
# Estadísticas de Uso (2011)

- **Navegación web**: 53,6%
- **Entretenimiento en tiempo real**: 29,5%
- **P2P**: 14.3%
- **Redes sociales**: 9.4%
---
# DNS (Sistema de Nombres de Dominio)

- Jerárquico: raíz ---> dominios de nivel superior (TLD) ---> dominios
- **Servidores**:
	- **Raíz**: 13 en el mundo
	- **Primarios**: autoridad de zona
	- **Secundarios**: réplicas
	- **Locales / caché**: ISP o sistema operativo
	- **Comandos útiles**: `host`, `dig`, `nslookup`
---
# Arquitectura de Aplicaciones

**Cliente-Servidor**

- Cliente se conecta al servidor
- Servidor siempre activo, con IP fija
- Escalabilidad mediante granjas de servidores

**P2P (Peer-to-Peer**)

- Nodos se comunican directamente
- No hay servidor central
- Más escalable y robusto, pero difícil de administrar

**Tipos de P2P**

- **Centralizado** (Napster)
- **Híbrido** (BitTorrent)
- **Puro** (Gnutella, Kademlia)
---
# Programación de Redes

**Sockets**

- Socket = **IP** + **Puerto**
- **Tipos**:
	- **TCP** (**Stream**): conexión fiable
	- **UDP (Datagram)**: sin conexión
	- **Raw**: acceso a bajo nivel

**Programación en Java**

- **Clases clave**:
	- `Socket`, `ServerSocket` (TCP)
	- `DatagramSocket`, `DatagramPacket` (UDP)
	- `InetAddress`, `URL`
- **Ejemplos**: cliente y servidor de eco (TCP y UDP)