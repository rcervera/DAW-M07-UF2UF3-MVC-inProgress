
:i
# DAW-M07-UF2UF3-MVC-inProgress

Aplicació per gestionar usuaris, projectes, equips, tasques...

1 ) En una primera versió aprenem a connectar-nos a la BD
,a recuperar informació, afegir-ne de nova i a eleminar registres
Tot en una única pàgina.

2) En la segona versió creem una classe anomenada Usuaris que contindrà
tot el codi d'accés a la BD, estructurada en mètodes per : afegir, esborrar, recuperar 1 registre, recuper-los tots,...
També separem el codi que conté html en fitxers separats.
Aixó aconseguim estructurar una mica més l'aplicació. La classe Usuaris formarà part del model de l'aplicació.
Els fitxers llistat.php i formnew.php que contenen el codi en html serà part de la vista.
Esperem poder separar la nostra aplicació en 3 capes: M-V-C Model vista Controlador.

3)Hem estructurat el codi del controlador index.php en diferents m�todes. Hem posat un switch que crida cada un d'aquest m�todes segons un par�metre GET anomenat operaci�.
Hem afegit la vista formupdate per a poder actualitzar la informaci� d'un usuari. Hem afegit 2 m�todes al controlador, un per mostrar el formulari i l'altre per desar la informaci� enviada a trav�s d'aquest formulari. 
