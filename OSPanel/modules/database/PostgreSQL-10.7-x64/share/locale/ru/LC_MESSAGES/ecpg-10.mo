��    {      �  �   �      h
  ~   i
  -   �
  0     +   G  g   s     �  4   �  7   0  s   h  .   �  G     4   S  )   �  w   �  4   *     _  @   r  7   �  ,   �  !        :  ,   X  1   �  *   �  -   �  1     '   B  &   j  +   �  "   �  #   �       )     =   6  	   t     ~  &   �  <   �  !   �  	      -   *  +   X  "   �     �  ,   �     �       *   -  "   X  '   {     �     �  !   �     �  !        /      D  3   e  /   �  '   �  )   �  *     5   F  I   |  ,   �  /   �  *   #  T   N  '   �     �     �               +  -   E  ,   s  ,   �  5   �       )     ?   I  8   �  �   �     Y  0   s  5   �     �  A   �  L   1  +   ~     �  6   �  '   �  #        ;  (   H  4   q  )   �     �  /   �           6  $   W     |  "   �  ,   �     �     �  '        D     c  $   ~  D   �  +   �  ?     0   T     �  8   �     �     �  &         @  �  a  �   \!  W   �!  `   R"  F   �"  �   �"  B   �#  l   �#  =   O$  �   �$  h   ?%  i   �%  b   &  E   u&  �   �&  P   t'  0   �'  d   �'  j   [(  \   �(  9   #)  '   ])  i   �)  \   �)  U   L*  X   �*  \   �*  R   X+  Q   �+  V   �+  <   T,  3   �,     �,  `   �,  �   5-     �-  $   �-  [   �-  `   X.  D   �.     �.  L   /  W   j/  H   �/  +   0  A   70  +   y0  3   �0  S   �0  I   -1  C   w1  %   �1  <   �1  G   2  A   f2  H   �2  !   �2  G   3  w   [3  Q   �3  P   %4  T   v4  V   �4  a   "5  y   �5  X   �5  W   W6  [   �6  �   7  P   �7  ,   �7  2   8  $   R8  $   w8  (   �8  S   �8  R   9  R   l9  L   �9  7   :  G   D:  u   �:  X   ;  �  [;  3   %=  l   Y=  p   �=  "   7>  x   Z>  |   �>  X   P?     �?  t   �?  ;   <@  G   x@  !   �@  D   �@     'A  J   �A  %   �A  P   B  .   iB  >   �B  N   �B  =   &C  D   dC  Z   �C  4   D  0   9D  D   jD  I   �D  ;   �D  S   5E  �   �E  N   F  f   \F  R   �F  3   G  i   JG  -   �G  1   �G  I   H  ;   ^H     j              4      f       g   ?       ^   l   x           
      T   (   9       u          8      R      L   t      I   d   \   %   )           <   i      =   '   Q   N   &                  :   M                     v       ,   7       B   .           z              _   ;   S             n   #   >   P           "   H   r      ]              [   !   *       s           Z      6      	      G          A       O      -   X       2   q       3      W   w   1   k   +   U   e           Y   o   K               p   0   a         J   5       {       h      c   m   E               C   @   V   F      y   D   /       `   $         b    
If no output file is specified, the name is formed by adding .c to the
input file name, after stripping off .pgc if present.
 
Report bugs to <pgsql-bugs@postgresql.org>.
   --regression   run in regression testing mode
   -?, --help     show this help, then exit
   -C MODE        set compatibility mode; MODE can be one of
                 "INFORMIX", "INFORMIX_SE"
   -D SYMBOL      define SYMBOL
   -I DIRECTORY   search DIRECTORY for include files
   -V, --version  output version information, then exit
   -c             automatically generate C code from embedded SQL code;
                 this affects EXEC SQL TYPE
   -d             generate parser debug output
   -h             parse a header file, this option includes option "-c"
   -i             parse system include files as well
   -o OUTFILE     write result to OUTFILE
   -r OPTION      specify run-time behavior; OPTION can be:
                 "no_indicator", "prepare", "questionmarks"
   -t             turn on autocommit of transactions
 %s at or near "%s" %s is the PostgreSQL embedded SQL preprocessor for C programs.

 %s, the PostgreSQL embedded C preprocessor, version %s
 %s: could not locate my own executable path
 %s: could not open file "%s": %s
 %s: no input files specified
 %s: parser debug support (-d) not available
 AT option not allowed in CLOSE DATABASE statement AT option not allowed in CONNECT statement AT option not allowed in DISCONNECT statement AT option not allowed in SET CONNECTION statement AT option not allowed in TYPE statement AT option not allowed in VAR statement AT option not allowed in WHENEVER statement COPY FROM STDIN is not implemented CREATE TABLE AS cannot specify INTO ERROR:  EXEC SQL INCLUDE ... search starts here:
 Error: include path "%s/%s" is too long on line %d, skipping
 Options:
 SHOW ALL is not implemented Try "%s --help" for more information.
 Unix-domain sockets only work on "localhost" but not on "%s" Usage:
  %s [OPTION]... FILE...

 WARNING:  arrays of indicators are not allowed on input could not open include file "%s" on line %d could not remove output file "%s"
 cursor "%s" does not exist cursor "%s" has been declared but not opened cursor "%s" is already defined descriptor "%s" does not exist descriptor header item "%d" does not exist descriptor item "%s" cannot be set descriptor item "%s" is not implemented end of search list
 expected "://", found "%s" expected "@" or "://", found "%s" expected "@", found "%s" expected "postgresql", found "%s" incomplete statement incorrectly formed variable "%s" indicator for array/pointer has to be array/pointer indicator for simple data type has to be simple indicator for struct has to be a struct indicator struct "%s" has too few members indicator struct "%s" has too many members indicator variable "%s" is hidden by a local variable indicator variable "%s" is hidden by a local variable of a different type indicator variable must have an integer type initializer not allowed in EXEC SQL VAR command initializer not allowed in type definition internal error: unreachable state; please report this to <pgsql-bugs@postgresql.org> interval specification not allowed here invalid bit string literal invalid connection type: %s invalid data type key_member is always 0 missing "EXEC SQL ENDIF;" missing identifier in EXEC SQL DEFINE command missing identifier in EXEC SQL IFDEF command missing identifier in EXEC SQL UNDEF command missing matching "EXEC SQL IFDEF" / "EXEC SQL IFNDEF" more than one EXEC SQL ELSE multidimensional arrays are not supported multidimensional arrays for simple data types are not supported multidimensional arrays for structures are not supported multilevel pointers (more than 2 levels) are not supported; found %d level multilevel pointers (more than 2 levels) are not supported; found %d levels nested /* ... */ comments nested arrays are not supported (except strings) no longer supported LIMIT #,# syntax passed to server nullable is always 1 only data types numeric and decimal have precision/scale argument only protocols "tcp" and "unix" and database type "postgresql" are supported operator not allowed in variable definition out of memory pointer to pointer is not supported for this data type pointers to varchar are not implemented subquery in FROM must have an alias syntax error syntax error in EXEC SQL INCLUDE command too many levels in nested structure/union definition too many nested EXEC SQL IFDEF conditions type "%s" is already defined type name "string" is reserved in Informix mode unmatched EXEC SQL ENDIF unrecognized data type name "%s" unrecognized descriptor item code %d unrecognized token "%s" unrecognized variable type code %d unsupported feature will be passed to server unterminated /* comment unterminated bit string literal unterminated hexadecimal string literal unterminated quoted identifier unterminated quoted string using unsupported DESCRIBE statement using variable "%s" in different declare statements is not supported variable "%s" is hidden by a local variable variable "%s" is hidden by a local variable of a different type variable "%s" is neither a structure nor a union variable "%s" is not a pointer variable "%s" is not a pointer to a structure or a union variable "%s" is not an array variable "%s" is not declared variable "%s" must have a numeric type zero-length delimited identifier Project-Id-Version: ecpg (PostgreSQL current)
Report-Msgid-Bugs-To: pgsql-bugs@postgresql.org
POT-Creation-Date: 2018-10-01 13:03+0300
PO-Revision-Date: 2018-01-31 08:18+0300
Last-Translator: Alexander Lakhin <exclusion@gmail.com>
Language-Team: Russian <pgsql-ru-general@postgresql.org>
Language: ru
MIME-Version: 1.0
Content-Type: text/plain; charset=UTF-8
Content-Transfer-Encoding: 8bit
Plural-Forms: nplurals=3; plural=n%10==1 && n%100!=11 ? 0 : n%10>=2 && n%10<=4 && (n%100<10 || n%100>=20) ? 1 : 2;
 
Если выходной файл не указан, к имени входного файла без расширения .pgc
добавляется .c.
 
Об ошибках сообщайте по адресу <pgsql-bugs@postgresql.org>.
   --regression   запустить в режиме тестирования регрессии
   -?, --help     показать эту справку и выйти
   -C РЕЖИМ       установить режим совместимости; допустимый РЕЖИМ:
                 "INFORMIX" или "INFORMIX_SE"
   -D СИМВОЛ      определить (define) СИМВОЛ
   -I КАТАЛОГ     искать включаемые файлы в указанном каталоге
   -V, --version  показать версию и выйти
   -c             автоматически генерировать код C из внедрённого SQL-кода;
                 (это касается EXEC SQL TYPE)
   -d             генерировать отладочные сообщения при разборе
   -h             разобрать файл заголовка (включает параметр "-c")
   -i             разобрать также системные включаемые файлы
   -o ФАЙЛ        записать результат в ФАЙЛ
   -r ПАРАМЕТР    определить режим выполнения; допустимый ПАРАМЕТР:
                 "no_indicator", "prepare" или "questionmarks"
   -t             включить автофиксацию транзакций
 %s (примерное положение: "%s") %s - препроцессор SQL-вставок в программах на C для PostgreSQL.

 %s, препроцессор внедрённого в С языка СУБД PostgreSQL, версия %s
 %s: не удалось найти свой путь к исполняемым файлам
 %s: не удалось открыть файл "%s": %s
 %s: нет входных файлов
 %s: отладочные сообщения при разборе (-d) не поддерживаются
 оператор CLOSE DATABASE с параметром AT не поддерживается оператор CONNECT с параметром AT не поддерживается оператор DISCONNECT с параметром AT не поддерживается оператор SET CONNECTION с параметром AT не поддерживается оператор TYPE с параметром AT не поддерживается оператор VAR с параметром AT не поддерживается оператор WHENEVER с параметром AT не поддерживается операция COPY FROM STDIN не реализована в CREATE TABLE AS нельзя указать INTO ОШИБКА:  поиск файлов для EXEC SQL INCLUDE ... начинается в каталогах:
 Ошибка: путь включаемых файлов "%s/%s" в строке %d слишком длинный, пропускается
 Параметры:
 SHOW ALL не реализовано Для дополнительной информации попробуйте "%s --help".
 Unix-сокеты работают только с "localhost", но не с адресом "%s" Использование:
  %s [ПАРАМЕТР]... ФАЙЛ...

 ПРЕДУПРЕЖДЕНИЕ:  массивы индикаторов на входе недопустимы не удалось открыть включаемый файл "%s" (строка %d) ошибка при удалении выходного файла "%s"
 курсор "%s" не существует курсор "%s" был объявлен, но не открыт курсор "%s" уже определён дескриптор "%s" не существует заголовок дескриптора не содержит элемент "%d" установить поле "%s" в дескрипторе нельзя поле "%s" в дескрипторе не реализовано конец списка поиска
 ожидалось "://", но на этом месте "%s" ожидалось "@" или "://", но на этом месте "%s" ожидался знак "@", но на этом месте "%s" ожидался тип "postgresql", но на этом месте "%s" неполный оператор неправильно оформленная переменная "%s" индикатор для массива/указателя должен быть массивом/указателем индикатор простого типа должен быть простым индикатор структуры должен быть структурой в структуре индикаторе "%s" слишком мало членов в структуре индикаторе "%s" слишком много членов переменная-индикатор "%s" скрыта локальной переменной переменная-индикатор "%s" скрыта локальной переменной другого типа переменная-индикатор должна быть целочисленной команда EXEC SQL VAR не может включать инициализатор определение типа не может включать инициализатор внутренняя ошибка: недостижимое состояние; пожалуйста, сообщите в <pgsql-bugs@postgresql.org> определение интервала здесь не допускается неверная битовая строка неверный тип подключения: %s неверный тип данных KEY_MEMBER всегда равно 0 отсутствует "EXEC SQL ENDIF;" в команде EXEC SQL DEFINE отсутствует идентификатор в команде EXEC SQL IFDEF отсутствует идентификатор в команде EXEC SQL UNDEF отсутствует идентификатор нет соответствующего "EXEC SQL IFDEF" / "EXEC SQL IFNDEF" неоднократная команда EXEC SQL ELSE многомерные массивы не поддерживаются многомерные массивы с простыми типами данных не поддерживаются многомерные массивы структур не поддерживаются многоуровневые указатели (больше 2 уровней) не поддерживаются, обнаружен %d уровень многоуровневые указатели (больше 2 уровней) не поддерживаются, обнаружено %d уровня многоуровневые указатели (больше 2 уровней) не поддерживаются, обнаружено %d уровней вложенные комментарии /* ... */ вложенные массивы не поддерживаются (за исключением строк) не поддерживаемое более предложение LIMIT #,# передано на сервер NULLABLE всегда равно 1 точность/масштаб можно указать только для типов данных numeric и decimal поддерживаются только протоколы "tcp" и "unix", а тип базы данных - "postgresql" недопустимый оператор в определении переменной нехватка памяти для этого типа данных указатели на указатели не поддерживаются указатели на varchar не реализованы подзапрос во FROM должен иметь псевдоним ошибка синтаксиса ошибка синтаксиса в команде EXEC SQL INCLUDE слишком много уровней в определении вложенной структуры/объединения слишком много вложенных условий EXEC SQL IFDEF тип "%s" уже определён имя типа "string" в режиме Informix зарезервировано непарная команда EXEC SQL ENDIF нераспознанное имя типа данных "%s" нераспознанный код элемента дескриптора %d нераспознанное ключевое слово "%s" нераспознанный код типа переменной %d неподдерживаемая функция будет передана серверу незавершённый комментарий /* оборванная битовая строка оборванная шестнадцатеричная строка незавершённый идентификатор в кавычках незавершённая строка в кавычках используется неподдерживаемый оператор DESCRIBE использование переменной "%s" в разных операторах DECLARE не поддерживается переменная "%s" скрыта локальной переменной переменная "%s" скрыта локальной переменной другого типа переменная "%s" - не структура и не объединение переменная "%s" - не указатель переменная "%s" - не указатель на структуру или объединение переменная "%s" - не массив переменная "%s" не объявлена переменная "%s" должна иметь числовой тип пустой идентификатор в кавычках 