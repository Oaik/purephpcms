# You Can see live preview here
### https://cmspurephp.000webhostapp.com

# Database Config. in includes/db.php

### Tables structure

## table: users
###	Name	Type	Collation	Attributes	Null	Default	Comments	Extra	Action
	1	user_idPrimary	int(3)			No	None		AUTO_INCREMENT	 	 	

	2	username	varchar(255)	latin1_swedish_ci		No	None			 	 	

	3	user_password	varchar(255)	latin1_swedish_ci		No	None			 	 	

	4	user_firstname	varchar(255)	latin1_swedish_ci		No	None			 	 	

	5	user_lastname	varchar(255)	latin1_swedish_ci		No	None			 	 	

	6	user_email	varchar(255)	latin1_swedish_ci		No	None			 	 	

	7	user_image	text	latin1_swedish_ci		No	None			 	 	

	8	user_role	varchar(255)	latin1_swedish_ci		No	None			 	 	

	9	randSalt	varchar(255)	

## table: posts
#	Name	Type	Collation	Attributes	Null	Default	Comments	Extra	Action
	1	post_idPrimary	int(3)			No	None		AUTO_INCREMENT	 	 	

	2	post_category_id	int(3)			No	None			 	 	

	3	post_title	varchar(255)	latin1_swedish_ci		No	None			 	 	

	4	post_author	varchar(255)	latin1_swedish_ci		No	None			 	 	

	5	post_date	date			No	None			 	 	

	6	post_image	text	latin1_swedish_ci		No	None			 	 	

	7	post_content	text	latin1_swedish_ci		No	None			 	 	

	8	post_tags	varchar(255)	latin1_swedish_ci		No	None			 	 	

	9	post_comment_count	int(3)			No	0			 	 	

	10	post_status	varchar(255)	latin1_swedish_ci		No	draft			 	 	

## table: comments
#	Name	Type	Collation	Attributes	Null	Default	Comments	Extra	Action
	1	comment_idPrimary	int(3)			No	None		AUTO_INCREMENT	 	 	

	2	comment_post_id	int(3)			No	None			 	 	

	3	comment_author	varchar(255)	latin1_swedish_ci		No	None			 	 	

	4	comment_email	varchar(255)	latin1_swedish_ci		No	None			 	 	

	5	comment_content	text	latin1_swedish_ci		No	None			 	 	

	6	comment_status	varchar(255)	latin1_swedish_ci		No	None			 	 	

	7	comment_date	date			No	None			 	 	

## table: categories
#	Name	Type	Collation	Attributes	Null	Default	Comments	Extra	Action
	1	cat_idPrimary	int(3)			No	None		AUTO_INCREMENT	
	2	cat_title	varchar(255)	latin1_swedish_ci		No	None		

