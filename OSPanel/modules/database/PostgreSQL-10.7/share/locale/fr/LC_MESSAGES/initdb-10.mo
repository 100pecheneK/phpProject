��    �        �   
      �  R   �     �  
   
       -   &  @   T  `   �  �   �  W   �  W       i  A   p  5   �  J   �     3  6   O  P   �  C   �  :     Q   V  5   �  ]   �  4   <  B   q  H   �  G   �  >   E  4   �  9   �  3   �  ?   '  /   g  -   �  5   �  4   �  >   0  y   o  (   �  #     ,   6  -   c  7   �  (   �  6   �  ,   )  '   V  5   ~  F   �  "   �  <     &   [  -   �  -   �  !   �  1      ?   2  &   r  /   �  +   �  =   �  !   3  "   U  6   x  +   �     �  #   �  /     0   F  $   w  &   �     �  $   �  ~     1   �  <   �     �  G     3   Z  J   �  �   �     �       �   C   �       !  ,   :!  -   g!  !   �!     �!  J   �!  0   "  4   K"  R   �"  K   �"  "   #  !   B#  �   d#  d   �#     O$     `$  �   $  O   %  R   S%  K   �%     �%     &     )&  <   A&  ;   ~&  �   �&  @   K'  ;   �'    �'  u   �(  q   O)  f   �)  s   (*  &   �*     �*  t   �*  /   @+     p+  &   +  0   �+  .   �+  )   ,  )   0,     Z,     q,  &   �,  #   �,      �,  $   �,  (   -  +   =-  "   i-     �-  "   �-  !   �-  ,   �-  $   .  *   >.  %   i.  !   �.     �.     �.  0   �.     /     ./     6/     :/     I/  -   [/     �/  &   �/  %   �/  3   �/     (0     B0  (   V0  �  0  f   !2     �2     �2     �2  6   �2  `   �2  �   \3  �   �3  �   �4  �   m5  �  �5  �   u7  7   �7  �   .8  !   �8  <   �8     9  |   �9     :  f   �:  P   �:  �   F;  M   �;  <   $<  t   a<  J   �<  M   !=  X   o=  ?   �=  >   >  6   G>  &   ~>  9   �>  d   �>  i   D?  O   �?  �   �?  6   �@  2   �@  4   -A  5   bA  A   �A  4   �A  >   B  8   NB  4   �B  E   �B  m   C  A   pC  T   �C  4   D  ;   <D  =   xD  0   �D  A   �D  E   )E  2   oE  H   �E  >   �E  U   *F  J   �F  1   �F  T   �F  8   RG     �G  J   �G  U   �G  E   IH  :   �H  5   �H  &    I  #   'I  �   KI  R   �I  A   #J  '   eJ  `   �J  E   �J  f   4K  �   �K     �L  3   �L  y   �L  F   QM  Q   �M  A   �M  6   ,N     cN  x   }N  G   �N  H   >O  �   �O  a   P  C   rP  ?   �P  �   �P  s   �Q     R  9   7R  �   qR  h   "S  W   �S  \   �S  *   @T     kT     �T  K   �T  6   �T  �   (U  _   �U  O   V  3  `V  {   �W  �   X  �   �X  ~   -Y  2   �Y     �Y  �   �Y  7   qZ     �Z  5   �Z  9   �Z  7   '[  3   _[  3   �[     �[     �[  4   �[  /   *\  +   Z\  2   �\  1   �\  @   �\  /   ,]  #   \]  -   �]  +   �]  =   �]  5   ^  T   N^  *   �^  +   �^     �^  #   _  8   >_     w_     �_     �_     �_     �_  2   �_      `  <   $`  ;   a`  E   �`  '   �`     a  =   &a            r   7   *       �   �              �       M       j   8   K       Y      �   �      N   �   5   ~   <   p   L       f                  x              c   S   X   m   y   {           �      0   w      �       z   �   k           �   _   J       @   ,          e          1   &   �   A       �          ^   U   �   %   �   �   V   �                  :   Z                   2   W   .   �   '   -       O          �   4   �       �   g   F   �           C              B       �          ;          +   !       (   �      �   �   o                         H   �      G   T               [   s   
       d   �   >   )              ]   "          I       v   b   �       u   D       Q   \       q   �   E   h                 �      3   	      $   /                 �   =   i   l   6   }   R   9   #          P       |   �   ?   t   n   `       a       �    
