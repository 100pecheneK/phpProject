��    S      �  q   L                  )   /  Z   Y  9   �     �  =        K  >   c  )   �  )   �  /   �  A   &	  L   h	  K   �	  9   
  3   ;
  (   o
     �
     �
  <   �
  $     ?   -     m  r   �  b   �  i   a  .   �  4   �  -   /  $   ]  &   �  )   �  0   �  0     h   5  6   �     �     �           /  @   O  7   �  )   �     �  +   	  !   5  "   W     z     �  *   �  '   �  &   	     0  ;   K  J   �     �  /   �  L        i  B   �  0   �     �  &     3   A  '   u  4   �  -   �  >      H   ?  "   �  2   �  '   �  ,     +   3  (   _  0   �  .   �  $   �  !        /     K  �  g     #  -   &  5   T  e   �  J   �     ;  I   Z     �  M   �  :     :   I  <   �  S   �  d     W   z  G   �  A     8   \     �     �  T   �  2   %  B   X  #   �     �  x   ?  �   �  4   <  B   q  9   �  3   �  0   "   2   S   5   �   5   �   p   �   >   c!  &   �!     �!  *   �!  )   "  Z   ="  N   �"  /   �"     #  5   4#  '   j#  ,   �#  (   �#  -   �#  6   $  1   M$  F   $  )   �$  G   �$  c   8%     �%  :   �%  i   �%  3   `&  ^   �&  ?   �&  %   3'  -   Y'  9   �'  .   �'  :   �'  1   +(  O   ](  Q   �(  0   �(  ;   0)  &   l)  1   �)  &   �)  1   �)  H   *  4   g*  1   �*  -   �*  +   �*  .   (+                  !   $              %          J   B   G      :   N          5         3      6               O   M   L   2   <   ?   -   =       @   #      +             '   &               C           *       D   F                   R   >   Q   )   4          .      0                  S          "   P      9       ;   
   8      /      K      1       H       7       (          E       ,   	           I          A       %s Expected None or a string. Expected None, "OK", "SKIP", or "MODIFY". Expected sequence of %d argument, got %d: %s Expected sequence of %d arguments, got %d: %s Only one Python major version can be used in one session. PL/Python anonymous code block PL/Python does not support conversion to arrays of row types. PL/Python function "%s" PL/Python function with return type "void" did not return None PL/Python functions cannot accept type %s PL/Python functions cannot return type %s PL/Python only supports one-dimensional arrays. PL/Python set-returning functions must return an iterable object. PL/Python set-returning functions only support returning one value per call. PL/Python trigger function returned "MODIFY" in a DELETE trigger -- ignored PyDict_SetItemString() failed, while setting up arguments PyList_SetItem() failed, while setting up arguments Python major version mismatch in session SPI_execute failed: %s SPI_execute_plan failed: %s Start a new session to use a different Python major version. TD["new"] deleted, cannot modify row TD["new"] dictionary key at ordinal position %d is not a string TD["new"] is not a dictionary This session has previously used Python major version %d, and it is now attempting to use Python major version %d. To return null in a column, add the value None to the mapping with the key named after the column. To return null in a column, let the returned object have an attribute named after column with value None. attribute "%s" does not exist in Python object cannot convert multidimensional array to Python list closing a cursor in an aborted subtransaction command did not produce a result set could not add the spiexceptions module could not compile PL/Python function "%s" could not compile anonymous PL/Python code block could not convert Python Unicode object to bytes could not convert Python object into cstring: Python string representation appears to contain null bytes could not create bytes representation of Python object could not create exception "%s" could not create globals could not create new Python list could not create new dictionary could not create new dictionary while building trigger arguments could not create string representation of Python object could not create the spiexceptions module could not execute plan could not extract bytes from encoded string could not generate SPI exceptions could not import "__main__" module could not import "plpy" module could not initialize globals could not parse error message in plpy.elog could not unpack arguments in plpy.elog error fetching next item from iterator fetch from a closed cursor forcibly aborting a subtransaction that has not been exited function returning record called in context that cannot accept type record iterating a closed cursor iterating a cursor in an aborted subtransaction key "%s" found in TD["new"] does not exist as a column in the triggering row key "%s" not found in mapping length of returned sequence did not match number of columns in row multiple Python libraries are present in session plan.status takes no arguments plpy.cursor expected a query or a plan plpy.cursor takes a sequence as its second argument plpy.execute expected a query or a plan plpy.execute takes a sequence as its second argument plpy.prepare does not support composite types plpy.prepare: type name at ordinal position %d is not a string return value of function with array return type is not a Python sequence returned object cannot be iterated second argument of plpy.prepare must be a sequence there is no subtransaction to exit from this subtransaction has already been entered this subtransaction has already been exited this subtransaction has not been entered trigger functions can only be called as triggers unexpected return value from trigger procedure unsupported set function return mode untrapped error in initialization while creating return value while modifying trigger row Project-Id-Version: PostgreSQL 9.2
Report-Msgid-Bugs-To: pgsql-bugs@postgresql.org
POT-Creation-Date: 2017-02-06 16:34+0000
PO-Revision-Date: 2017-02-06 18:29+0100
Last-Translator: Guillaume Lelarge <guillaume@lelarge.info>
Language-Team: French <guillaume@lelarge.info>
Language: fr
MIME-Version: 1.0
Content-Type: text/plain; charset=UTF-8
Content-Transfer-Encoding: 8bit
Plural-Forms: nplurals=2; plural=(n > 1);
X-Generator: Poedit 1.8.11
 %s Attendait None ou une chaîne de caractères. Attendait None, « OK », « SKIP » ou « MODIFY ». Séquence attendue de %d argument, %d obtenu : %s Séquence attendue de %d arguments, %d obtenus : %s Seule une version majeure de Python peut être utilisée dans une session. bloc de code PL/Python anonyme PL/Python ne supporte pas les conversions vers des tableaux de types row. fonction PL/python « %s » la fonction PL/python avec un code de retour « void » ne renvoyait pas None les fonctions PL/python ne peuvent pas accepter le type %s les fonctions PL/python ne peuvent pas renvoyer le type %s PL/Python supporte seulement les tableaux uni-dimensionnels. les fonctions PL/python renvoyant des ensembles doivent renvoyer un objet
itérable les fonctions PL/python renvoyant des ensembles supportent seulement une
valeur renvoyée par appel. la fonction trigger PL/python a renvoyé « MODIFY » dans un trigger DELETE
-- ignoré échec de PyDict_SetItemString() lors de l'initialisation des arguments échec de PyList_SetItem() lors de l'initialisation des arguments Différence de version majeure de Python dans la session échec de SPI_execute : %s échec de SPI_execute_plan : %s Lancez une nouvelle session pour utiliser une version majeure différente de
Python. TD["new"] supprimé, ne peut pas modifier la ligne la clé TD["new"] à la position ordinale %d n'est pas une chaîne TD["new"] n'est pas un dictionnaire Cette session a auparavant utilisé la version majeure %d de Python et elle
essaie maintenant d'utiliser la version majeure %d. Pour renvoyer NULL dans une colonne, ajoutez la valeur None à la
correspondance de la clé nommée d'après la colonne. Pour renvoyer NULL dans une colonne, faites en sorte que l'objet renvoyé ait
un attribut nommé suivant la colonne de valeur None. l'attribut « %s » n'existe pas dans l'objet Python ne peut pas convertir un tableau multidimensionnel en liste Python fermeture d'un curseur dans une sous-transaction annulée la commande n'a pas fourni d'ensemble de résultats n'a pas pu ajouter le module « spiexceptions » n'a pas pu compiler la fonction PL/python « %s » n'a pas pu compiler le bloc de code anonyme PL/python n'a pas pu convertir l'objet Unicode Python en octets n'a pas pu convertir l'objet Python en csting : la représentation de la chaîne Python contient des octets nuls n'a pas pu créer une représentation octets de l'objet Python n'a pas pu créer l'exception « %s » n'a pas pu créer les globales n'a pas pu créer la nouvelle liste Python n'a pas pu créer le nouveau dictionnaire n'a pas pu créer un nouveau dictionnaire lors de la construction des
arguments du trigger n'a pas pu créer une représentation chaîne de caractères de l'objet Python n'a pas pu créer le module « spiexceptions » n'a pas pu exécuter le plan n'a pas pu extraire les octets de la chaîne encodée n'a pas pu générer les exceptions SPI n'a pas pu importer le module « __main__ » n'a pas pu importer le module « plpy » n'a pas pu initialiser les variables globales n'a pas pu analyser le message d'erreur dans plpy.elog n'a pas pu déballer les arguments dans plpy.elog erreur lors de la récupération du prochain élément de l'itérateur récupérer à partir d'un curseur fermé annulation forcée d'une sous-transaction qui n'a jamais été quittée fonction renvoyant le type record appelée dans un contexte qui ne peut pas
accepter le type record itération d'un curseur fermé itération d'un curseur dans une sous-transaction annulée la clé « %s » trouvée dans TD["new"]  n'existe pas comme colonne
de la ligne impactée par le trigger la clé « %s » introuvable dans la correspondance la longueur de la séquence renvoyée ne correspondait pas au nombre de
colonnes dans la ligne plusieurs bibliothèques Python sont présentes dans la session plan.status ne prends pas d'arguments plpy.cursor attendait une requête ou un plan plpy.cursor prends une séquence dans son second argument plpy.prepare attendait une requête ou un plan plpy.execute prends une séquence dans son second argument plpy.prepare ne supporte pas les types composites plpy.prepare : le nom du type sur la position ordinale %d n'est pas une chaîne la valeur de retour de la fonction de type tableau n'est pas une séquence Python l'objet renvoyé ne supporte pas les itérations le second argument de plpy.prepare doit être une séquence il n'y a pas de transaction à quitter cette sous-transaction est en cours d'utilisation déjà sorti de cette sous-transaction cette sous-transaction n'a jamais été utilisée les fonctions trigger peuvent seulement être appelées par des triggers valeur de retour inattendue de la procédure trigger mode de retour non supporté pour la fonction SET erreur non récupérée dans l'initialisation lors de la création de la valeur de retour lors de la modification de la ligne du trigger 