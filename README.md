#phpGlluchMiriadaX

phpGlluchMiriadaX is a collection of scripts to obtain 
the metadata from a group of 
[MiriadaX](https://miriadax.net/home) courses. 

Tested in novembre 2015

 ## Requisites
 
 Freeling as server for POS tagging (optional). Change normalize.php and put your IP and port.
Save one by one the html files you are interesed 
in and save in _courses_ dir.
 
 ##Order of execution
 
 This files has to be executed in php CLI in this order:
 
 1.    **php descriptions.php** Extracts the information from each course. 
The results of this steps are in json0 dir 
 2.    **php normalize.php** Searches the words 
 that are not stopwords and saves with its POS tag. 
 3.    **php clean.php** From the previos step,
  deletes the puntuation marks.
 
 ## Result
 
 The courses information will be in the 
 directory *json2* (with POS tags) 
 or *json0* without them.
 
  ## Related
  
  phpGlluchCoursera
  
  phpGlluchCourseTalk
  
   phpGlluchEdX