If the data directory is not specified, the environment variable PGDATA
is used.
 
Less commonly used options:
 
Options:
 
Other options:
 
Report bugs to <pgsql-bugs@postgresql.org>.
 
Success. You can now start the database server using:

    %s

 
Sync to disk skipped.
The data directory might become corrupt if the operating system crashes.
 
WARNING: enabling "trust" authentication for local connections
You can change this by editing pg_hba.conf or using the option -A, or
--auth-local and --auth-host, the next time you run initdb.
       --auth-host=METHOD    default authentication method for local TCP/IP connections
       --auth-local=METHOD   default authentication method for local-socket connections
       --lc-collate=, --lc-ctype=, --lc-messages=LOCALE
      --lc-monetary=, --lc-numeric=, --lc-time=LOCALE
                            set default locale in the respective category for
                            new databases (default taken from environment)
       --locale=LOCALE       set default locale for new databases
       --no-locale           equivalent to --locale=C
       --pwfile=FILE         read password for the new superuser from file
   %s [OPTION]... [DATADIR]
   -?, --help                show this help, then exit
   -A, --auth=METHOD         default authentication method for local connections
   -E, --encoding=ENCODING   set default encoding for new databases
   -L DIRECTORY              where to find the input files
   -N, --no-sync             do not wait for changes to be written safely to disk
   -S, --sync-only           only sync data directory
   -T, --text-search-config=CFG
                            default text search configuration
   -U, --username=NAME       database superuser name
   -V, --version             output version information, then exit
   -W, --pwprompt            prompt for a password for the new superuser
   -X, --waldir=WALDIR       location for the write-ahead log directory
   -d, --debug               generate lots of debugging output
   -k, --data-checksums      use data page checksums
   -n, --no-clean            do not clean up after errors
   -s, --show                show internal settings
  [-D, --pgdata=]DATADIR     location for this database cluster
 %s initializes a PostgreSQL database cluster.

 %s: "%s" is not a valid server encoding name
 %s: WAL directory "%s" not removed at user's request
 %s: WAL directory location must be an absolute path
 %s: WARNING: cannot create restricted tokens on this platform
 %s: cannot be run as root
Please log in (using, e.g., "su") as the (unprivileged) user that will
own the server process.
 %s: could not access directory "%s": %s
 %s: could not access file "%s": %s
 %s: could not allocate SIDs: error code %lu
 %s: could not change permissions of "%s": %s
 %s: could not change permissions of directory "%s": %s
 %s: could not create directory "%s": %s
 %s: could not create restricted token: error code %lu
 %s: could not create symbolic link "%s": %s
 %s: could not execute command "%s": %s
 %s: could not find suitable encoding for locale "%s"
 %s: could not find suitable text search configuration for locale "%s"
 %s: could not fsync file "%s": %s
 %s: could not get exit code from subprocess: error code %lu
 %s: could not open directory "%s": %s
 %s: could not open file "%s" for reading: %s
 %s: could not open file "%s" for writing: %s
 %s: could not open file "%s": %s
 %s: could not open process token: error code %lu
 %s: could not re-execute with restricted token: error code %lu
 %s: could not read directory "%s": %s
 %s: could not read password from file "%s": %s
 %s: could not rename file "%s" to "%s": %s
 %s: could not start process for command "%s": error code %lu
 %s: could not stat file "%s": %s
 %s: could not write file "%s": %s
 %s: data directory "%s" not removed at user's request
 %s: directory "%s" exists but is not empty
 %s: encoding mismatch
 %s: failed to remove WAL directory
 %s: failed to remove contents of WAL directory
 %s: failed to remove contents of data directory
 %s: failed to remove data directory
 %s: failed to restore old locale "%s"
 %s: file "%s" does not exist
 %s: file "%s" is not a regular file
 %s: input file "%s" does not belong to PostgreSQL %s
