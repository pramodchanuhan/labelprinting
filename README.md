designation's name spelling should be same as role, not case sensitive .
all model, controller name should be in title case. => FromName
varible name should be in snake case. => form_name
urls should be in kabab case. => form-name
model name should be similar to as table name.
url and method name should be similar

iaf stands for interview assesment form


Verb	    URI	                     Action	                    Route Name

GET	        /photos                  show  or index photos	    photos.index 
GET	        /photos/create           show create photo	        photos.create
POST        /photos	                 create or store photo	    photos.store
GET	        /photos/{photo}	         show photo	                photos.show
GET	        /photos/{photo}/edit     show update or edit photo	photos.edit
PUT/PATCH	/photos/{photo}	         edit or update photo	    photos.update
DELETE	    /photos/{photo}	         delete or destroy photo	photos.destroy