Check your installation or specify the correct path using the option -L.
 %s: input file location must be an absolute path
 %s: invalid authentication method "%s" for "%s" connections
 %s: invalid locale name "%s"
 %s: invalid locale settings; check LANG and LC_* environment variables
 %s: locale "%s" requires unsupported encoding "%s"
 %s: must specify a password for the superuser to enable %s authentication
 %s: no data directory specified
You must identify the directory where the data for this database system
will reside.  Do this with either the invocation option -D or the
environment variable PGDATA.
 %s: out of memory
 %s: password file "%s" is empty
 %s: password prompt and password file cannot be specified together
 %s: removing WAL directory "%s"
 %s: removing contents of WAL directory "%s"
 %s: removing contents of data directory "%s"
 %s: removing data directory "%s"
 %s: setlocale() failed
 %s: superuser name "%s" is disallowed; role names cannot begin with "pg_"
 %s: symlinks are not supported on this platform
 %s: too many command-line arguments (first is "%s")
 %s: warning: specified text search configuration "%s" might not match locale "%s"
 %s: warning: suitable text search configuration for locale "%s" is unknown
 Data page checksums are disabled.
 Data page checksums are enabled.
 Encoding "%s" implied by locale is not allowed as a server-side encoding.
The default database encoding will be set to "%s" instead.
 Encoding "%s" is not allowed as a server-side encoding.
Rerun %s with a different locale selection.
 Enter it again:  Enter new superuser password:  If you want to create a new database system, either remove or empty
the directory "%s" or run %s
with an argument other than "%s".
 If you want to store the WAL there, either remove or empty the directory
"%s".
 It contains a dot-prefixed/invisible file, perhaps due to it being a mount point.
 It contains a lost+found directory, perhaps due to it being a mount point.
 Passwords didn't match.
 Rerun %s with the -E option.
 Running in debug mode.
 Running in no-clean mode.  Mistakes will not be cleaned up.
 The database cluster will be initialized with locale "%s".
 The database cluster will be initialized with locales
  COLLATE:  %s
  CTYPE:    %s
  MESSAGES: %s
  MONETARY: %s
  NUMERIC:  %s
  TIME:     %s
 The default database encoding has accordingly been set to "%s".
 The default text search configuration will be set to "%s".
 The encoding you selected (%s) and the encoding that the
selected locale uses (%s) do not match.  This would lead to
misbehavior in various character string processing functions.
Rerun %s and either do not specify an encoding explicitly,
or choose a matching combination.
 The files belonging to this database system will be owned by user "%s".
This user must also own the server process.

 The program "postgres" is needed by %s but was not found in the
same directory as "%s".
Check your installation.
 The program "postgres" was found by "%s"
but was not the same version as %s.
Check your installation.
 This might mean you have a corrupted installation or identified
the wrong directory with the invocation option -L.
 Try "%s --help" for more information.
 Usage:
 Using a mount point directly as the data directory is not recommended.
Create a subdirectory under the mount point.
 cannot duplicate null pointer (internal error)
 caught signal
 child process exited with exit code %d child process exited with unrecognized status %d child process was terminated by exception 0x%X child process was terminated by signal %d child process was terminated by signal %s command not executable command not found could not change directory to "%s": %s could not close directory "%s": %s
 could not find a "%s" to execute could not get junction for "%s": %s
 could not identify current directory: %s could not look up effective user ID %ld: %s could not open directory "%s": %s
 could not read binary "%s" could not read directory "%s": %s
 could not read symbolic link "%s" could not remove file or directory "%s": %s
 could not set junction for "%s": %s
 could not stat file or directory "%s": %s
 could not write to child process: %s
 creating configuration files ...  creating directory %s ...  creating subdirectories ...  fixing permissions on existing directory %s ...  invalid binary "%s" logfile ok
 out of memory
 pclose failed: %s performing post-bootstrap initialization ...  running bootstrap script ...  selecting default max_connections ...  selecting default shared_buffers ...  selecting dynamic shared memory implementation ...  syncing data to disk ...  user does not exist user name lookup failure: error code %lu Project-Id-Version: PostgreSQL 9.6
Report-Msgid-Bugs-To: pgsql-bugs@postgresql.org
POT-Creation-Date: 2019-02-05 00:55+0000
PO-Revision-Date: 2017-07-02 18:12+0200
Last-Translator: Guillaume Lelarge <guillaume@lelarge.info>
Language-Team: PostgreSQLfr <pgsql-fr-generale@postgresql.org>
Language: fr
MIME-Version: 1.0
Content-Type: text/plain; charset=UTF-8
Content-Transfer-Encoding: 8bit
X-Generator: Poedit 1.8.12
 
Si le répertoire des données n'est pas indiqué, la variable d'environnement
PGDATA est utilisée.
 
Options moins utilisées :
 
Options :
 
Autres options :
 
Rapporter les bogues à <pgsql-bugs@postgresql.org>.
 
Succès. Vous pouvez maintenant lancer le serveur de bases de données en utilisant :

    %s

 
Synchronisation sur disque ignorée.
Le répertoire des données pourrait être corrompu si le système d'exploitation s'arrêtait brutalement.
 
ATTENTION : active l'authentification « trust » pour les connexions
locales.
Vous pouvez changer cette configuration en éditant le fichier pg_hba.conf
ou en utilisant l'option -A, ou --auth-local et --auth-host au prochain
lancement d'initdb.
       --auth-host=MÉTHODE    méthode d'authentification par défaut pour les
                             connexions locales TCP/IP
       --auth-local=MÉTHODE   méthode d'authentification par défaut pour les
                             connexions locales socket
       --lc-collate=, --lc-ctype=, --lc-messages=LOCALE
      --lc-monetary=, --lc-numeric=, --lc-time=LOCALE
                             initialise la locale par défaut dans la
                             catégorie respective pour les nouvelles bases
                             de données (les valeurs par défaut sont prises
                             dans l'environnement)
       --locale=LOCALE        initialise la locale par défaut pour les
                             nouvelles bases de données
       --no-locale            équivalent à --locale=C
       --pwfile=NOMFICHIER    lit le mot de passe du nouveau
                             super-utilisateur à partir de ce fichier
   %s [OPTION]... [RÉP_DONNÉES]
   -?, --help                 affiche cette aide puis quitte
   -A, --auth=MÉTHODE         méthode d'authentification par défaut pour les
                             connexions locales
   -E, --encoding=ENCODAGE    initialise l'encodage par défaut des nouvelles
                             bases de données
   -L RÉPERTOIRE              indique où trouver les fichiers servant à la
                             création du cluster
   -N, --nosync               n'attend pas que les modifications soient proprement écrites sur disque
   -S, --sync-only            synchronise uniquement le répertoire des données
   -T, --text-search-config=CFG
                             configuration par défaut de la recherche plein
                             texte
   -U, --username=NOM         nom du super-utilisateur de la base de données
   -V, --version              affiche la version puis quitte
   -W, --pwprompt             demande un mot de passe pour le nouveau
                             super-utilisateur
   -X, --waldir=RÉP_WAL       emplacement du répertoire des transactions
   -d, --debug                engendre un grand nombre de traces de débogage
   -k, --data-checksums       utilise les sommes de contrôle pour les pages de données
   -n, --noclean              ne nettoie pas après des erreurs
   -s, --show                 affiche la configuration interne
  [-D, --pgdata=]RÉP_DONNÉES  emplacement du cluster
 %s initialise un cluster PostgreSQL.

 %s : « %s » n'est pas un nom d'encodage serveur valide
 %s : répertoire des journaux de transactions « %s » non supprimé à la demande de l'utilisateur
 %s : l'emplacement du répertoire des journaux de transactions doit être
indiqué avec un chemin absolu
 %s : ATTENTION : ne peut pas créer les jetons restreints sur cette plateforme
 %s : ne peut pas être exécuté en tant qu'utilisateur root
Connectez-vous (par exemple en utilisant « su ») sous l'utilisateur (non
 privilégié) qui sera propriétaire du processus serveur.
 %s : n'a pas pu accéder au répertoire « %s » : %s
 %s : n'a pas pu accéder au fichier « %s » : %s
 %s : n'a pas pu allouer les SID : code d'erreur %lu
 %s : n'a pas pu modifier les droits de « %s » : %s
 %s : n'a pas pu modifier les droits du répertoire « %s » : %s
 %s : n'a pas pu créer le répertoire « %s » : %s
 %s : n'a pas pu créer le jeton restreint : code d'erreur %lu
 %s : n'a pas pu créer le lien symbolique « %s » : %s
 %s : n'a pas pu exécuter la commande « %s » : %s
 %s : n'a pas pu trouver un encodage adéquat pour la locale « %s »
 %s : n'a pas pu trouver la configuration de la recherche plein texte en
 adéquation avec la locale « %s »
 %s : n'a pas pu synchroniser sur disque le fichier « %s » : %s
 %s : n'a pas pu récupérer le code de statut du sous-processus : code d'erreur %lu
 %s : n'a pas pu ouvrir le répertoire « %s » : %s
 %s : n'a pas pu ouvrir le fichier « %s » en lecture : %s
 %s : n'a pas pu ouvrir le fichier « %s » en écriture : %s
 %s : n'a pas pu ouvrir le fichier « %s » : %s
 %s : n'a pas pu ouvrir le jeton du processus : code d'erreur %lu
 %s : n'a pas pu ré-exécuter le jeton restreint : code d'erreur %lu
 %s : n'a pas pu lire le répertoire « %s » : %s
 %s : n'a pas pu lire le mot de passe à partir du fichier « %s » : %s
 %s : n'a pas pu renommer le fichier « %s » en « %s » : %s
 %s : n'a pas pu démarrer le processus pour la commande « %s » : code d'erreur %lu
 %s : n'a pas pu récupérer les informations sur le fichier « %s » : %s
 %s : n'a pas pu écrire le fichier « %s » : %s
 %s : répertoire des données « %s » non supprimé à la demande de l'utilisateur
 %s : le répertoire « %s » existe mais n'est pas vide
 %s : différence d'encodage
 %s : échec de la suppression du répertoire des journaux de transactions
 %s : échec de la suppression du contenu du répertoire des journaux de transactions
 %s : échec de la suppression du contenu du répertoire des données
 %s : échec de la suppression du répertoire des données
 %s : n'a pas pu restaurer l'ancienne locale « %s »
 %s : le fichier « %s » n'existe pas
 %s : « %s » n'est pas un fichier
 %s : le fichier « %s » n'appartient pas à PostgreSQL %s
Vérifiez votre installation ou indiquez le bon chemin avec l'option -L.
 %s : l'emplacement du fichier d'entrée doit être indiqué avec un chemin
absolu
 %s : méthode d'authentification « %s » invalide pour « %s »
 %s : nom de locale invalide (« %s »)
 %s : configuration invalide de la locale ; vérifiez les variables d'environnement LANG et LC_*
 %s : la locale « %s » nécessite l'encodage « %s » non supporté
 %s : vous devez indiquer un mot de passe pour le super-utilisateur pour
activer l'authentification %s
 %s : aucun répertoire de données indiqué
Vous devez identifier le répertoire où résideront les données pour ce
système de bases de données. Faites-le soit avec l'option -D soit en
initialisant la variable d'environnement PGDATA.
 %s : mémoire épuisée
 %s : le fichier de mots de passe « %s » est vide
 %s : les options d'invite du mot de passe et le fichier de mots de passe ne
 peuvent pas être indiquées simultanément
 %s : suppression du répertoire des journaux de transactions « %s »
 %s : suppression du contenu du répertoire des journaux de transactions « %s »
 %s : suppression du contenu du répertoire des données « %s »
 %s : suppression du répertoire des données « %s »
 %s : échec de setlocale
 %s : le nom de superutilisateur « %s » n'est pas autorisé ; les noms de rôle ne peuvent pas commencer par « pg_ »
 %s : les liens symboliques ne sont pas supportés sur cette plateforme
 %s : trop d'arguments en ligne de commande (le premier étant « %s »)
 %s : attention : la configuration indiquée pour la recherche plein texte,
« %s », pourrait ne pas correspondre à la locale « %s »
 %s : attention : pas de configuration de la recherche plein texte connue
pour la locale « %s »
 Les sommes de contrôles des pages de données sont désactivées.
 Les sommes de contrôles des pages de données sont activées.
 L'encodage « %s » a été déduit de la locale mais n'est pas autorisé en tant qu'encodage serveur.
L'encodage par défaut des bases de données sera configuré à « %s ».
 L'encodage « %s » n'est pas autorisé en tant qu'encodage serveur.
Ré-exécuter %s avec une locale différente.
 Saisissez-le à nouveau :  Saisissez le nouveau mot de passe du super-utilisateur :  Si vous voulez créer un nouveau système de bases de données, supprimez ou
videz le répertoire « %s ».
Vous pouvez aussi exécuter %s avec un argument autre que « %s ».
 Si vous voulez enregistrer ici le journal des transactions, supprimez ou
videz le répertoire « %s ».
 Il contient un fichier invisible, peut-être parce qu'il s'agit d'un point de montage.
 Il contient un répertoire lost+found, peut-être parce qu'il s'agit d'un point de montage.
 Les mots de passe ne sont pas identiques.
 Relancez %s avec l'option -E.
 Lancé en mode débogage.
 Lancé en mode « sans nettoyage ». Les erreurs ne seront pas nettoyées.
 L'instance sera initialisée avec la locale « %s ».
 Le cluster sera initialisé avec les locales
  COLLATE:  %s
  CTYPE:    %s
  MESSAGES: %s
  MONETARY: %s
  NUMERIC:  %s
  TIME:     %s
 L'encodage par défaut des bases de données a été configuré en conséquence
avec « %s ».
 La configuration de la recherche plein texte a été initialisée à « %s ».
 L'encodage que vous avez sélectionné (%s) et celui que la locale
sélectionnée utilise (%s) ne sont pas compatibles. Cela peut conduire à
des erreurs dans les fonctions de manipulation de chaînes de caractères.
Ré-exécutez %s sans préciser d'encodage, ou en choisissant une combinaison
compatible.
 Les fichiers de ce cluster appartiendront à l'utilisateur « %s ».
Le processus serveur doit également lui appartenir.

 Le programme « postgres » est nécessaire à %s mais n'a pas été trouvé dans
le même répertoire que « %s ».
Vérifiez votre installation.
 Le programme « postgres » a été trouvé par « %s » mais n'est pas de la même
version que « %s ».
Vérifiez votre installation.
 Cela peut signifier que votre installation est corrompue ou que vous avez
identifié le mauvais répertoire avec l'option -L.
 Essayer « %s --help » pour plus d'informations.
 Usage :
 Utiliser un point de montage comme répertoire des données n'est pas recommandé.
Créez un sous-répertoire sous le point de montage.
 ne peut pas dupliquer un pointeur nul (erreur interne)
 signal reçu
 le processus fils a quitté avec le code de sortie %d le processus fils a quitté avec un statut %d non reconnu le processus fils a été terminé par l'exception 0x%X le processus fils a été terminé par le signal %d le processus fils a été terminé par le signal %s commande non exécutable commande introuvable n'a pas pu modifier le répertoire par « %s » : %s n'a pas pu fermer le répertoire « %s » : %s
 n'a pas pu trouver un « %s » à exécuter n'a pas pu obtenir la jonction pour « %s » : %s
 n'a pas pu identifier le répertoire courant : %s n'a pas pu trouver l'identifiant réel %ld de l'utilisateur : %s n'a pas pu ouvrir le répertoire « %s » : %s
 n'a pas pu lire le binaire « %s » n'a pas pu lire le répertoire « %s » : %s
 n'a pas pu lire le lien symbolique « %s » n'a pas pu supprimer le fichier ou répertoire « %s » : %s
 n'a pas pu configurer la jonction pour « %s » : %s
 n'a pas pu récupérer les informations sur le fichier ou répertoire
« %s » : %s
 n'a pas pu écrire au processus fils : %s
 création des fichiers de configuration...  création du répertoire %s...  création des sous-répertoires...  correction des droits sur le répertoire existant %s...  binaire « %s » invalide fichier_de_trace ok
 mémoire épuisée
 échec de pclose : %s exécution de l'initialisation après bootstrap... lancement du script bootstrap... sélection de la valeur par défaut pour max_connections...  sélection de la valeur par défaut pour shared_buffers...  sélection de l'implémentation de la mémoire partagée dynamique... synchronisation des données sur disque l'utilisateur n'existe pas échec de la recherche du nom d'utilisateur : code erreur %lu 